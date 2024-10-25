<?php

namespace App\Http\Controllers;

use App\Services\EmiDetailsService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class EmiDetailsController extends Controller
{
    protected $emiDetailsService;

    public function __construct(EmiDetailsService $emiDetailsService){
        $this->emiDetailsService = $emiDetailsService;
    }

    public function index()
    {

        // $emiDetails = DB::table('emi_details')->get();
        $emiDetails = Schema::hasTable('emi_details')
                        ? DB::table('emi_details')->get()
                        : collect([]);

        return view('emi-details.index')->with(['emiDetails' => $emiDetails]);
    }

    public function process()
    {
        $createEmiDetailsTable = $this->emiDetailsService->createEmiDetailsTable();

        if($createEmiDetailsTable){
            $calculateEmi = $this->emiDetailsService->calculateEmiDetails();

            if($calculateEmi){
                return redirect()->route('emi-details.index')->with('success', 'Emi details processed successfully');
            }else{
                return redirect()->route('emi-details.index')->with('success', 'Something is wrong please try again');
            }
        }else{
            return redirect()->route('emi-details.index')->with('success', 'Something is wrong please try again');
        }



    }
}
