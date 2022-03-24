@extends('admin.layout.authdp')

@section('content')
    <div class="container">
        <h3 class="panel-heading">APPROVE APPOINTMENT</h3>
        <a href="/admin/appointments" class="btn btn-primary">Go Back</a>
        <hr class="purple-hr">
        <form class="form-horizontal" method="POST" action="{{url('/admin/appointments/'.$appointment->id.'/approve')}}">
            {{ csrf_field() }}
            <div class="form-group">
              <label class="control-label col-sm-3" for="name">Name:</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="name" value = "{{ $appointment->name }}" name="name" required disabled>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-3" for="contact">Contact:</label>
              <div class="col-sm-9"> 
                <input type="text" class="form-control" id="contact" value = "{{ $appointment->contact }}" name="contact" required disabled>
              </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3" for="email">Email:</label>
                <div class="col-sm-9"> 
                    <input type="email" class="form-control" id="email" value = "{{ $appointment->email }}" name="email" required disabled>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3" for="dob">Date of Appointment:</label>
                <div class="col-sm-9">
                    <input type="text" class="datepicker form-control" id="date" placeholder="Enter Preferred Date (DD/MM/YYYY)" value = "{{ date('d/m/Y H:i', strtotime($appointment->date)) }}" name="date" required>
                </div>
                <script type="text/javascript">

                    $('.datepicker').datetimepicker({
                        format : "DD/MM/YYYY HH:mm"
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