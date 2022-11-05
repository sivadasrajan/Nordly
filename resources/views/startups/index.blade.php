@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-4 rounded">
        <h1>Startups</h1>
        <div class="lead">
            Manage your startups here.
            <a href="{{ route('startups.create') }}" class="btn btn-primary btn-sm float-right">Add new startup</a>
        </div>
        
        <div class="mt-2">
            @include('layouts.partials.messages')
        </div>

        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col" width="1%">#</th>
                <th scope="col" width="15%">Name</th>
                <th scope="col">Email</th>
                <th scope="col" width="10%">Username</th>
                <th scope="col" width="1%" colspan="3"></th>    
            </tr>
            </thead>
            <tbody>
                @foreach($startups as $startup)
                    <tr>
                        <th scope="row">{{ $startup->id }}</th>
                        <td>{{ $startup->name }}</td>
                        <td>{{ $startup->phone }}</td>
                        <td>{{ $startup->sector }}</td>
                        <td><a href="{{ route('startups.show', $startup->id) }}" class="btn btn-warning btn-sm">Show</a></td>
                        <td><a href="{{ route('startups.edit', $startup->id) }}" class="btn btn-info btn-sm">Edit</a></td>
                        <td>
                            {!! Form::open(['method' => 'DELETE','route' => ['startups.destroy', $startup->id],'style'=>'display:inline']) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="d-flex">
            {!! $startups->links() !!}
        </div>

    </div>
@endsection