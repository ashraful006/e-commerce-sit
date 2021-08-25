@extends('admin.admin_master')

@section('admin')


<div class="py-12">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom">
                        <h2>Add About</h2>
                    </div>

                    <div class="card-body">
                        <form action="{{route('store.home.about')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Title:</label>
                                <input type="text" class="form-control" name="title" placeholder="Enter title">
                            </div>

                            <div class="form-group">
                                <label>Short description:</label>
                                <textarea class="form-control" name="short_description" rows="4"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Description:</label>
                                <textarea class="form-control" name="description" rows="4"></textarea>
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