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
                   
                              
                                <a href="{{ url('dashboards/admin/add-users') }}" class="btn btn-success btn-lg  btn-primary float-end" title="Add New Contact">
                                    <i class="fa fa-plus" aria-hidden="true"></i> Add New User
                                </a>
                                <div class="table-responsive-lg">
                                    <table id="example1" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                               
                                                <th>User Name</th>
                                                <th>Email</th>
                                                <th>Role [1:Admin 2:User 3:NA] </th>
                                                 <th>Action</th>
                                                
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                           
                                                <th>User Name</th>
                                                <th>Email</th>
                                                <th>Role [1:Admin 2:User 3:NA]  </th>
                                                 <th>Action</th>
                                                
                                            </tr>
                                        </tfoot>
                                        @foreach ($users as $item)
                                        <tr>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>{{ $item->role }}</td>
                                            <td>
                                               
                                                <a href="{{ url('/dashboards'.'/admin'.'/edit-user'.'/'. $item->id ) }}" title="Edit Student"><button class="btn btn-primary btn-sm"><i class="fas fa-edit" aria-hidden="true"></i></button></a>
                                                <form method="POST" action="{{url('/dashboards' .'/admin'. '/delete-user'.'/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
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