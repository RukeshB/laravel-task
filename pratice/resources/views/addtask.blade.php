@extends('layouts.app')
@section('content')

<div class="container">
    <form method="POST" action="{{route('task.add')}}">
        @csrf
        <div class="form-group">
            <h3>Add New Task</h3>
        </div>

        <div class="form-group">
            <label for="group">Task Group</label>
            <select name="group" id="group" class="form-control">
                @foreach ($group as $g)
                    <option value="{{$g->id}}">{{$g->title}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="newtask">Task</label>
            <input type="text" name="newtask" id="newtask" class="form-control">
        </div>

         <div class="form-group">
            <label for="userid">Assign To</label>
            <select name="userid" id="userid" class="form-control">
                @foreach ($user as $u)
                    @if (Auth::User()->id != $u->id)
                        <option value="{{$u->id}}">{{$u->name}}</option>
                    @endif
                @endforeach
            </select>
        </div>

         <div class="form-group">
            <label for="description">Task Description</label>
            <textarea name="description" id="" cols="10" rows="5" class="form-control"></textarea>
        </div>

        <div class="form-group">
            <input type="submit" value="submit" id="submitbtn" class="btn-primary">
        </div>

    </form>
</div>
@endsection
