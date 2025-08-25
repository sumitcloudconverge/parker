<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DsaCommission extends Model
{
    use HasFactory;

    protected $fillable = ['dsa_id','loan_application_id','commission_percent','commission_amount','status','paid_at'];

    protected $casts = ['paid_at' => 'date'];
}
