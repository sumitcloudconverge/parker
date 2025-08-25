<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LoanDocument extends Model
{
    use HasFactory;

    protected $fillable = ['loan_application_id','document_type','file_path','status','remarks'];
}
