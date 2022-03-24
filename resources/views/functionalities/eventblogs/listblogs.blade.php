@extends('admin.layout.auth')

@section('content')
    <div class="container">
        @if(session()->has('success'))
            <div class="alert alert-success">
                <strong>Success!</strong> Blog has been added!
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
        <h3 class="panel-heading">EVENT BLOGS PANEL</h3>
        <a href="/admin/event/blogs/create" class="btn btn-primary">Add Event Blog</a>
        <hr class="purple-hr">
        <div class="well">
            <strong class="text-primary">Search and Filter:</strong>
            <input class="form-control" id="adminEventBlogsSearch" type="text">
        </div>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead class="bg-primary text-white"> 
                    <tr> 
                        <th>#</th> 
                        <th>Category</th>
                        <th>Type</th>
                        <th>Name</th>
                        <th>Title</th> 
                        <th>Edit</th>
                        <th>Delete</th> 
                    </tr>
                </thead>
                <tbody id="adminEventBlogsTable">
                @if(count($events)>0)
                    @foreach($events as $key=>$event)
                        <tr scope="row">
                            @if(strtotime($event->start_date)-strtotime('now')<0)
                                <td> {{$key+1}} </td>
                                <td> {{strtotime($event->start_date)-strtotime('now')>0 ? 'UPCOMING' : 'PAST'}} </td>
                                <td> {{$event->club_id==null ? 'DISTRICT' : 'CLUB'}} </td>
                                <td> {{$event->name}} </td>
                                <td> {{$event->blog->title}} </td>
                                <td><a href="/admin/event/blogs/{{$event->blog->id}}/edit" class="btn btn-warning">Edit</a></td>
                                <td><form method="POST" action="{{url('/admin/event/blogs/'.$event->blog->id)}}"> {{ csrf_field()}} {{method_field('DELETE')}} <button type="submit" class="btn btn-danger">Delete</button> </form></td>
                            @endif
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>    
@endsection