@extends('club.layouts.appdpck')

@section('content')
    <div class="container">
        @if(session()->has('fail'))
        <div class="alert alert-danger">
            <strong>Failure!</strong> One or more fields were empty!
        </div>
        @endif
        <h3 class="panel-heading">EDIT EVENT</h3>
        <a href="/club/events" class="btn btn-primary">Go Back</a>
        <hr class="purple-hr">
        <form class="form-horizontal" method="POST" action="{{url('/club/events/'.$event->id)}}" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div class="form-group">
                <label class="control-label col-sm-3" for="poster">Poster:</label>
                <div class="col-sm-9">
                    <div class="input-group input-file" name="poster">
                        <input type="text" class="form-control" placeholder='Upload Event Poster (Max Size : 1.5 MB)'>			
                        <span class="input-group-btn">
                            <button class="btn btn-primary btn-choose" type="button">Choose</button>
                        </span>        
                    </div>
                </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-3" for="name">Name:</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="name" placeholder="Enter Event Name" name="name" value=" {{$event->name}} " required>
              </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3" for="avenue">Avenue of Service:</label>
                <div class="col-sm-9">
                    <select class="form-control" id="avenue" name="avenue" required>
                    @if($event->avenue == null)
                        <option value="" selected disabled>Select Avenue of Service</option>
                        <option value="Club Service">Club Service</option>
                        <option value="Community Service">Community Service</option>
                        <option value="Professional Development">Professional Development</option>
                        <option value="International Service">International Service</option>
                    @elseif($event->avenue == "Club Service")
                    	<option value="" disabled>Select Avenue of Service</option>         
                        <option value="Club Service" selected>Club Service</option>
                        <option value="Community Service">Community Service</option>
                        <option value="Professional Development">Professional Development</option>
                        <option value="International Service">International Service</option>
                    @elseif($event->avenue == "Community Service")    
                        <option value="" disabled>Select Avenue of Service</option>         
                        <option value="Club Service" >Club Service</option>
                        <option value="Community Service" selected>Community Service</option>
                        <option value="Professional Development">Professional Development</option>
                        <option value="International Service">International Service</option>
                    @elseif($event->avenue == "Professional Development")    
                        <option value="" disabled>Select Avenue of Service</option>         
                        <option value="Club Service" >Club Service</option>
                        <option value="Community Service">Community Service</option>
                        <option value="Professional Development" selected>Professional Development</option>
                        <option value="International Service">International Service</option>
                    @elseif($event->avenue == "International Service")
                        <option value="" disabled>Select Avenue of Service</option>         
                        <option value="Club Service" selected>Club Service</option>
                        <option value="Community Service">Community Service</option>
                        <option value="Professional Development">Professional Development</option>
                        <option value="International Service" selected>International Service</option>                  
                    @endif
                    </select>
                </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-3" for="venue">Venue:</label>
              <div class="col-sm-9"> 
                <input type="text" class="form-control" id="venue" placeholder="Enter Event Venue" name="venue" value=" {{$event->venue}} " required>
              </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3" for="description">Description:</label>
                <div class="col-sm-9">
                    <textarea class="form-control ckeditor" rows="5" id="description" name="description" placeholder="Write a few lines about the Event" style="resize:none;">{!!$event->description!!}</textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3" for="start">Start Date:</label>
                <div class="col-sm-9">
                    <input type="text" class="datepicker form-control" id="start" placeholder="Enter Event Start Date (DD/MM/YYYY)" name="start" value=" {{$start}} " required>
                </div>
                <script type="text/javascript">

                    $('.datepicker').datetimepicker({
                        format : "DD/MM/YYYY"
                    });
                
                </script>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3" for="end">End Date:</label>
                <div class="col-sm-9">
                    <input type="text" class="datepicker form-control" id="end" placeholder="Enter Event End Date (DD/MM/YYYY)" name="end" value=" {{$end}} " required>
                </div>
                <script type="text/javascript">

                    $('.datepicker').datetimepicker({
                        format : "DD/MM/YYYY"
                    });
                
                </script>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3" for="open">Reg Open Date:</label>
                <div class="col-sm-9">
                    <input type="text" class="datepicker form-control" id="open" placeholder="Enter Event Registration Open Date (DD/MM/YYYY)" name="open" value=" {{$open}} " required>
                </div>
                <script type="text/javascript">

                    $('.datepicker').datetimepicker({
                        format : "DD/MM/YYYY"
                    });
                
                </script>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3" for="close">Reg Close Date:</label>
                <div class="col-sm-9">
                    <input type="text" class="datepicker form-control" id="close" placeholder="Enter Event Registration Close Date (DD/MM/YYYY)" name="close" value=" {{$close}} " required>
                </div>
                <script type="text/javascript">

                    $('.datepicker').datetimepicker({
                        format : "DD/MM/YYYY"
                    });
                
                </script>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3" for="amount">Amount:</label>
                <div class="col-sm-9"> 
                    <input type="number" class="form-control" id="amount" placeholder="Enter Event Registration Amount" name="amount" value= {{$event->reg_amount}} >
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3" for="reg">Registration Link:</label>
                <div class="col-sm-9"> 
                    <input type="text" class="form-control" id="reg" placeholder="Enter Event Registration Link" name="reg" value=" {{$event->reg_link}} " >
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3" for="fb">Facebook Link:</label>
                <div class="col-sm-9"> 
                    <input type="text" class="form-control" id="fb" placeholder="Enter Event Facebook Link" name="fb" value=" {{$event->fb_link}} " >
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3" for="tw">Twitter Link:</label>
                <div class="col-sm-9"> 
                    <input type="text" class="form-control" id="tw" placeholder="Enter Event Twitter Link" name="tw" value=" {{$event->tw_link}} " >
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3" for="ins">Instagram Link:</label>
                <div class="col-sm-9"> 
                    <input type="text" class="form-control" id="ins" placeholder="Enter Event Instagram Link" name="ins" value=" {{$event->ins_link}} " >
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