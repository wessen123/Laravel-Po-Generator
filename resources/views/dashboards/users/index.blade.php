@extends('dashboards.users.layouts.user-dash-layout')
@section('title','Dashboard')

@section('content')


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <link rel="icon" type="image/png"  sizes="16x16" href="">

    
</head>

            
            <div class="container-fluid">
                
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                   
                              
                                <a href="{{ url('dashboards/user/add-invoice') }}" class="btn btn-success btn-lg  btn-primary float-end" title="Add New Contact">
                                    <i class="fa fa-plus" aria-hidden="true"></i> Add New
                                </a>
                                <div class="table-responsive-lg">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                               
                                                <th>Po</th>
                                                <th>Requested By</th>
                                                <th>Aprouved By</th>
                                                <th>Company</th>
                                                <th>Fournisseur</th>
                                                <th>Date</th>
                                                <th>Invoice No</th>
                                                <th>Invoice Image</th>
                                                <th>Action</th>
                                                
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                           
                                                <th>Po</th>
                                                <th>Requested By</th>
                                                <th>Aprouved By</th>
                                                <th>Company</th>
                                                <th>Fournisseur</th>
                                                <th>Date</th>
                                                <th>Invoice No</th>
                                                <th>Invoice Image</th>
                                                <th>Action</th>
                                                
                                            </tr>
                                        </tfoot>
                                        @foreach ($invoice as $item)
                                        <tr>
                                            
                                            <td>{{ $item->po }}</td>
                                            <td>{{ $item->requested_by }}</td>
                                            <td>{{ $item->aprouved_by }}</td>
                                            <td>{{ $item->company }}</td>
                                            <td>{{ $item->fournisseur }}</td>
                                            <td>{{ $item->date }}</td>
                                            <td>{{ $item->invoice_no}}</td>
                                          
                                            <td>
                                                <img src="{{ asset('uploads/invoice/'.$item->invoice_image) }}" width="70px" height="70px" alt="Image">
                                            </td>
                                            <td>
                                                <a href="{{ url('/dashboards' .'/user'.'/show'.'/'. $item->id) }}" title="View Student"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                                                <a href="{{ url('/dashboards'.'/user'.'/edit-invoice'.'/'. $item->id ) }}" title="Edit Student"><button class="btn btn-primary btn-sm"><i class="fas fa-edit" aria-hidden="true"></i></button></a>
                                                <form method="POST" action="{{ url('/dashboards' .'/user'. '/delete-invoice'.'/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                    {{ method_field('DELETE') }}
                                                    {{ csrf_field() }}
                                                    <button type="submit"  class="btn btn-xs btn-danger" title="Delete " onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash" data-toggle="tooltip" title="Delete"></i></i> </button>
                                                   
                                                </form>
                                               
                                            </td>
                                           
                                        </tr>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                     
                      
                    </div>
                </div>
                
            </div>
            

 
</body>

</html>



@endsection