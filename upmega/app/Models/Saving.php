<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Saving extends Model
{
    use HasFactory;

protected $fillable = [ 'user_id', 'amount', 'saving_account_id', 'profit_rate', 'profit_estimate', 'transaction_code', 'mpesa_code', 'conversion_date' ];


 public function user()
{
    return $this->belongsTo(User::class, 'user_id');
}

}
