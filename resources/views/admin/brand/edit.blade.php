@extends('admin.admin_master')


@section('admin')
<div class="py-12">
    <div class="container">
        <div class="row">


            <div class="col-md-8"> 
            
                <div class="card">
                    <div class="card-header">Edit Brand</div>
                    <div class="card-body">   
                    <form action="{{url('brand/update/'.$brand->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Upadate Brand Name</label>
                                <input type="text" name="brand_name" class="form-control" id="BrandName" aria-describedby="emailHelp" placeholder="Enter name" value="{{$brand->brand_name}}">
                                @error('brand_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Upadate Brand Image</label>
                                
                                <input type="file" name="brand_image" class="form-control" id="BrandName" aria-describedby="emailHelp" >
                                @error('brand_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                
                            </div>
                            <div>
                                <img src="{{ asset($brand->brand_image) }}" alt="" style="width:300px; height:200px">

                            </div>
                            <button type="submit" class="btn btn-primary">Update Brand</button>
                        </form>
                    </div>

                
                </div>

        </div>
    </div>
</div>
@endsection