<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            All Category
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row">

                <div class="col-md-8">
                
                    <div class="card">
                        @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{session('success')}}</strong> 
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif
                        <div class="card-header">All Category</div>
                
                
                
                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">Serial</th>
                                <th scope="col">User</th>
                                <th scope="col">Category Name</th>
                                <th scope="col">Create At</th>
                                <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- @php($i=1) -->
                                @foreach($categories as $var)
                                <tr>
                                    <td scope="row">{{ $categories->firstItem()+$loop->index }}</td>
                                    <td>{{$var->user->name}}</td>
                                    <td>{{$var->category_name}}</td>
                                    
                                    <td>
                                        @if($var->created_at == NULL)
                                        <span class="text-danger">Not available</span>
                                        @else
                                        {{ $var->created_at->diffForHumans()}}
                                        @endif
                                        
                                    </td>
                                    <td>
                                    <a href="{{url('category/edit/'.$var->id)}}" class="btn btn-info">Edit</a>
                                    <a href="{{url('category/softdelete/'.$var->id)}}" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                                
                                
                            </tbody>
                        </table>
                        {{ $categories->appends(['trash_categories' =>$trash_categories->currentPage()])->links() }}
                    </div>
                </div>

                <div class="col-md-4">
                
                    <div class="card">
                        <div class="card-header">Add Category</div>
                        <div class="card-body">   
                        <form action="{{ route('store.category') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Category Name</label>
                                    <input type="text" name="category_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name">
                                    @error('category_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">Add Category</button>
                            </form>
                        </div>

                    
                    </div>

            </div>
        </div>








    <!-- trash -->


        <div class="container">
            <div class="row">

                <div class="col-md-8">
                
                    <div class="card">
                        
                        <div class="card-header">Trashed Category</div>
                
                
                
                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">Serial</th>
                                <th scope="col">User</th>
                                <th scope="col">Category Name</th>
                                <th scope="col">Create At</th>
                                <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- @php($i=1) -->
                                @foreach($trash_categories as $var)
                                <tr>
                                    <td scope="row">{{ $trash_categories->firstItem()+$loop->index }}</td>
                                    <td>{{$var->user->name}}</td>
                                    <td>{{$var->category_name}}</td>
                                    
                                    <td>
                                        @if($var->created_at == NULL)
                                        <span class="text-danger">Not available</span>
                                        @else
                                        {{ $var->created_at->diffForHumans()}}
                                        @endif
                                        
                                    </td>
                                    <td>
                                    <a href="{{ url('category/restore/'.$var->id) }}" class="btn btn-info">Restore</a>
                                    <a href="{{ url('category/permanentdelete/'.$var->id) }}" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                                
                                
                            </tbody>
                        </table>
                        {{ $trash_categories->appends(['categories' =>$categories->currentPage()])->links() }}
                    </div>
                </div>

                
        </div>





    <!-- endTrash     -->













    </div>
</x-app-layout>
