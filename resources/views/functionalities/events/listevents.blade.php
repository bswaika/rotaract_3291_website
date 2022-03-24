@extends('admin.layout.auth')

@section('content')
    <div class="container">
        @if(session()->has('success'))
            <div class="alert alert-success">
                <strong>Success!</strong> Event has been added!
            </div>
        @elseif(session()->has('update_success'))
            <div class="alert alert-warning">
                <strong>Success!</strong> Event has been updated!
            </div>
        @elseif(session()->has('delete_success'))
            <div class="alert alert-danger">
                <strong>Success!</strong> Event has been deleted!
            </div>
        @endif
        <h3 class="panel-heading">EVENTS PANEL</h3>
        <a href="/admin/events/create" class="btn btn-primary">Add Event</a>
        <hr class="purple-hr">
        <div class="well">
            <strong class="text-primary">Search and Filter:</strong>
            <input class="form-control" id="adminEventsSearch" type="text">
        </div>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead class="bg-primary text-white"> 
                    <tr> 
                        <th>#</th> 
                        <th>Category</th>
                        <th>Type</th>
                        <th>Name</th>
                        <th>Posted By</th>
                        <th>Service Avenue</th> 
                        <th>Venue</th> 
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Amount</th>
                        <th>Registration</th>
                        <th>Approved</th>
                        <th>Edit</th>
                        <th>Delete</th> 
                    </tr>
                </thead>
                <tbody id="adminEventsTable">
                @if(count($events)>0)
                    @foreach($events as $key=>$event)
                        <tr scope="row">
                            <td> {{$key+1}} </td>
                            <td> {{strtotime($event->start_date)-strtotime('now')>0 ? 'UPCOMING' : 'PAST'}} </td>
                            <td> {{$event->club_id==null ? 'DISTRICT' : 'CLUB'}} </td>
                            <td> {{$event->name}} </td>
                            <td> {{$event->club_id==null ? 'DISTRICT' : $event->club->name}} </td>
                            <td> {{$event->avenue!=null ? $event->avenue : 'N/A' }} </td>
                            <td> {{$event->venue}} </td>
                            <td> {{date('d/m/Y',strtotime($event->start_date))}} </td>
                            <td> {{date('d/m/Y',strtotime($event->end_date))}} </td>
                            <td> {{$event->reg_amount!=null ? $event->reg_amount : 'YET TO BE DISCLOSED' }} </td>
                            <td> {{strtotime($event->reg_close_date)-strtotime('now')>0 ? strtotime($event->reg_open_date)-strtotime('now')>0 ? 'YET TO OPEN' : 'OPEN' : 'CLOSED'}} </td>
                            <td> {{$event->status ? 'YES' : 'NO' }} </td>
                            <td><a href="/admin/events/{{$event->id}}/edit" class="btn btn-warning">Edit</a></td>
                            <td><form method="POST" action="{{url('/admin/events/'.$event->id)}}"> {{ csrf_field()}} {{method_field('DELETE')}} <button type="submit" class="btn btn-danger">Delete</button> </form></td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>

    
@endsection