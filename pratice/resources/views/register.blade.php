<html>
    <head>
        <title>Login</title>
    </head>
    <body>
        <form action="/user" method="POST">
            @csrf
            full name: <input type="text" name="name" placeholder="name"><br>
            Role: <select name="role">
                <option value="admin">Admin</option>
                <option value="user">User</option>
            </select><br>
            email: <input type="text" name="email" placeholder="email"><br>
            password: <input type="password" name="password" placeholder="password"><br>
            <button type="submit" name="register">register</button>
            <button type="button"> <a href="/user">Home</a></button>
        </form>
        {{-- <a href="">Home</a> --}}
    </body>
    </html>
