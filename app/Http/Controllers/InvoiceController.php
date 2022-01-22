<?php

namespace App\Http\Controllers;
use App\Models\Invoice;
use Illuminate\Http\Request;


class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoices = Invoice::all();
        return view ('dashboards.admins.index')->with('invoices', $invoices);
    }

 
    public function create()
    {
        return view('dashboards.admins.create');
    }

   
    public function store(Request $request)
    {
        $input = $request->all();
        Invoice::create($input);
        return redirect('dashboards/admin')->with('flash_message', 'Invoice Addedd!'); 
    }

  
    public function show($id)
    {
        $invoices = Po::find($id);
        return view('dashboards.admins.show')->with('invoices', $invoices);
    }

    
    public function edit($id)
    {
        $invoices = Invoice::find($id);
        return view('dashboards.admins.edit')->with('invoices', $invoices);
    }

  
    public function update(Request $request, $id)
    {
        $invoices = Invoice::find($id);
        $input = $request->all();
        $invoices->update($input);
        return redirect('dashboards/admins')->with('flash_message', 'information Updated!');  
    }

    
    public function destroy($id)
    {
        Invoice::destroy($id);
        return redirect('dashboards/admin')->with('flash_message', 'Contact deleted!');
    }
}
