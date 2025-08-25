<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customers extends Model
{
    use HasFactory;

    protected $fillable = ['name','email','phone','address','city','state','pincode'];

    public function loanApplications()
    {
        return $this->hasMany(LoanApplication::class);
    }
}
