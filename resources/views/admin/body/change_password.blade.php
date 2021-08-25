@extends('admin.admin_master')

@section('admin')

@if(session('error'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{session('error')}}</strong> 
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
<div class="card card-default">
    <div class="card-header card-header-border-bottom">
        <h2>Change Password</h2>
    </div>

    <div class="card-body">
        <form class="form-pill" method="POST" action="{{ route('admin.password.update') }}">
            
            @csrf
            <div class="form-group  py-1">
                <label for="exampleFormControlPassword3">Current Password:</label>
                <input type="password" class="form-control" id="current_password" name="old_password" placeholder="Current Password">
                @error('old_password')

                <span class="text-danger">{{ $message }}</span>
                    
                @enderror
            </div>
            
            <div class="form-group  py-1">
                <label>Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
            </div>
            @error('password')

                <span class="text-danger">{{ $message }}</span>
                    
            @enderror
            
            <div class="form-group py-1">
                <label>Password</label>
                <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Confirm password">
            </div>
            @error('password_confirmation')

                <span class="text-danger">{{ $message }}</span>
                    
            @enderror
            <div class="from-group">
                <button type="submit" class="btn btn-primary">Done</button>
            </div>

        </form>
    </div>
</div>


@endsection