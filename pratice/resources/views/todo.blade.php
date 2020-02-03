@extends('layouts.app')
@section('content')

        <h1>ToDO List</h1>
        @foreach ($task as $t)
            <input type="checkbox" name="task" id="task" value="{{$t->id}}" @foreach ($todo as $td)
                @if(Auth::user()->id == $td->user_id && $t->id == $td->task_id)
                    checked
                @endif
            @endforeach>{{$t->task}}<br>
        @endforeach
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
