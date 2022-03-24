@extends('admin.layout.auth')

@section('content')
    <div class="container">
        @if(session()->has('success'))
            <div class="alert alert-success">
                <strong>Success!</strong> Points have been updated!
            </div>
        @elseif(session()->has('update_success'))
            <div class="alert alert-warning">
                <strong>Success!</strong> Points has been updated!
            </div>
        @elseif(session()->has('delete_success'))
            <div class="alert alert-danger">
                <strong>Success!</strong> Points has been deleted!
            </div>
        @endif
        <h3 class="panel-heading">LEADERBOARD PANEL</h3>
        <hr class="purple-hr">
        <div class="well">
            <strong class="text-primary">Search and Filter:</strong>
            <input class="form-control" id="adminLeaderBoardSearch" type="text">
        </div>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead class="bg-primary text-white"> 
                    <tr> 
                        <th>Rank</th>
                        <th>Name</th>
                        <th>Points</th>
                        <th>Add/Subtract Points</th> 
                    </tr>
                </thead>
                <tbody id="adminLeaderBoardTable">
                @if(count($clubs)>0)
                    @foreach($clubs as $key=>$club)
                        <tr scope="row">
                            <td> {{$club->rank}} </td>
                            <td> {{$club->name}} </td>
                            <td> {{$club->points}} </td>
                            <td>
                                <form class="form-horizontal" method="POST" action="{{url('/admin/leaderboard/'.$club->id)}}">
                                    {{ csrf_field() }}
                                    <div class="form-group col-sm-12">
                                        <input type="number" class="form-control" placeholder='Enter Points' name="points" required>    
                                    </div>
                                    </div>
                                    <div class="form-group col-sm-12"> 
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>    
@endsection