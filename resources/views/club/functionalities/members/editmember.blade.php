@extends('club.layouts.appdp')

@section('content')
    <div class="container">
        <h3 class="panel-heading">EDIT MEMBER</h3>
        <a href="/club/members" class="btn btn-primary">Go Back</a>
        <hr class="purple-hr">
        <form class="form-horizontal" method="POST" action="{{url('/club/members/'.$member->id)}}">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div class="form-group">
              <label class="control-label col-sm-3" for="name">Name:</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="name" placeholder="Enter Member Name" value = "{{ $member->name }}" name="name" required>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-3" for="contact">Contact:</label>
              <div class="col-sm-9"> 
                <input type="text" class="form-control" id="contact" placeholder="Enter Member Contact" value = "{{ $member->contact }}" name="contact" required>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-3" for="bg">Blood Group:</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="bg" placeholder="Enter Member Blood Group" value = "{{ $member->bg != null ? $member->bg : ''}}" name="bg">
              </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3" for="email">Email:</label>
                <div class="col-sm-9"> 
                    <input type="email" class="form-control" id="email" placeholder="Enter Member Email" value = "{{ $member->email }}" name="email" required>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3" for="dob">Date of Birth:</label>
                <div class="col-sm-9">
                    <input type="text" class="datepicker form-control" id="dob" placeholder="Enter Member DOB (DD/MM/YYYY)" value = "{{ $date }}" name="dob" required>
                </div>
                <script type="text/javascript">

                    $('.datepicker').datetimepicker({
                        format : "DD/MM/YYYY"
                    });
                
                </script>
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