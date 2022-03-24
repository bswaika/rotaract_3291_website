@extends('admin.layout.authck')

@section('content')
    <div class="container">
        @if(session()->has('fail'))
        <div class="alert alert-danger">
            <strong>Failure!</strong> One or more fields were empty!
        </div>
        @endif
        <h3 class="panel-heading">EDIT EVENT BLOG</h3>
        <a href="/admin/event/blogs" class="btn btn-primary">Go Back</a>
        <hr class="purple-hr">
        <form class="form-horizontal" method="POST" action="{{url('/admin/event/blogs/'.$event_blog->id)}}">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div class="form-group">
                <label class="control-label col-sm-3" for="event">Event:</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="event" name="event" value = "{{$event_blog->event->name}}" required disabled>
                </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-3" for="title">Title:</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="title" placeholder="Enter Blog Title" name="title" value = "{{$event_blog->title}}" required>
              </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3" for="body">Body:</label>
                <div class="col-sm-9">
                    <textarea class="form-control ckeditor" rows="10" id="body" name="body" placeholder="Write a Blog about the Event" style="resize:none;" required>{!!$event_blog->body!!}</textarea>
                </div>
            </div>
            <div class="form-group"> 
              <div class="col-sm-offset-3 col-sm-9">
                <button type="submit" class="btn btn-success">Submit</button>
                <button type="reset" class="btn btn-warning">Reset</button>
              </div>
            </div>
        </form>  
    </div>
@endsection