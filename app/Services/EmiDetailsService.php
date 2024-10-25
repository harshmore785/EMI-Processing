<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\LoanDetail;
use DateTime;

class EmiDetailsService{
    public function createEmiDetailsTable(){
        try{
            // Drop the table if it exists
            DB::statement('DROP TABLE IF EXISTS emi_details');

            // Get min first_payment_date and max last_payment_date
            $minDate = LoanDetail::min('first_payment_date');
            $maxDate = LoanDetail::max('last_payment_date');

            // Create the emi_details table with dynamic columns
            $dates = $this->generateMonthsArray($minDate, $maxDate);
            $columns = implode(', ', array_map(function ($date) {
                return "`{$date}` DECIMAL(7,2) DEFAULT 0";
            }, $dates));

            $query = "CREATE TABLE emi_details (clientid INT, $columns)";
            DB::statement($query);

            return true;
        }catch(\Exception $e){
            Log::info($e);
            return false;
        }

    }

    public function calculateEmiDetails() {
        // Process each row in loan_details
        $loanDetails = LoanDetail::get();

        foreach ($loanDetails as $loanDetail) {
            $clientid = $loanDetail->clientid;
            $loanAmount = $loanDetail->loan_amount; // e.g., 200
            $numOfPayment = $loanDetail->num_of_payment; // e.g., 3

            // Calculate base EMI amount and remainder
            $baseEmiAmount = round($loanAmount / $numOfPayment,2); // e.g., 200 / 3 = 66
            $totalCalculated = $baseEmiAmount * $numOfPayment; // e.g., 66 * 3 = 198
            $remainder = $loanAmount - $totalCalculated; // e.g., 200 - 198 = 2

            // Initialize dates for payments
            $currentDate = new DateTime($loanDetail->first_payment_date);
            $lastPaymentDate = new DateTime($loanDetail->last_payment_date);
            $paymentCount = 1; // To keep track of the installment number

            while ($currentDate <= $lastPaymentDate) {
                $month = $currentDate->format('Y_M');
                $emiAmount = $baseEmiAmount;

                // Add the remainder to the last EMI
                if ($paymentCount == $numOfPayment) {
                    $emiAmount += $remainder; // Adjust final EMI
                }

                // Begin transaction for database insertion
                DB::beginTransaction();
                try {
                    DB::table('emi_details')->updateOrInsert(
                        ['clientid' => $clientid],
                        [$month => $emiAmount]
                    );
                    DB::commit();
                } catch (\Exception $e) {
                    DB::rollback();
                    // Optional: log or handle the exception here
                }

                // Move to the next month
                $currentDate->modify('+1 month');
                $paymentCount++;
            }
        }

        return true;
    }

    private function generateMonthsArray($start, $end)
    {
        $start = new \DateTime($start);
        $end = new \DateTime($end);
        $months = [];
        while ($start <= $end) {
            $months[] = $start->format('Y_M');
            $start->modify('+1 month');
        }
        return $months;
    }
}
