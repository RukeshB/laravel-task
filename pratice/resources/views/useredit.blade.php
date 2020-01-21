@extends('layouts.app')

@section('content')
        <form action="{{route('home.update',['id' => $user->id])}}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                full name: <input type="text" name="name" placeholder="name" value="{{$user->name}} " class="form-control" id="name" required>
            </div>

            <div class="form-group">
                    Role: <select name="role" class="form-control" id="role" required>
                        <option value="admin" @if ($user->role == 'admin')
                            selected

                        @endif>Admin</option>
                        <option value="user" @if ($user->role == 'user')
                            selected
                            @endif>User</option>
                        </select>
            </div>

            <div class="form-group">
                email: <input type="text" name="email" placeholder="email" value="{{$user->email}}" class="form-control" id="email" required>
            </div>

            <div class="form-group">
                <button type="submit" name="update" class="btn-primary">update</button>
            </div>

        </form>
        @endsection
        {{-- <a href="">Home</a> --}}
@include('layout.footer')
