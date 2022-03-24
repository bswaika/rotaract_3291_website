@extends('admin.layout.authck')

@section('content')
    <div class="container">
        <h3 class="panel-heading">WRITE REPLY</h3>
        <a href="/admin/messages" class="btn btn-primary">Go Back</a>
        <hr class="purple-hr">
        <form class="form-horizontal" method="POST" action="{{url('/admin/messages/'.$message->id)}}">
            {{ csrf_field() }}
            <div class="form-group">
              <label class="control-label col-sm-3" for="subject">Subject:</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="subject" placeholder="Enter Reply Subject" name="subject" required>
              </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3" for="message">Message:</label>
                <div class="col-sm-9">
                    <textarea class="form-control ckeditor" rows="10" id="message" name="message" style="resize:none;" required></textarea>
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