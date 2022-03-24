@extends('admin.layout.auth')

@section('content')
    <div class="container">
        @if(session()->has('success'))
            <div class="alert alert-success">
                <strong>Success!</strong> Registration Validated and Confirmed! Message Sent!
                <br>Balance : <strong>{{session('success')}} credits</strong>
            </div>
        @elseif(session()->has('failed'))
            <div class="alert alert-danger">
                <strong>Sorry!</strong> Message could not be sent and Registration could not be confirmed! Please try again!
            </div>
        @elseif(session()->has('cannot'))
            <div class="alert alert-danger">
                <strong>Sorry!</strong> Registration Limits have been reached! Cannot Register any more Participants! 
            </div>
        @endif
        <h3 class="panel-heading">SHAROD SWIKRITI REGISTRATIONS PANEL</h3>
        <div class="alert alert-warning">
            Validated Registrations Count: <strong>{{$sv}}</strong><br>
            @if($sv<600)
                <h4><strong>Registrations</strong> Open</h4>
            @else
                <h4><strong>Registrations</strong> Closed</h4>
            @endif
        </div>
        @if(Auth::guard('admin')->user()->type==0)
        <a href="/admin/pujo/export" class="btn btn-primary">Export Data</a>
        @endif
        <hr class="purple-hr">
        <div class="well">
            <strong class="text-primary">Search and Filter:</strong>
            <input class="form-control" id="adminPujoSearch" type="text">
        </div>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead class="bg-primary text-white"> 
                    <tr> 
                        <th>#</th> 
                        <th>Name</th> 
                        <th>Club</th> 
                        <th>Zone</th>
                        <th>Contact</th>
                        <th>Food</th>
                        <th>Payment</th>
                        <th>Validate</th>
                    </tr>
                </thead>
                <tbody id="adminPujoTable">
                @if(count($sss)>0)
                    @foreach($sss as $key=>$ss)
                        <tr scope="row">
                            <td> {{$key+1}} </td>
                            <td> {{$ss->name}} </td>
                            <td> {{$ss->club}} </td>
                            <td> @if($ss->zone==0) N/A @else Zone - {{$ss->zone}} @endif</td>
                            <td> {{$ss->contact}} </td>
                            <td> {!! $ss->food=='v'? '<span class="text-success"><strong>Veg</strong></span>' : '<span class="text-danger"><strong>Non-Veg</strong></span>' !!} </td>
                            <td> {{$ss->pay=='p'? 'Paytm' : 'Tez'}} </td>
                            <td>
                                @if($ss->validated)
                                <span class="text-success"><strong>Validated</strong></span>
                                @else
                                    <form method="POST" action="{{url('/admin/pujo/'.$ss->id.'/validate')}}"> {{ csrf_field()}} <button type="submit" class="btn btn-success">Validate</button> </form>
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