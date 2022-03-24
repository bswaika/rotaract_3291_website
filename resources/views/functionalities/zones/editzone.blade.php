@extends('admin.layout.auth')

@section('content')
    <div class="container">
        <h3 class="panel-heading">EDIT ZONE</h3>
        <a href="/admin/zones" class="btn btn-primary">Go Back</a>
        <hr class="purple-hr">
        <form class="form-horizontal" method="POST" action="{{url('/admin/zones/'.$zone->id)}}">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div class="form-group">
              <label class="control-label col-sm-3" for="name">Name:</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="name" placeholder="Enter Zone Name" name="name" value="{!!$zone->name!!}" required>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-3" for="rep">Representative:</label>
              <div class="col-sm-9"> 
                <input type="text" class="form-control" id="rep" placeholder="Enter Zone Representative" value="{!!$zone->zone_rep!!}" name="rep" required>
              </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3" for="sec">Secretary:</label>
                <div class="col-sm-9"> 
                    <input type="text" class="form-control" id="sec" placeholder="Enter Zone Secretary" value="{!!$zone->zone_sec!!}" name="sec" required>
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