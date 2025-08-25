<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\CommissionSlab;
use App\Models\DsaCommission;

class LoanApplication extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id','full_name','email','phone','dob','gender',
        'aadhaar_number','pan_number','address','city','state','pincode',
        'loan_amount','loan_type','tenure_months','annual_income',
        'employment_type','company_name','designation',
        'dsa_id','status','commission_percent','commission_amount','documents'
    ];

    protected $casts = ['documents' => 'array', 'dob' => 'date'];

    protected static function booted()
    {
        static::saving(function ($loan) {
            if ((float)$loan->commission_percent == 0 && $loan->loan_type) {
                $slab = CommissionSlab::where('loan_type', $loan->loan_type)
                    ->where('min_amount','<=',$loan->loan_amount)
                    ->where(function($q) use ($loan){ $q->whereNull('max_amount')->orWhere('max_amount','>=',$loan->loan_amount); })
                    ->first();
                if ($slab) $loan->commission_percent = $slab->commission_percent;
            }
        });

        static::saved(function ($loan) {
            if ($loan->status === 'approved' && $loan->dsa_id) {
                $amount = ($loan->loan_amount * $loan->commission_percent) / 100;
                $loan->updateQuietly(['commission_amount' => $amount]);
                DsaCommission::updateOrCreate(
                    ['loan_application_id'=>$loan->id,'dsa_id'=>$loan->dsa_id],
                    ['commission_percent'=>$loan->commission_percent,'commission_amount'=>$amount,'status'=>'pending']
                );
            }
        });
    }
}
