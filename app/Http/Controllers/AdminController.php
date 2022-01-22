<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\Invoice;

class AdminController extends Controller
{
    function index(){
        $users = User::all();
       // return view('dashboards.admins.index');
       
    //return view ('dashboards.admins.index')->with('invoices', $invoices);
       }

    public function update(Request $request, $id)
    {
        $invoices = Invoice::find($id);
        $input = $request->all();
        $invoices->update($input);
        return redirect('dashboards.admins.index')->with('flash_message', 'information Updated!');  
    }



   
       function profile(){
          
           return view('dashboards.admins.profile');
       }
       function settings(){
        $users = User::all();
           return view('dashboards.admins.settings', compact('users'));
       }
       public function destroy($id)
       {
           $users = User::find($id);
          
           $users->delete();
           return redirect()->back()->with('status','user Deleted Successfully');
       }
    
   
       /**
        * Create a new user instance after a valid registration.
        *
        * @param  array  $data
        * @return \App\Models\User
        */
        public function usercreate()
    {
        return view('dashboards.admins.add');
    }

    public function userstore(Request $request)
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
       function updateInfo(Request $request){
           
        $validator = \Validator::make($request->all(),[
            'name'=>'required',
            'email'=> 'required|email|unique:users,email,'.Auth::user()->id,
        ]);

        if(!$validator->passes()){
            return response()->json(['status'=>0,'error'=>$validator->errors()->toArray()]);
        }else{
             $query = User::find(Auth::user()->id)->update([
                  'name'=>$request->name,
                  'email'=>$request->email,
             ]);

             if(!$query){
                 return response()->json(['status'=>0,'msg'=>'Something went wrong.']);
             }else{
                 return response()->json(['status'=>1,'msg'=>'Your profile info has been update successfuly.']);
             }
            
        }
}

function updatePicture(Request $request){
    $path = 'users/images/';
    $file = $request->file('admin_image');
    $new_name = 'UIMG_'.date('Ymd').uniqid().'.jpg';

    //Upload new image
    $upload = $file->move(public_path($path), $new_name);
    
    if( !$upload ){
        return response()->json(['status'=>0,'msg'=>'Something went wrong, upload new picture failed.']);
    }else{
        //Get Old picture
        $oldPicture = User::find(Auth::user()->id)->getAttributes()['picture'];

        if( $oldPicture != '' ){
            if( \File::exists(public_path($path.$oldPicture))){
                \File::delete(public_path($path.$oldPicture));
            }
        }

        //Update DB
        $update = User::find(Auth::user()->id)->update(['picture'=>$new_name]);

        if( !$upload ){
            return response()->json(['status'=>0,'msg'=>'Something went wrong, updating picture in db failed.']);
        }else{
            return response()->json(['status'=>1,'msg'=>'Your profile picture has been updated successfully']);
        }
    }
}

function changePassword(Request $request){
    //Validate form
    $validator = \Validator::make($request->all(),[
        'oldpassword'=>[
            'required', function($attribute, $value, $fail){
                if( !\Hash::check($value, Auth::user()->password) ){
                    return $fail(__('The current password is incorrect'));
                }
            },
            'min:8',
            'max:30'
         ],
         'newpassword'=>'required|min:8|max:30',
         'cnewpassword'=>'required|same:newpassword'
     ],[
         'oldpassword.required'=>'Enter your current password',
         'oldpassword.min'=>'Old password must have atleast 8 characters',
         'oldpassword.max'=>'Old password must not be greater than 30 characters',
         'newpassword.required'=>'Enter new password',
         'newpassword.min'=>'New password must have atleast 8 characters',
         'newpassword.max'=>'New password must not be greater than 30 characters',
         'cnewpassword.required'=>'ReEnter your new password',
         'cnewpassword.same'=>'New password and Confirm new password must match'
     ]);

    if( !$validator->passes() ){
        return response()->json(['status'=>0,'error'=>$validator->errors()->toArray()]);
    }else{
         
     $update = User::find(Auth::user()->id)->update(['password'=>\Hash::make($request->newpassword)]);

     if( !$update ){
         return response()->json(['status'=>0,'msg'=>'Something went wrong, Failed to update password in db']);
     }else{
         return response()->json(['status'=>1,'msg'=>'Your password has been changed successfully']);
     }
    }
}

}
