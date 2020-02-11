@extends('layouts.app')

@section('content')
<div class="row d-flex justify-content-center">
    <div class="col-10 .container-fluid">
        <table class="table" id="my_table">
            <thead>
                <th>S.N</th>
                <th>Group</th>
                <th>Task</th>
                <th>Assign To</th>
                <th>Description</th>
            </thead>
            <tbody>
                @foreach ($task as $t)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$t->taskgroup->title}}</td>
                        <td>{{$t->task}}</td>
                        <td>{{$t->user->name}}</td>
                        <td>{{$t->description}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
