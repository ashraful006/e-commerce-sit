@extends('admin.admin_master')


@section('admin')
<div class="py-12">
    <div class="container">
        <div class="row">


            <div class="col-md-8"> 
            
                <div class="card">
                    <div class="card-header">Edit Contact</div>
                    <div class="card-body">   
                    <form action="{{url('admin/contact/update/'.$contact->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            
                            <div class="form-group py-2">
                                <label>Upadate Location:</label>
                                <textarea class="form-control" name="location" rows="4" >{{$contact->location}}</textarea>
                                @error('location')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                
                            </div>
                            <div class="form-group">
                                <label>Upadate email:</label>
                                <input type="text" name="email" class="form-control"  value="{{$contact->email}}">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                
                            </div>
                            <div class="form-group">
                                <label>Upadate phone:</label>
                                <input type="text" name="phone" class="form-control"  value="{{$contact->phone}}">
                                @error('phone')
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