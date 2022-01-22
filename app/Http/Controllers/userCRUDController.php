<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class userCRUDController extends Controller
{
    public function create()
    {
        return view('dashboards.admins.add');
    }
    public function store(Request $request)
    {
        $validateddata= $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'role' => ['required'],

       
        ]);
        $user = new User;
   
        $user->name = $request->input('name');
        $user->email= $request->input('email');
        $user->password = \Hash::make($request->password);
        $user->role = $request->role;
        
        $user->save();
        return redirect()->back()->with('status','user Added Successfully');
    } 
    public function edituser($id)
    {
        $user= user::find($id);
        return view('dashboards.admins.editUser', compact('user'));
    }
    public function update(Request $request, $id)
    {

        $validateddata= $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'min:1','max:255'],
            'password' => ['required', 'string', 'min:8'],
            'role' => ['required'],
        ]);
        $user = User::find($id);
      
        $user->name = $request->input('name');
        $user->email= $request->input('email');
        $user->password = \Hash::make($request->password);
        $user->role = $request->role;
        
        $user->update();
        return redirect()->back()->with('status','user updated Successfully');

  
    }
}
