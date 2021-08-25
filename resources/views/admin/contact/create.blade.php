@extends('admin.admin_master')

@section('admin')


<div class="py-12">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom">
                        <h2>Add Contact</h2>
                    </div>

                    <div class="card-body">
                        <form action="{{route('store.contact')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            
                            <div class="form-group">
                                <label>Location:</label>
                                <textarea class="form-control" name="location" rows="4"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Email:</label>
                                <input type="text" class="form-control" name="email" placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label>Phone:</label>
                                <input type="text" class="form-control" name="phone" placeholder="Enter phone">
                            </div>


                            <div class="form-footer pt-4 pt-5 mt-4 border-top">
                                <button type="submit" class="btn btn-primary btn-default">Submit</button>
                                <button type="submit" class="btn btn-secondary btn-default">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>

                
            </div>
        </div>
    </div>


@endsection