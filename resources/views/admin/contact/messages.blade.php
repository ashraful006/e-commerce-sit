@extends('admin.admin_master')

@section('admin')





<div class="py-12">
    <div class="container">

        
        <div class="row">
            
            <div class="col-md-12">
            
                <div class="card">
                    
                    <div class="card-header">All Contact's Messages</div>
            
            
            
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">Serial</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Subject</th>
                            <th scope="col">message</th>
                            <th scope="col">Created at</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach($contact_messages as $var)
                            <tr>
                                <td width="5%" scope="row">{{ $loop->iteration }}</td>
                                <td width="25%">{{$var->name}}</td>
                                <td width="20%">{{$var->email}}</td>
                                <td width="20%">{{$var->subject}}</td>
                                <td width="20%">{{$var->message}}</td>
                                
                                <td width="10%">
                                    @if($var->created_at == NULL)
                                    <span class="text-danger">Not available</span>
                                    @else
                                    {{ $var->created_at->diffForHumans()}}
                                    @endif
                                    
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
