@extends('layouts.app')
@section('content')

<form method="POST" action="{{route('home.setpermissions')}}">
    @csrf

<div>
    {{-- @foreach ($user as $role)
        <p>{{$role->role->permission}}</p>
    @endforeach --}}


    <select name="role" id="role">
        @foreach($roles as $role)
            @if($role->name != "super_admin")
                {{-- @php
                    $r = 2;
                @endphp --}}
                <option value="{{$role->id}}">{{$role->name}}</option>
            @endif
        @endforeach
    </select>
</div>
{{-- <p>{{$r}}</p>
@foreach ($roles as $ro)
@if($r == $ro->id)
    @foreach ($ro->permission as $p)
        <p>{{$p->name}}</p>
    @endforeach
@endif
@endforeach --}}
@foreach ($permissions as $permission)
<label><input type="checkbox" name="permissions[]" value="{{$permission->id}}"
    {{-- @foreach (Auth::User()->role->permission as $p)
        @if ($p->id == $permission->id)
            checked
        @endif
    @endforeach --}}
    >{{$permission->name}}</label>
@endforeach


<button type="submit">Submit</button>

</form>
{{-- <script>
    var cb = document.getElementById('role');
    var selectedval = cb.options[cb.selectedIndex].value;

        load(cb.value);
    cb.onchange = function()
    {
        load(cb.value);
    }
    function load(value)
      {

            console.log(value);
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            method:'GET',
            url:"{{route('home.donetask')}}",
            data:{
                role_id: value
            },
            success:function(data){
                console.log(data);
            }
        });
      }

</script> --}}
@endsection
