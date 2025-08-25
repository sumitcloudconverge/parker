<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DemoDataSeeder extends Seeder
{
    public function run(): void
    {
        // DSAs
        $dsas = [
            ['name'=>'Parker Finance','email'=>'parker@dsa.com','phone'=>'9876543210'],
            ['name'=>'Avani Loans','email'=>'avani@dsa.com','phone'=>'9123456780'],
            ['name'=>'Metro Money','email'=>'metro@dsa.com','phone'=>'9000012345'],
        ];
        DB::table('dsas')->insert(array_map(fn($d)=>$d+['created_at'=>now(),'updated_at'=>now()], $dsas));

        // Customers
        $customers = [
            ['name'=>'Rahul Sharma','email'=>'rahul@example.com','phone'=>'9991112222','city'=>'Mumbai','state'=>'MH'],
            ['name'=>'Priya Singh','email'=>'priya@example.com','phone'=>'8883334444','city'=>'Delhi','state'=>'DL'],
            ['name'=>'Aman Verma','email'=>'aman@example.com','phone'=>'7775556666','city'=>'Pune','state'=>'MH'],
            ['name'=>'Kiran Rao','email'=>'kiran@example.com','phone'=>'9898989898','city'=>'Bengaluru','state'=>'KA'],
        ];
        DB::table('customers')->insert(array_map(fn($c)=>$c+['created_at'=>now(),'updated_at'=>now()], $customers));

        // Loan Applications
        $loanTypes = ['personal','home','business','car'];
        for ($i=1;$i<=12;$i++) {
            $custId = rand(1, count($customers));
            $dsaId = rand(1, count($dsas));
            $loanAmt = rand(100000, 1500000);
            $type = $loanTypes[array_rand($loanTypes)];
            DB::table('loan_applications')->insert([
                'customer_id'=>$custId,
                'full_name'=>DB::table('customers')->where('id',$custId)->value('name'),
                'email'=>DB::table('customers')->where('id',$custId)->value('email'),
                'phone'=>DB::table('customers')->where('id',$custId)->value('phone'),
                'loan_amount'=>$loanAmt,
                'loan_type'=>$type,
                'status'=> $i % 4 === 0 ? 'approved' : ($i % 3 === 0 ? 'in_review' : 'pending'),
                'dsa_id'=>$dsaId,
                'commission_percent'=>0,
                'commission_amount'=>0,
                'created_at'=>now(),
                'updated_at'=>now(),
            ]);
        }

        // Documents with local files
        $apps = DB::table('loan_applications')->pluck('id');
        foreach ($apps as $appId) {
            foreach (['pan','aadhaar'] as $docType) {
                $dir = "loan-documents/{$appId}";
                $filename = $docType.'-'.Str::random(6).'.txt';
                Storage::disk('public')->put("$dir/$filename", strtoupper($docType)." DUMMY FILE for loan #$appId");
                DB::table('loan_documents')->insert([
                    'loan_application_id'=>$appId,
                    'document_type'=>$docType,
                    'file_path'=>"$dir/$filename",
                    'status'=> 'pending',
                    'created_at'=>now(),
                    'updated_at'=>now(),
                ]);
            }
        }
    }
}
