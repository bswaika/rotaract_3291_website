@extends('admin.layout.auth')

@section('content')
    <div class="container">
        @if(session()->has('success'))
            <div class="alert alert-success">
                <strong>Success!</strong> Event has been approved!
            </div>
        @elseif(session()->has('update_success'))
            <div class="alert alert-warning">
                <strong>Success!</strong> Event has been updated!
            </div>
        @elseif(session()->has('delete_success'))
            <div class="alert alert-danger">
                <strong>Success!</strong> Event has been unapproved!
            </div>
        @endif
        <h3 class="panel-heading">EVENT APPROVALS PANEL</h3>
        <hr class="purple-hr">
        <div class="well">
            <strong class="text-primary">Search and Filter:</strong>
            <input class="form-control" id="adminEventApprovalsSearch" type="text">
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
                        <th>Approved</th> 
                        <th>Action</th> 
                    </tr>
                </thead>
                <tbody id="adminEventApprovalsTable">
                @if(count($events)>0)
                    @foreach($events as $key=>$event)
                        <tr scope="row">
                                <td> {{$key+1}} </td>
                                <td> {{strtotime($event->start_date)-strtotime('now')>0 ? 'UPCOMING' : 'PAST'}} </td>
                                <td> {{$event->club_id==null ? 'DISTRICT' : 'CLUB'}} </td>
                                <td> {{$event->name}} </td>
                                <td class="text-primary"> {{$event->club_id==null ? 'DISTRICT' : $event->club->name}} </td>
                                <td> {{$event->status ? 'YES' : 'NO' }} </td>
                                <td>
                                    @if($event->status)
                                        <form method="POST" action="{{url('/admin/event/'.$event->id.'/unapprove')}}"> {{ csrf_field()}} <button type="submit" class="btn btn-danger">Unapprove</button> </form>
                                    @else
                                        <form method="POST" action="{{url('/admin/event/'.$event->id.'/approve')}}"> {{ csrf_field()}} <button type="submit" class="btn btn-success">Approve</button> </form>
                                    @endif
                                </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection