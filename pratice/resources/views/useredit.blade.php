<html>
    <head>
        <title>Login</title>
    </head>
    <body>
        <form action="{{route('user.update',['id' => $user->id])}}" method="POST">
            @csrf
            @method('PUT')
        full name: <input type="text" name="name" placeholder="name" value="{{$user->name}}"><br>

            Role: <select name="role">
                <option value="admin" @if ($user->role == 'admin')
                    selected

                @endif>Admin</option>
                <option value="user" @if ($user->role == 'user')
                    selected
                    @endif>User</option>
            </select><br>

            email: <input type="text" name="email" placeholder="email" value="{{$user->email}}"><br>
        password: <input type="password" name="password" placeholder="password" value="{{$user->password}}"><br>
            <button type="submit" name="update">update</button>
            <button type="button"> <a href="/user">Home</a></button>
        </form>
        {{-- <a href="">Home</a> --}}
    </body>
    </html>
