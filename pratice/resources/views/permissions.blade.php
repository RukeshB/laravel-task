@extends('layouts.app')
@section('content')

<form method="POST" action="{{route('home.setpermissions')}}">
    @csrf
@foreach($roles as $role)
<div>
    <h2>{{$role->name}}</h2>
</div>
@foreach ($permissions as $permission)
<label><input type="checkbox" name="permissions[{{$role->id}}][]" value="{{$permission->id}}" >{{$permission->name}}</label>
@endforeach
@endforeach

<button type="submit">Submit</button>

</form>

@endsection
