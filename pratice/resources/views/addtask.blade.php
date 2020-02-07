@extends('layouts.app')
@section('content')

    <input type="text" name="newtask" id="newtask" required>
    <input type="submit" value="submit" id="submitbtn">

<table class="table" id="my_table">
    <thead>
        <th>S.N</th>
        <th>task</th>
    </thead>
    <tbody>
        @foreach ($task as $t)
            <tr>
                <input type="hidden" id="sn" value="{{$loop->count}}">
                <td>{{$loop->iteration}}</td>
                <td>{{$t->task}}</td>
            </tr>
        @endforeach
    </tbody>
</table>
<script>
    var button = document.getElementById('submitbtn');
    var newtask = document.getElementById('newtask');
    var sn = document.getElementById('sn').value;
    var table = document.getElementById('my_table');
     button.addEventListener('click',function(){
         if(newtask.value != "")
         {
            // var newrow = '<tr><td></td><td>'+newtask.value+'</td></tr>';
            // table.appendChild(newrow);

             console.log(sn);
            row = table.insertRow();
            var newCell1 = row.insertCell();
            var newCell2 = row.insertCell();
            sn++;
            newCell1.innerHTML = sn;
            newCell2.innerHTML= newtask.value;
            //newtask.value = "";
            save(newtask.value);
         }

     })

    function save(value)
      {
            //console.log(check);
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        console.log(value);
        $.ajax({
            method:'POST',
            url:"{{route('task.add')}}",
            data:{
                task: value
            },
            success:function(data){
                console.log(data);
            }
        });
      }
</script>
@endsection
