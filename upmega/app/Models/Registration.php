<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    use HasFactory;
 
protected $fillable = [ 'user_id', 'fname', 'lname', 'email' , 'phone', 'id_no', 'expiry_date', 'mpesa_transaction_id', 'nationality', 'gender', 'age', 'medical_condition', 'experience', 'terms' ];

 public function user()
{
    return $this->belongsTo(User::class, 'user_id');
}

}
