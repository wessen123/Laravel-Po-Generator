@extends('dashboards.admins.layouts.admin-dash-layout')
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
                   
                              <div class="card-header">
                                <h4>
                                    <a href="{{ url('dashboards/admin') }}" class="btn btn-danger float-end">BACK</a>
                                     Information about  {{ $invoices->po }}  </h4>
                            </div>
                              
                                <div class="table-responsive-lg">
                                    <table id="exampleRTYT" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                               
                                                <th>Po</th>
                                                <th>Requested by</th>
                                                <th>Aprouved by</th>
                                                <th>Company</th>
                                                <th>Fournisseur</th>
                                                <th>Date</th>
                                                <th>Invoice No</th>
                                                <th>Invoice Image</th>
                                           
                                                

                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                           
                                                <th>Po</th>
                                                <th>Requested by</th>
                                                <th>Aprouved by</th>
                                                <th>Company</th>
                                                <th>Fournisseur</th>
                                                <th>Date</th>
                                                <th>Invoice No</th>
                                                <th>Invoice Image</th>
                                             
                                                
                                            </tr>
                                        </tfoot>
                                   
                                        <tr>
                                            
                                            <td>{{ $invoices->po }}</td>
                                            <td>{{ $invoices->requested_by }}</td>
                                            <td>{{ $invoices->aprouved_by }}</td>
                                            <td>{{ $invoices->company }}</td>
                                            <td>{{ $invoices->fournisseur }}</td>
                                            <td>{{ $invoices->date }}</td>
                                            <td>{{ $invoices->invoice_no}}</td>
                                          
                                            <td>
                                                <img src="{{ asset('uploads/invoice/'.$invoices->invoice_image) }}" width="70px" height="70px" alt="Image">
                                            </td>
                                          
                                           
                                        </tr>
                                       
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