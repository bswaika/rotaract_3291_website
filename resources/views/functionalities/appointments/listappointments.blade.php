@extends('admin.layout.auth')

@section('content')
    <div class="container">
        @if(session()->has('success'))
            <div class="alert alert-success">
                <strong>Success!</strong> Appointment has been approved!
            </div>
        @elseif(session()->has('update_success'))
            <div class="alert alert-warning">
                <strong>Success!</strong> Appointment has been updated!
            </div>
        @elseif(session()->has('delete_success'))
            <div class="alert alert-danger">
                <strong>Success!</strong> Appointment has been deleted!
            </div>
        @endif
        <h3 class="panel-heading">APPOINTMENTS PANEL</h3>
        <hr class="purple-hr">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead class="bg-primary text-white"> 
                    <tr> 
                        <th>#</th> 
                        <th>Name</th> 
                        <th>Email</th>
                        <th>Contact</th>
                        <th>Date and Time</th>
                        <th>Status</th> 
                    </tr>
                </thead>
                <tbody id="adminAppointmentsTable">
                @if(count($appointments)>0)
                    @foreach($appointments as $key=>$appointment)
                        <tr scope="row">
                            <td> {{$key+1}} </td>
                            <td> {{$appointment->name}} </td>
                            <td> {{$appointment->email}} </td>
                            <td> {{$appointment->contact}} </td>
                            <td> {{date('d/m/Y H:i', strtotime($appointment->date))}} </td>
                            @if($appointment->replied==false)
                                <td><a href="/admin/appointments/{{$appointment->id}}/approve" class="btn btn-success">Approve</a></td>
                            @else
                                <td>APPROVED</td>
                            @endif
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection