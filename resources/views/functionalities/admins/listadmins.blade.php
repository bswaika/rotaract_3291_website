@extends('admin.layout.auth')

@section('content')
    <div class="container">
        @if(session()->has('success'))
            <div class="alert alert-success">
                <strong>Success!</strong> Admin has been added!
            </div>
        @endif
        <h3 class="panel-heading">REGISTER ADMINS PANEL</h3>
        <a href="/admin/admins/create" class="btn btn-primary">Add Admin</a>
        <hr class="purple-hr">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead class="bg-primary text-white"> 
                    <tr> 
                        <th>#</th> 
                        <th>Name</th> 
                        <th>Email</th>
                        <th>Role</th> 
                    </tr>
                </thead>
                <tbody id="adminAdminsTable">
                @if(count($admins)>0)
                    @foreach($admins as $key=>$admin)
                        <tr scope="row">
                            <td> {{$key+1}} </td>
                            <td> {{$admin->name}} </td>
                            <td> {{$admin->email}} </td>
                            <td> {{$admin->type==0 ?'SUPER-ADMIN' : 'ADMIN'}} </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection