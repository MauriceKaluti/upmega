<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;

        protected $fillable = [ 'user_id', 'loan_code', 'interest_rate', 'amount', 'loan_mpesa_code', 'repay_mpesa_code', 'repay_amount', 'approved_at', 'paid_at', 'repay_at', 'approved_by', 'description', 'status', 'paid'];

        public function user()
{
    return $this->belongsTo(User::class, 'user_id');
}
 
}
