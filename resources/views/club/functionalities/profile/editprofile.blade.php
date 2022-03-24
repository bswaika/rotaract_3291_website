@extends('club.layouts.appdpck')

@section('content')
    <div class="container">
        @if(session()->has('success'))
            <div class="alert alert-success">
                <strong>Success!</strong> Club Profile has been updated
            </div>
        @endif
        <h3 class="panel-heading">EDIT PROFILE</h3>
        <hr class="purple-hr">
        <form class="form-horizontal" method="POST" action="{{url('/club/profile')}}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <label class="control-label col-sm-3" for="zone">Zone:</label>
                <div class="col-sm-9">
                    <select class="form-control" id="zone" name="zone" required>
                        <option value="" selected disabled>Select Zone</option>
                        @if(count($zones)>0)
                            @foreach($zones as $zone)
                                @if($zone->id==$club->zone_id)
                                    <option value="{{ $zone->id }}" selected>{{ $zone->name }}</option>
                                @endif
                                <option value="{{ $zone->id }}"> Zone-{{$zone->id}} </option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3" for="logo">Logo:</label>
                <div class="col-sm-9">
                    <div class="input-group input-file" name="logo">
                        <input type="text" class="form-control" placeholder='{{$club->logo!=null? "Already Uploaded! Upload if you want to change (Max Size : 1.5 MB)" : "Upload Club Logo (Max Size : 1.5 MB)"}}'>			
                        <span class="input-group-btn">
                            <button class="btn btn-primary btn-choose" type="button">Choose</button>
                        </span>        
                    </div>
                </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-3" for="name">Name:</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="name" placeholder="Enter Club Name" value="{{ $club->name!=null ? $club->name :''}}" name="name" required>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-3" for="contact">Contact:</label>
              <div class="col-sm-9"> 
                <input type="text" class="form-control" id="contact" placeholder="Enter Club Contact" value="{{ $club->contact!=null ? $club->contact :''}}" name="contact" required>
              </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3" for="email">Email:</label>
                <div class="col-sm-9"> 
                    <input type="email" class="form-control" id="email" placeholder="Enter Club Email" value="{{ $club->email!=null ? $club->email :''}}" name="email" required>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3" for="about">About:</label>
                <div class="col-sm-9">
                    <textarea class="form-control ckeditor" rows="5" id="about" name="about" placeholder="Write a few lines about your Club" style="resize:none;">{!!$club->about!=null ? $club->about :''!!}</textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3" for="est">Establishment Year:</label>
                <div class="col-sm-9">
                    <input type="text" class="datepicker form-control" id="est" placeholder="Enter Club's Establishment Year (YYYY)" value="{{ $club->established_in!=null ? $club->established_in :''}}" name="est" required>
                </div>
                <script type="text/javascript">

                    $('.datepicker').datetimepicker({
                        format : "YYYY"
                    });
                
                </script>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3" for="parent">Parent Rotary:</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="parent" placeholder="Enter Club's Parent Rotary Club" value="{{ $club->parent_rotary!=null ? $club->parent_rotary :''}}" name="parent" required>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3" for="meet_venue">Meeting Venue:</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="meet_venue" placeholder="Enter Club's Meeting Venue" value="{{ $club->meet_venue!=null ? $club->meet_venue :''}}" name="meet_venue">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3" for="meet_time">Meeting Day and Time (Day in full and Time in HH:MM in 24-hour format):</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="meet_time" placeholder="Enter Club's Meeting Day and Time" value="{{ $club->meet_time!=null ? $club->meet_time :''}}" name="meet_time">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3" for="website">Website Link:</label>
                <div class="col-sm-9"> 
                    <input type="text" class="form-control" id="website" placeholder="Enter Club Website Link" value="{{ $club->website!=null ? $club->website :''}}" name="website">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3" for="fb">Facebook Link:</label>
                <div class="col-sm-9"> 
                    <input type="text" class="form-control" id="fb" placeholder="Enter Club Facebook Link" value="{{ $club->fb_link!=null ? $club->fb_link :''}}" name="fb">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3" for="tw">Twitter Link:</label>
                <div class="col-sm-9"> 
                    <input type="text" class="form-control" id="tw" placeholder="Enter Club Twitter Link" value="{{ $club->tw_link!=null ? $club->tw_link :''}}" name="tw">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3" for="ins">Instagram Link:</label>
                <div class="col-sm-9"> 
                    <input type="text" class="form-control" id="ins" placeholder="Enter Club Instagram Link" value="{{ $club->ins_link!=null ? $club->ins_link :''}}" name="ins">
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