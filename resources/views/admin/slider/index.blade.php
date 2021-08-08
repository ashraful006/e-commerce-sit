@extends('admin.admin_master')

@section('admin')





<div class="py-12">
    <div class="container">

        
        <div class="row">
            <div class="d-flex flex-row-reverse">
                <a class="pb-2" href="{{ route('add.home.slider') }}"><button class="btn btn-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                    </svg>
                    <span>Add Slider</span>
                </button></a>

            </div>
            <div class="col-md-12">
            
                <div class="card">
                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{session('success')}}</strong> 
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    <div class="card-header">All Sliders</div>
            
            
            
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">Serial</th>
                            <th scope="col">Title</th>
                            <th scope="col">Description</th>
                            <th scope="col">Slider Image</th>
                            <th scope="col">Create At</th>
                            <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach($sliders as $var)
                            <tr>
                                <td scope="row">{{ $sliders->firstItem()+$loop->index }}</td>
                                <td>{{$var->title}}</td>
                                <td>{{$var->description}}</td>
                                <td><img src="{{ asset($var->image) }}" style="height:40px; width:70px" alt=""></td>
                                
                                <td>
                                    @if($var->created_at == NULL)
                                    <span class="text-danger">Not available</span>
                                    @else
                                    {{ $var->created_at->diffForHumans()}}
                                    @endif
                                    
                                </td>
                                <td>
                                <a href="{{ url('brand/edit/'.$var->id) }}" class="btn btn-info">Edit</a>
                                <a href="{{ url('brand/delete/'.$var->id) }}"  onclick="return confirm('Are you sure want to delete this item?')" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                            
                            
                        </tbody>
                    </table>
                    
                </div>
            </div>

            
    </div>



</div>
@endsection
