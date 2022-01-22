<?php

namespace App\Http\Controllers;
use Auth;
use App\Models\Po;
use app\Helpers\Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class PoController extends Controller
{
    public function index()
    {
        $invoice = Po::all();
        return view('dashboards.admins.index', compact('invoice'));
    }

    public function create()
    {
        return view('dashboards.admins.create');
    }
    public function usercreate()
    {
        return view('dashboards.admins.add');
    }
    public function save(Request $request)
    {
        $validateddata= $request->validate([
            'name'=>['required', 'string','min:1', 'max:255'],
            'email'=>['required', 'string', 'min:1','max:255'],
            'password'=>['required', 'string', 'min:8'],
       
        ]);
        $user = new User;
   
        $user->name = $request->input('name');
        $user->email= $request->input('email');
        $user->password = $request->input('password');
        
        $user->save();
        return redirect()->back()->with('status','user Added Successfully');
    }
    public function store(Request $request)
    {
        $validateddata= $request->validate([
            'requested_by'=>['required', 'string','min:1', 'max:255'],
            'aprouved_by'=>['required', 'string', 'min:1','max:255'],
            'company'=>['required', 'string', 'min:1','max:255'],
            'fournisseur'=>['required', 'string', 'min:1','max:255'],
            'date'=>['required', 'date', 'min:1','max:255'],
            'invoice_no'=>['required', 'string', 'min:1','max:255'],
            'invoice_image'=>['required', 'max:1100'],


        ]);

        $po= Helper::IDGenerator(new Po, 'po', 5, 'PON'); /** Generate id */
        $invoice = new Po;
        $invoice->po = $po;
        
        //$invoice->po = $request->input('po');
        $invoice->requested_by = $request->input('requested_by');
        $invoice->aprouved_by = $request->input('aprouved_by');
        $invoice->company = $request->input('company');
        $invoice->fournisseur = $request->input('fournisseur');
        $invoice->date = $request->input('date');
        $invoice->invoice_no = $request->input('invoice_no');
        if($request->hasfile('invoice_image'))
        {
            $file = $request->file('invoice_image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/invoice/', $filename);
            $invoice->invoice_image = $filename;
        }
        $invoice->save();
        return redirect()->back()->with('status','Po Information Added Successfully');
    }
    public function show($id)
    {
        $invoice = Po::find($id);
        return view('dashboards.admins.show')->with('invoices', $invoice);
    }

    public function edit($id)
    {
        $invoice= Po::find($id);
        return view('dashboards.admins.edit', compact('invoice'));
    }

    public function update(Request $request, $id)
    {

        $validatedData= $request->validate([
            'requested_by'=>['required', 'string','min:1', 'max:255'],
            'aprouved_by'=>['required', 'string', 'min:1','max:255'],
            'company'=>['required', 'string', 'min:1','max:255'],
            'fournisseur'=>['required', 'string', 'min:1','max:255'],
            'date'=>['required'],
            'invoice_no'=>['required', 'string', 'max:255'],
            'invoice_image'=>['' ],


        ]);

        $invoice = Po::find($id);
       
        $invoice->requested_by = $request->input('requested_by');
        $invoice->aprouved_by = $request->input('aprouved_by');
        $invoice->company = $request->input('company');
        $invoice->fournisseur = $request->input('fournisseur');
        $invoice->date = $request->input('date');
        $invoice->invoice_no = $request->input('invoice_no');

        if($request->hasfile('invoice_image'))
        {
            $destination = 'uploads/invoice/'.$invoice->invoice_image;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
            $file = $request->file('invoice_image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/invoice/', $filename);
            $invoice->invoice_image = $filename;
        }

        $invoice->update();
        return redirect()->back()->with('status','Po Information Updated Successfully');
    }

    public function destroy($id)
    {
        $invoice = Po::find($id);
        $destination = 'uploads/invoice/'.$invoice->invoice_image;
        if(File::exists($destination))
        {
            File::delete($destination);
        }
        $invoice->delete();
        return redirect()->back()->with('status','Po Information Deleted Successfully');
    }
}