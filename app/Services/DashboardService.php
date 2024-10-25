<?php

namespace App\Services;

use App\Models\LoanDetail;

class DashboardService
{
    public function getLoanDetails()
    {
        return LoanDetail::select('clientid', 'num_of_payment', 'first_payment_date', 'last_payment_date', 'loan_amount')->get();
    }
}
