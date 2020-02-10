@extends('layouts.app')

@section('content')
        @if (Auth::user()->role->name == "super_admin")
            <p>super_admin</p>
            <table class="table">
                <thead>
                    <th>S.N</th>
                    <th>Name</th>
                    <th>Role</th>
                    <th>Group</th>
                    <th>Task Completed</th>
                    <th>Total Task</th>
                    <th>Progress</th>
                </thead>
                <tbody>
                    @php
                     $sn=1;
                    @endphp
                    @foreach ($user as $u)
                        @foreach ($group as $g)
                            @if ($u->role->name != "super_admin")
                                <tr>
                                    <th>{{$sn}}</th>
                                    <th>{{$u->name}}</th>
                                    <th>{{$u->role->name}}</th>
                                    <th>{{$g->title}}</th>
                                    <th>
                                        @php
                                            $number =0;
                                        @endphp
                                        @foreach ($u->todo as $todo)

                                        @if ($todo->task->group_id == $g->id)
                                            @php
                                                $number++;
                                            @endphp
                                        @endif

                                    @endforeach
                                    {{$number}}
                                    {{-- {{$u->todo->where('user_id',$u->id)->count()}} --}}
                                    {{-- {{$g->task->todo->user_id->count()}} --}}
                                </th>
                                    <th>{{$g->task->count()}}</th>
                                    <th><progress value="{{$number/$task->count()*100}}" max="100"></progress></th>
                                    @php
                                        $sn++;
                                    @endphp
                                </tr>

                            @endif
                        @endforeach


                    @endforeach
                </tbody>
            </table>
            @else{
                <div class="flex-center position-ref full-height">

                    <div class="content">
                        <div class="title m-b-md">
                            Laravel
                        </div>

                        <div class="links">
                            <a href="https://laravel.com/docs">Docs</a>
                            <a href="https://laracasts.com">Laracasts</a>
                            <a href="https://laravel-news.com">News</a>
                            <a href="https://blog.laravel.com">Blog</a>
                            <a href="https://nova.laravel.com">Nova</a>
                            <a href="https://forge.laravel.com">Forge</a>
                            <a href="https://vapor.laravel.com">Vapor</a>
                            <a href="https://github.com/laravel/laravel">GitHub</a>
                            {{-- <a href="/task/add">Add Task</a> --}}
                        </div>
                    </div>
                </div>
            }
        @endif

@endsection
