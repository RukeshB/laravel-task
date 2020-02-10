@extends('layouts.app')
@section('content')

    <div class="row d-flex justify-content-center">
        <h1>ToDO List</h1>
    </div>
    <div class="row d-flex justify-content-center">
        <div class=".container-fluid">
            <table class="table">
                <thead>
                    @foreach ($group as $g)
                        <th>{{$g->title}}</th>
                    @endforeach

                </thead>
                    <tbody>
                        @foreach ($group as $g)

                            <td>
                                @foreach ($task as $t)
                                    @if($g->id == $t->taskgroup->id)
                                        <input type="checkbox" name="task" id="task" value="{{$t->id}}" @foreach ($todo as $td)
                                            @if(Auth::user()->id == $td->user_id && $t->id == $td->task_id)
                                                checked
                                            @endif
                                        @endforeach>{{$t->task}}<br>
                                    @endif

                                @endforeach
                            </td>

                        @endforeach

                    </tbody>
                </table>
            </div>

        </div>

        {{-- <input type="checkbox" name="task" value="introduction" onclick="save('introduction')">introduction<br>
        <input type="checkbox" name="task" value="routing" onclick="save('routing')">routing<br>
        <input type="checkbox" name="task" value="controller" onclick="save('controller')">controller<br> --}}

    <script
    src="{{asset('js/jquery.3.4.1.min.js')}}"></script>
  <script>

        //   $('h1').click(function(){
        //       $('h1').hide();
        //   });

            //checkbox = document.getElementById('task');
            var checkbox = document.querySelectorAll ('input[type=checkbox]');
            var length = checkbox.length;

                for(i=0;i<length;i++)
                {
                    //checkbox[i].onclick()= save(checkbox[i].value,checkbox[i].checked);
                    checkbox[i].addEventListener("click", function(){
                    console.log(length);
                    save(this.value,this.checked);
                    });
                }


      function save(value,status)
      {


            //console.log(check);
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        console.log(value, status);
        $.ajax({
            method:'POST',
            url:"{{route('home.donetask')}}",
            data:{
                task_id: value,
                check : status
            },
            success:function(data){
                console.log(data);
            }
        });
      }
  </script>
@endsection
