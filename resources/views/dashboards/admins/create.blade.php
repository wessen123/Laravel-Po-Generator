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
                    <a href="{{ url('dashboards/admin') }}" class="btn btn-danger float-end">BACK</a>
                    Add Data </h4>
            </div>
           
            <form action="{{ url('dashboards/admin/add-invoice') }}" method="POST" enctype="multipart/form-data"class="form-card"  >
                @csrf
                <div class="row justify-content-between text-left">
                    <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Requested By<span class="text-danger"> *</span></label> <input type="text" id="fname" name="requested_by" placeholder="" ><span class="text-danger">@error('requested_by'){{ $message }}@enderror</span> </div>
                    <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Aprouved By<span class="text-danger"> *</span></label> <input type="text" id="lname" name="aprouved_by" placeholder=""><span class="text-danger">@error('aprouved_by'){{ $message }}@enderror</span> </div>
                </div>
                <div class="row justify-content-between text-left">
                    <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Company<span class="text-danger"> *</span></label> <input type="text" id="email" name="company" placeholder=""><span class="text-danger">@error('company'){{ $message }}@enderror</span> </div>
                    <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Fournisseur<span class="text-danger"> *</span></label> <input type="text" id="mob" name="fournisseur" placeholder="" > <span class="text-danger">@error('fournisseur'){{ $message }}@enderror</span> </div>
                    
                </div>
                <div class="row justify-content-between text-left">
                    <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Date<span class="text-danger"> *</span></label> <input type="date" id="job" name="date" placeholder="" ><span class="text-danger">@error('date'){{ $message }}@enderror</span> </div>
                    <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Invoice No<span class="text-danger"> *</span></label> <input type="text" id="job" name="invoice_no" > <span class="text-danger">@error('invoice_no'){{ $message }}@enderror</span></div>
                    
                </div>
                <div class="row justify-content-between text-left">
                    <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Invoice Image<span class="text-danger"> *</span></label> <input type="file" id="ans" name="invoice_image" placeholder="" ><span class="text-danger">@error('invoice_image'){{ $message }}@enderror</span> </div>
                    <div class="form-group col-sm-6 flex-column d-flex">  <label class="form-control-label px-3"><span class="text-danger"> </span></label><button type="submit" class="btn btn-primary">Save Po</button> </div>
                </div>
             
            </form>
        </div>
    </div>
</div>

  
@endsection