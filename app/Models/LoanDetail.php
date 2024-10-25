<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanDetail extends Model
{
    use HasFactory;

    protected $table = "loan_details";

    protected $fillable = ['clientid', 'num_of_payment', 'first_payment_date', 'last_payment_date', 'loan_amount'];
}
