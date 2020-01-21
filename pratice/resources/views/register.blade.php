@extends('layouts.app')

@section('content')
        <form action="/user" method="POST" onsubmit="return validation()">
            @csrf
            <div class="form-group">
                full name: <input type="text" name="name" placeholder="name" class="form-control" id="name" required>
            </div>

            <div class="form-group">
                Role: <select name="role" class="form-control" id="role" required>
                <option value="admin">Admin</option>
                <option value="user">User</option>
                </select>
            </div>

            <div class="form-group">
                email: <input type="text" name="email" placeholder="email" class="form-control" id="email" required>
            </div>

            <div class="form-group">
                password: <input type="password" name="password" placeholder="password" class="form-control" id="password" required>
            </div>

            <div class="form-group">
                <button type="submit" name="register" class="btn-primary" >register</button>
            </div>

        </form>
@endsection
        {{-- <a href="">Home</a> --}}
@include('layout.footer')
