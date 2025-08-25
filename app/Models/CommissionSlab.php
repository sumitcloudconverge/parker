<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CommissionSlab extends Model
{
    use HasFactory;

    protected $fillable = ['loan_type','commission_percent','min_amount','max_amount'];
}
