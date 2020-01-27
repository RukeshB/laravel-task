@extends('layouts.app')

@section('content')
<table class="table">
    <thead>
        <tr>
            <th>S.N</th>
            <th>Name</th>
            <th>Gender</th>
            <th>Date of Birth</th>
            <th>Role</th>
            <th>Email</th>
            <th>Last Login</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>
        @php($i = 1)
        @foreach ($user as $u)
        @if(Auth::user()->id != $u->id)
            <tr>
                <td>{{$i}}</td>
                <td>{{$u->name}}</td>
                <td>{{$u->gender}}</td>
                <td>{{$u->dob}}</td>
                <td>{{$u->role->name}}</td>
                <td>{{$u->email}}</td>
                <td>{{\Carbon\Carbon::parse($u->last_login)->diffForHumans()}}</td>
                <td>
                    {{-- <a href="{{route('home.edit',['id' => $u->id])}}">Edit</a> --}}
                    @can('update', App\User::class)
                        <a href="{{route('home.edit',['id' => $u->id])}}">Edit</a>
                    @endcan

                    <a href="{{route('home.delete',['id' => $u->id])}}">Delete</a>
                </td>
            </tr>
            @php($i++)
            @endif
        @endforeach
    </tbody>

    </table>
@endsection
