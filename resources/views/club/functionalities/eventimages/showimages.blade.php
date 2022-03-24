@extends('club.layouts.app')

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
                <strong>Success!</strong> Image has been deleted!
            </div>
        @endif
        <h3 class="panel-heading">{{$event->name}} : Images</h3>
        <a href="/club/event/images" class="btn btn-primary">Go Back</a>
        <hr class="purple-hr">
        <div class="row">
            @foreach($event->images as $key=>$image)
                @if($image->display_type==0)
                    <div class="col-sm-12 col-md-12">
                        <img src="/storage/event_posters/{{$image->image}}" alt="Event Poster" class="poster img-rounded" style="width:100%; height:50vh; object-fit:cover;">
                    </div>
                    <div class="col-sm-12">
                        <hr>
                    </div>
                @else
                    <div class="col-sm-12 col-md-4">
                        <div class="thumbnail">
                            <img src="/storage/event_images/{{$image->image}}" alt="Event Image" style="width:100%; height:20vh; object-fit:cover;">
                            <div class="caption">
                                <a href="{{url('/club/event/images/'.$image->id.'/delete')}}" class="btn btn-danger">Delete</a>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>    
@endsection