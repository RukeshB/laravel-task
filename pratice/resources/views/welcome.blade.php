@extends('layouts.app')

@section('content')
        @if (Auth::user()->role->name == "super_admin")
        <h1 class="d-flex justify-content-center">Task Report</h1>
            <table class="table">
                <thead>
                    <th>S.N</th>
                    <th>Group</th>
                    <th>Due Date</th>
                    <th>Task Completed</th>
                    <th>Total Task</th>
                    <th>Percentage</th>
                    <th>Progress</th>
                </thead>
                <tbody>
                   @foreach ($group as $g)
                       <tr>
                            <td>{{$loop->iteration}}</td>
                           <td>{{$g->title}}</td>
                            <td>{{\Carbon\Carbon::parse($g->due_date)->diffForHumans()}}</td>
                            <td>{{$g->task->where('completed',1)->count()}}</td>
                            <td>{{$g->task->where('group_id',$g->id)->count()}}</td>
                            <td>{{$g->task->where('completed',1)->count()/$g->task->where('group_id',$g->id)->count()*100}}%</td>
                            <td><progress  max="100" value="{{$g->task->where('completed',1)->count()/$g->task->where('group_id',$g->id)->count()*100}}"></progress></td>
                       </tr>
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
        <script>
            var role = @JSON($user[0]->role);
            console.log(role);
            for(var i=0;i<role.length;i++)
            {
                if(role['name'] != 'super_admin')
                {
                    console.log('not super admin');
                    break;
                }
                else
                {
                    console.log('super_admin');
                    break;
                }
            }
        </script>
@endsection
