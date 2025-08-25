<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LoanStatusLog extends Model
{
    use HasFactory;

    protected $fillable = ['loan_application_id','changed_by','status','remarks'];
}
