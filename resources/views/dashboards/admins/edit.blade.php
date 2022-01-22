@extends('dashboards.admins.layouts.admin-dash-layout')
@section('title','Dashboard')
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
                    Update Data </h4>
            </div>
           
            <form action="{{ url('dashboards/admin/update-invoice/'.$invoice->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row justify-content-between text-left">
                    <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Requested By<span class="text-danger"> *</span></label> <input type="text" id="fname" name="requested_by"  value="{{$invoice->requested_by}}"> <span class="text-danger">@error('requested_by'){{ $message }}@enderror</span> </div>
                    <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Aprouved By<span class="text-danger"> *</span></label> <input type="text" id="lname" name="aprouved_by"  value="{{$invoice->aprouved_by}}"  > <span class="text-danger">@error('aprouved_by'){{ $message }}@enderror</span> </div>
                </div>
                <div class="row justify-content-between text-left">
                    <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3"><span class="text-danger"> *</span></label> <input type="text" id="email" name="company"  value="{{$invoice->company}}"><span class="text-danger">@error('company'){{ $message }}@enderror</span>  </div>
                    <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Fournisseur<span class="text-danger"> *</span></label> <input type="text" id="mob" name="fournisseur" value="{{$invoice->fournisseur}}"> <span class="text-danger">@error('fournisseur'){{ $message }}@enderror</span> </div>
                    
                </div>
                <div class="row justify-content-between text-lCompanyeft">
                    <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Date<span class="text-danger"> *</span></label> <input type="date" id="job" name="date"value="{{$invoice->date}}" > <span class="text-danger">@error('date'){{ $message }}@enderror</span> </div>
                    <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Invoice No<span class="text-danger"> *</span></label> <input type="text" id="job" name="invoice_no" value="{{$invoice->invoice_no}}" ><span class="text-danger">@error('invoice_no'){{ $message }}@enderror</span>  </div>
                    
                </div>
                <div class="row justify-content-between text-left">
                    <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Invoice Image<span class="text-danger"> *</span></label> <input type="file" id="ans" name="invoice_image" placeholder="" >  <img src="{{ asset('uploads/invoice/'.$invoice->invoice_image) }}" width="70px" height="70px" alt="Image"><span class="text-danger">@error('invoice_image'){{ $message }}@enderror</span> </div>
                    <div class="form-group col-sm-6 flex-column d-flex">  <label class="form-control-label px-3"><span class="text-danger"> </span></label><button type="submit" class="btn btn-primary">Update Po</button> </div>
                </div>
             
            </form>
        </div>
    </div>
</div>



@endsection