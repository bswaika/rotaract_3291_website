@extends('club.layouts.app')

@section('content')
    <div class="container">
        @if(session()->has('success'))
            <div class="alert alert-success">
                <strong>Success!</strong> Member has been added!
            </div>
        @elseif(session()->has('update_success'))
            <div class="alert alert-warning">
                <strong>Success!</strong> Member has been updated!
            </div>
        @elseif(session()->has('delete_success'))
            <div class="alert alert-danger">
                <strong>Success!</strong> Member has been deleted!
            </div>
        @endif
        <h3 class="panel-heading">MEMBERS PANEL</h3>
        <a href="/club/members/create" class="btn btn-primary">Add Member</a>
        <hr class="purple-hr">
        <div class="well">
            <strong class="text-primary">Search and Filter:</strong>
            <input class="form-control" id="adminMembersSearch" type="text">
        </div>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead class="bg-primary text-white"> 
                    <tr> 
                        <th>#</th> 
                        <th>Name</th> 
                        <th>Email</th>
                        <th>Contact</th>
                        <th>Blood Group</th>
                        <th>Edit</th>
                        <th>Delete</th> 
                    </tr>
                </thead>
                <tbody id="adminMembersTable">
                @if(count($members)>0)
                    @foreach($members as $key=>$member)
                        <tr scope="row">
                            <td> {{$key+1}} </td>
                            <td> {{$member->name}} </td>
                            <td> {{$member->email}} </td>
                            <td> {{$member->contact}} </td>
                            <td> {{$member->bg != null ? $member->bg : 'NOT YET ENTERED' }} </td> 
                            <td><a href="/club/members/{{$member->id}}/edit" class="btn btn-warning">Edit</a></td>
                            <td><form method="POST" action="{{url('/club/members/'.$member->id)}}"> {{ csrf_field()}} {{method_field('DELETE')}} <button type="submit" class="btn btn-danger">Delete</button> </form></td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection