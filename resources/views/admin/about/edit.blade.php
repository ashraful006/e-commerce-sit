@extends('admin.admin_master')


@section('admin')
<div class="py-12">
    <div class="container">
        <div class="row">


            <div class="col-md-8"> 
            
                <div class="card">
                    <div class="card-header">Edit About</div>
                    <div class="card-body">   
                    <form action="{{url('about/update/'.$about->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Upadate Title</label>
                                <input type="text" name="title" class="form-control" placeholder="Enter name" value="{{$about->title}}">
                                @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                
                            </div>
                            <div class="form-group py-2">
                                <label>Upadate short description</label>
                                <textarea class="form-control" name="short_description" rows="4" >{{$about->short_description}}</textarea>
                                @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                
                            </div>
                            <div class="form-group py-2">
                                <label>Upadate description</label>
                                <textarea class="form-control" name="description" rows="4" >{{$about->description}}</textarea>
                                @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                
                            </div>

                        
                            <button type="submit" class="btn btn-primary">Update</button>
                            
                        </form>
                    </div>

                
                </div>

        </div>
    </div>
</div>
@endsection