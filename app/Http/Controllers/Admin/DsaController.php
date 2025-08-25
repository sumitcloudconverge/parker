<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Dsas;
use Illuminate\Http\Request;

class DsaController extends Controller
{
    public function index()
    {
        $items = Dsas::latest()->paginate(15);
        return view('admin.dsas.index', compact('items'));
    }

    public function create() { return view('admin.dsas.create'); }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'=>'required','email'=>'required|email|unique:dsas','phone'=>'required|unique:dsas',
            'company_name'=>'nullable','city'=>'nullable','state'=>'nullable','status'=>'required|in:active,inactive'
        ]);
        Dsas::create($data);
        return redirect()->route('admin.dsas.index')->with('success','DSA created.');
    }

    public function edit(Dsa $dsa) { return view('admin.dsas.edit', compact('dsa')); }

    public function update(Request $request, Dsa $dsa)
    {
        $data = $request->validate([
            'name'=>'required','email'=>'required|email|unique:dsas,email,'.$dsa->id,'phone'=>'required|unique:dsas,phone,'.$dsa->id,
            'company_name'=>'nullable','city'=>'nullable','state'=>'nullable','status'=>'required|in:active,inactive'
        ]);
        $dsa->update($data);
        return redirect()->route('admin.dsas.index')->with('success','DSA updated.');
    }

    public function destroy(Dsa $dsa)
    {
        $dsa->delete();
        return redirect()->route('admin.dsas.index')->with('success','DSA deleted.');
    }
}
