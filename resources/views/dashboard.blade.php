<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">Serial</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Create At</th>
                    </tr>
                </thead>
                <tbody>
                    @php( $List_count=1 )
                    @foreach( $users as $var )
                    <tr>
                        <td>{{ $List_count }}</td>
                        <td>{{ $var->name }}</td>
                        <td>{{ $var->email }}</td>
                        <td>{{ Carbon\Carbon::parse($var->created_at)->diffForHumans() }}</td>
                    </tr>
                    @php( $List_count++ )
                    @endforeach
                    
                </tbody>
                </table>

            </div>
        </div>
    </div>
</x-app-layout>
