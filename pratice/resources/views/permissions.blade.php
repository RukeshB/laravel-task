@extends('layouts.app')
@section('content')

<form method="POST" action="{{route('home.setpermissions')}}">
    @csrf

<div>
    <select name="role">
        @foreach($roles as $role)
            @if($role->name != "super_admin")
                <option value="{{$role->id}}">{{$role->name}}</option>
            @endif
        @endforeach
    </select>
</div>
@foreach ($permissions as $permission)
<label><input type="checkbox" name="permissions[]" value="{{$permission->id}}" >{{$permission->name}}</label>
@endforeach


<button type="submit">Submit</button>

</form>

@endsection
