@extends('admin.layout.auth')

@section('content')
    <div class="container">
        @if(session()->has('success'))
            <div class="alert alert-success">
                <strong>Success!</strong> Mail has been sent!
            </div>
        @elseif(session()->has('update_success'))
            <div class="alert alert-warning">
                <strong>Success!</strong> Blog has been updated!
            </div>
        @elseif(session()->has('delete_success'))
            <div class="alert alert-danger">
                <strong>Success!</strong> Blog has been deleted!
            </div>
        @endif
        <h3 class="panel-heading">MESSAGES PANEL</h3>
        <hr class="purple-hr">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead class="bg-primary text-white"> 
                    <tr> 
                        <th>#</th> 
                        <th>Name</th>
                        <th>Email</th>
                        <th>Message</th>
                        <th>Replied</th>
                        <th>Action</th> 
                    </tr>
                </thead>
                <tbody id="adminMessagesTable">
                @if(count($messages)>0)
                    @foreach($messages as $key=>$message)
                        <tr scope="row">
                                <td> {{$key+1}} </td>
                                <td> {{$message->name}} </td>
                                <td> {{$message->email}} </td>
                                <td> {{$message->message}} </td>
                                <td> {{$message->replied ? 'YES' : 'NO'}} </td>
                                <td><a href="/admin/messages/{{$message->id}}/reply" class="btn btn-primary">Reply</a></td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>    
@endsection