<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customers;
use App\Models\Dsas;
use App\Models\LoanApplication;
use App\Models\Customer;
use App\Models\Dsa;
use Illuminate\Http\Request;

class LoanApplicationController extends Controller
{
    public function index()
    {
        $items = LoanApplication::latest()->paginate(15);
        return view('admin.loan-applications.index', compact('items'));
    }

    public function create()
    {
        return view('admin.loan-applications.create', [
            'customers'=>Customers::orderBy('name')->get(),
            'dsas'=>Dsas::orderBy('name')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'customer_id'=>'nullable|exists:customers,id',
            'full_name'=>'required',
            'email'=>'nullable|email',
            'phone'=>'required',
            'loan_amount'=>'required|numeric|min:1000',
            'loan_type'=>'required|in:personal,home,car,education,business,gold,other',
            'tenure_months'=>'nullable|integer|min:1',
            'annual_income'=>'nullable|numeric|min:0',
            'employment_type'=>'nullable|in:salaried,self-employed,business,other',
            'company_name'=>'nullable','designation'=>'nullable',
            'dsa_id'=>'nullable|exists:dsas,id',
            'status'=>'required|in:pending,in_review,approved,rejected'
        ]);
        $app = LoanApplication::create($data);
        return redirect()->route('admin.loan-applications.edit',$app)->with('success','Loan application created.');
    }

    public function edit(LoanApplication $loan_application)
    {
        return view('admin.loan-applications.edit', [
            'app'=>$loan_application,
            'customers'=>Customers::orderBy('name')->get(),
            'dsas'=>Dsas::orderBy('name')->get(),
        ]);
    }

    public function update(Request $request, LoanApplication $loan_application)
    {
        $data = $request->validate([
            'customer_id'=>'nullable|exists:customers,id',
            'full_name'=>'required',
            'email'=>'nullable|email',
            'phone'=>'required',
            'loan_amount'=>'required|numeric|min:1000',
            'loan_type'=>'required|in:personal,home,car,education,business,gold,other',
            'tenure_months'=>'nullable|integer|min:1',
            'annual_income'=>'nullable|numeric|min:0',
            'employment_type'=>'nullable|in:salaried,self-employed,business,other',
            'company_name'=>'nullable','designation'=>'nullable',
            'dsa_id'=>'nullable|exists:dsas,id',
            'status'=>'required|in:pending,in_review,approved,rejected'
        ]);
        $loan_application->update($data);
        return redirect()->route('admin.loan-applications.index')->with('success','Loan application updated.');
    }

    public function destroy(LoanApplication $loan_application)
    {
        $loan_application->delete();
        return redirect()->route('admin.loan-applications.index')->with('success','Loan application deleted.');
    }
}
