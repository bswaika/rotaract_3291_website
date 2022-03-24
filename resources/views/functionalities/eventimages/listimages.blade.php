@extends('admin.layout.auth')

@section('content')
    <div class="container">
        @if(session()->has('success'))
            <div class="alert alert-success">
                <strong>Success!</strong> Image has been added!
            </div>
        @elseif(session()->has('update_success'))
            <div class="alert alert-warning">
                <strong>Success!</strong> Image has been updated!
            </div>
        @elseif(session()->has('delete_success'))
            <div class="alert alert-danger">
                <strong>Sorry!</strong> No Image was uploaded!
            </div>
        @endif
        <h3 class="panel-heading">EVENT IMAGES PANEL</h3>
        <hr class="purple-hr">
        <div class="well">
            <strong class="text-primary">Search and Filter:</strong>
            <input class="form-control" id="adminEventImagesSearch" type="text">
        </div>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead class="bg-primary text-white"> 
                    <tr> 
                        <th>#</th> 
                        <th>Category</th>
                        <th>Type</th>
                        <th>Name</th>
                        <th>Poster</th> 
                        <th># of Images</th> 
                        <th>Add Image</th>
                        <th>View Images</th> 
                    </tr>
                </thead>
                <tbody id="adminEventImagesTable">
                @if(count($events)>0)
                    @foreach($events as $key=>$event)
                        <tr scope="row">
                            @if(strtotime($event->start_date)-strtotime('now')<0)
                                <td> {{$key+1}} </td>
                                <td> {{strtotime($event->start_date)-strtotime('now')>0 ? 'UPCOMING' : 'PAST'}} </td>
                                <td> {{$event->club_id==null ? 'DISTRICT' : 'CLUB'}} </td>
                                <td> {{$event->name}} </td>
                                @foreach($event->images as $image)
                                    @if($image->display_type==0)
                                        @if($image->image=='noimage.jpg')
                                            <td> NOT UPLOADED </td>
                                        @else
                                            <td> UPLOADED </td>
                                        @endif
                                    @endif
                                @endforeach
                                <td> {{count($event->images)-1}} </td>
                                <td>
                                    <form class="form-horizontal" method="POST" action="{{url('/admin/event/images/'.$event->id)}}" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div class="form-group col-sm-12">
                                            <div class="input-group input-file" name="image">
                                                <input type="text" class="form-control" placeholder='Max Size : 1.5 MB'>			
                                                <span class="input-group-btn">
                                                    <button class="btn btn-primary btn-choose" type="button">Choose</button>
                                                </span>        
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-12"> 
                                            <button type="submit" class="btn btn-default">Submit</button>
                                        </div>
                                    </form>
                                </td>
                                <td><a href="{{url('/admin/event/images/'.$event->id)}}" class="btn btn-primary">View Images</a></td>
                            @endif
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>    
@endsection