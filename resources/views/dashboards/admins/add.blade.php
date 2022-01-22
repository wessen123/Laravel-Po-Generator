@extends('dashboards.admins.layouts.admin-dash-layout')
@section('title','Dashboard')
@section('content')

@section('content')

<div class="row d-flex justify-content-center">
   

    <div class="col-xl-7 col-lg-8 col-md-9 col-12 text-center">
    
        <div class="card">
            @if (session('status'))
            <h6 class="alert alert-success">{{ session('status') }}</h6>
        @endif
            <div class="row d-flex justify-content-left">
                <h4>
                    <a href="{{ url('admin/settings') }}" class="btn btn-danger float-end">BACK</a>
                    Add User </h4>
            </div>
           
            <form action="{{ url('dashboards/admin/add-users') }}" method="POST" enctype="multipart/form-data"class="form-card"  >
                @csrf 
                <div class="row justify-content-between text-left">
                    <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">name<span class="text-danger"> *</span></label> <input type="text" id="fname" name="name" placeholder="" ><span class="text-danger">@error('name'){{ $message }}@enderror</span> </div>
                   
                </div>
                <div class="row justify-content-between text-left">
                   
                    <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">email<span class="text-danger"> *</span></label> <input type="text" id="lname" name="email" placeholder="Enter your last name"><span class="text-danger">@error('email'){{ $message }}@enderror</span> </div>
                    
                </div>
                <div class="row justify-content-between text-left">
                    <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">password<span class="text-danger"> *</span></label> <input type="text" id="email" name="password" placeholder=""><span class="text-danger">@error('password'){{ $message }}@enderror</span> </div>
                    
                </div>
                <div class="row justify-content-between text-left">
                    <div class="form-group col-sm-6 flex-column d-flex">
                        <label class="form-control-label px-3">Role<span class="text-danger"> *</span></label>
                <select class="form-select" aria-label="Default select example " name="role">
                  
                    <option value="1">Admin[1]</option>
                    <option value="2">User[2]</option>
                    <option value="3">Not allowed[3] </option>
                  </select>
                  <span class="text-danger">@error('role'){{ $message }}@enderror</span>
                    </div>
                </div>
                <div class="row justify-content-between text-left">
                   
                    <div class="form-group col-sm-6 flex-column d-flex">  <label class="form-control-label px-3"><span class="text-danger"> </span></label><button type="submit" class="btn btn-primary">Add User</button> </div>
                </div>
             
            </form>
        </div>
    </div>
</div>

  
@endsection