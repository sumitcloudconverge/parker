<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommissionSlabSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('commission_slabs')->insert([
            ['loan_type'=>'personal','commission_percent'=>2.0,'min_amount'=>0,'max_amount'=>500000,'created_at'=>now(),'updated_at'=>now()],
            ['loan_type'=>'personal','commission_percent'=>1.5,'min_amount'=>500001,'max_amount'=>null,'created_at'=>now(),'updated_at'=>now()],
            ['loan_type'=>'home','commission_percent'=>1.0,'min_amount'=>0,'max_amount'=>null,'created_at'=>now(),'updated_at'=>now()],
            ['loan_type'=>'business','commission_percent'=>2.5,'min_amount'=>0,'max_amount'=>null,'created_at'=>now(),'updated_at'=>now()],
        ]);
    }
}
