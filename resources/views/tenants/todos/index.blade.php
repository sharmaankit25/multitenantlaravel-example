@extends('layouts.app')

@section('content')
<div class="container">
    <a class="btn btn-success" href="{{ route('todos.create') }}">Create</a>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Todos</div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Title</th>
                                <th>Status</th>
                                <th>Due Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($todos as $todo)
                            <tr>
                                <td>{{ $todo->id }}</td>
                                <td>{{ $todo->title }}</td>
                                <td>{{ $todo->status }}</td>
                                <td>{{ $todo->due_date }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
