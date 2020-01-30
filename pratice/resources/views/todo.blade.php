@extends('layouts.app')
@section('content')
    <form action="{{route('home.donetask')}}" method="POST">
        @csrf
        <h1>ToDO List</h1>
        <input type="checkbox" name="task[]" value="introduction">introduction<br>
        <input type="checkbox" name="task[]" value="routing">routing<br>
        <input type="checkbox" name="task[]" value="controller">controller<br>
        <button type="submit" >submit</button>
    </form>
@endsection
