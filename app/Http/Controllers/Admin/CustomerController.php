<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function index()
    {
        $items = Customers::latest()->paginate(15);
        return view('admin.customers.index', compact('items'));
    }

    public function create() 
    { 
        return view('admin.customers.create'); 
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'=>'required','email'=>'nullable|email|unique:customers','phone'=>'required|unique:customers',
            'address'=>'nullable','city'=>'nullable','state'=>'nullable','pincode'=>'nullable'
        ]);
        Customers::create($data);
        return redirect()->route('admin.customers.index')->with('success','Customer created.');
    }

    public function edit(Customer $customer) 
    { 
        return view('admin.customers.edit', compact('customer')); 
    }

    public function update(Request $request, Customer $customer)
    {
        $data = $request->validate([
            'name'=>'required','email'=>'nullable|email|unique:customers,email,'.$customer->id,'phone'=>'required|unique:customers,phone,'.$customer->id,
            'address'=>'nullable','city'=>'nullable','state'=>'nullable','pincode'=>'nullable'
        ]);
        $customer->update($data);
        return redirect()->route('admin.customers.index')->with('success','Customer updated.');
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect()->route('admin.customers.index')->with('success','Customer deleted.');
    }
}
