@extends('club.layouts.appdpck')

@section('content')
    <div class="container">
        @if(session()->has('success'))
            <div class="alert alert-success">
                <strong>Success!</strong> Club's President has been updated
            </div>
        @endif
        <h3 class="panel-heading">PRESIDENT PROFILE</h3>
        <hr class="purple-hr">
        <form class="form-horizontal" method="POST" action="{{url('/club/president')}}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <label class="control-label col-sm-3" for="image">Image:</label>
                <div class="col-sm-9">
                    <div class="input-group input-file" name="image">
                        <input type="text" class="form-control" placeholder='{{$club->president->image!=null? "Already Uploaded! Upload if you want to change (Max Size : 1.5 MB)" : "Upload President Image (Max Size : 1.5 MB)"}}'>			
                        <span class="input-group-btn">
                            <button class="btn btn-primary btn-choose" type="button">Choose</button>
                        </span>        
                    </div>
                </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-3" for="name">Name:</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="name" placeholder="Enter President's Name" value="{{ $club->president->name!=null ? $club->president->name :''}}" name="name" required>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-3" for="contact">Contact:</label>
              <div class="col-sm-9"> 
                <input type="text" class="form-control" id="contact" placeholder="Enter President's Contact" value="{{ $club->president->contact!=null ? $club->president->contact :''}}" name="contact" required>
              </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3" for="email">Email:</label>
                <div class="col-sm-9"> 
                    <input type="email" class="form-control" id="email" placeholder="Enter President's Email" value="{{ $club->president->email!=null ? $club->president->email :''}}" name="email" required>
                </div>
            </div>
            <div class="form-group"> 
              <div class="col-sm-offset-3 col-sm-9">
                <button type="submit" class="btn btn-success">Submit</button>
              </div>
            </div>
        </form>  
    </div>
@endsection