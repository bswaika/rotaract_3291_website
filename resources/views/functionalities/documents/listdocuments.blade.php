@extends('admin.layout.auth')

@section('content')
    <div class="container">
        @if(session()->has('success'))
            <div class="alert alert-success">
                <strong>Success!</strong> Document has been added!
            </div>
        @elseif(session()->has('update_success'))
            <div class="alert alert-warning">
                <strong>Success!</strong> Document has been updated!
            </div>
        @elseif(session()->has('delete_success'))
            <div class="alert alert-danger">
                <strong>Success!</strong> Document has been deleted!
            </div>
        @endif
        <h3 class="panel-heading">DOCUMENTS PANEL</h3>
        <form class="form-horizontal" method="POST" action="{{url('/admin/documents')}}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <label class="control-label col-sm-3" for="title">Title:</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="title" placeholder="Enter Document Title" name="title" required>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3" for="document">File: </label>
                <div class="col-sm-9">
                    <div class="input-group input-file" name="document">
                        <input type="text" class="form-control" placeholder='Max Size : 1.5 MB'>			
                        <span class="input-group-btn">
                            <button class="btn btn-primary btn-choose" type="button">Choose</button>
                        </span>        
                    </div>
                </div>  
            </div>
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-9">
                    <button type="submit" class="btn btn-success">Submit</button>                
                </div>
            </div>
        </form>
        <hr class="purple-hr">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead class="bg-primary text-white"> 
                    <tr> 
                        <th>#</th> 
                        <th>Document</th>
                        <th>Delete</th> 
                    </tr>
                </thead>
                <tbody id="adminDocumentsTable">
                @if(count($documents)>0)
                    @foreach($documents as $key=>$document)
                        <tr scope="row">
                            <td> {{$key+1}} </td>
                            <td> <a href="/storage/documents/{{$document->document}}" target="_blank"> {{$document->title}} </td>
                            <td><form method="POST" action="{{url('/admin/documents/'.$document->id)}}"> {{ csrf_field()}} {{method_field('DELETE')}} <button type="submit" class="btn btn-danger">Delete</button> </form></td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>    
@endsection