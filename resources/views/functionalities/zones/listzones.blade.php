@extends('admin.layout.auth')

@section('content')
    <div class="container">
        @if(session()->has('success'))
            <div class="alert alert-success">
                <strong>Success!</strong> Zone has been added!
            </div>
        @elseif(session()->has('update_success'))
            <div class="alert alert-warning">
                <strong>Success!</strong> Zone has been updated!
            </div>
        @elseif(session()->has('delete_success'))
            <div class="alert alert-danger">
                <strong>Success!</strong> Zone has been deleted!
            </div>
        @endif
        <h3 class="panel-heading">ZONES PANEL</h3>
        <a href="/admin/zones/create" class="btn btn-primary">Add Zone</a>
        <hr class="purple-hr">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead class="bg-primary text-white"> 
                    <tr> 
                        <th>#</th> 
                        <th>Name</th> 
                        <th>Representative</th> 
                        <th>Secretary</th>
                        <th>Edit</th> 
                    </tr>
                </thead>
                @if(count($zones)>0)
                    @foreach($zones as $key=>$zone)
                        <tr scope="row">
                            <td> {{$key+1}} </td>
                            <td> {{$zone->name}} </td>
                            <td> {{$zone->zone_rep}} </td>
                            <td> {{$zone->zone_sec}} </td>
                            <td><a href="/admin/zones/{{$zone->id}}/edit" class="btn btn-warning">Edit</a></td>
                        </tr>
                    @endforeach
                @endif
            </table>
        </div>
    </div>
@endsection