@extends('admin.admin_master')


@section('admin')
<div class="py-12">
    <div class="container">
        <div class="row">


            <div class="col-md-8"> 
            
                <div class="card">
                    <div class="card-header">Edit Slider</div>
                    <div class="card-body">   
                    <form action="{{url('slider/update/'.$slider->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Upadate Title</label>
                                <input type="text" name="title" class="form-control" placeholder="Enter name" value="{{$slider->title}}">
                                @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Upadate description</label>
                                <textarea class="form-control" name="description" rows="4" >{{$slider->description}}</textarea>
                                @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Upadate Slider Image</label>
                                
                                <input type="file" name="image" class="form-control" >
                                @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                
                            </div>
                            <div class="py-2">
                                <label>Current image:</label>
                                <div>
                                    <img src="{{ asset($slider->image) }}" alt="" style="width:300px; height:200px">    
                                </div>
                                
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>

                
                </div>

        </div>
    </div>
</div>
@endsection