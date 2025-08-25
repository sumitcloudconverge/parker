<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\LoanApplication;


class Dsas extends Model
{
    use HasFactory;

    protected $fillable = ['name','email','phone','password','company_name','city','state','status'];

    protected $hidden = ['password'];

    public function loanApplications()
    {
        return $this->hasMany(LoanApplication::class);
    }
}
