@extends('layouts.app')
@section('content')
        <table>
        <tr>
            <th>S.N</th>
            <th>Name</th>
            <th>Role</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
        @foreach ($user as $u)
            <tr>
                <td>
                    {{$loop->iteration}}
                </td>
            <td>{{$u->name}}</td>
            <td>{{$u->role}}</td>
            <td>{{$u->email}}</td>
            <td><a href="{{route('user.edit',['id' => $u->id])}}">Edit</a>
                <a href="{{route('user.delete',['id' => $u->id])}}">Delete</a></td>
            </tr>
        @endforeach

    </table>
@endsection
