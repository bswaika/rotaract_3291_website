@extends('admin.layout.auth')

@section('content')
    <div class="container">
        @if(session()->has('success'))
            <div class="alert alert-success">
                <strong>Success!</strong> Club has been added!
            </div>
        @endif
        <h3 class="panel-heading">REGISTER CLUBS PANEL</h3>
        <a href="/admin/clubs/create" class="btn btn-primary">Add Club</a>
        <hr class="purple-hr">
        <div class="well">
            <strong class="text-primary">Search and Filter:</strong>
            <input class="form-control" id="adminClubsSearch" type="text">
        </div>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead class="bg-primary text-white"> 
                    <tr> 
                        <th>#</th> 
                        <th>Name</th> 
                        <th>Email</th> 
                    </tr>
                </thead>
                <tbody id="adminClubsTable">
                @if(count($users)>0)
                    @foreach($users as $key=>$user)
                        <tr scope="row">
                            <td> {{$key+1}} </td>
                            <td> {{$user->club->name}} </td>
                            <td> {{$user->email}} </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection