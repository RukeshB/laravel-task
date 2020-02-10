@extends('layouts.app')
@section('content')

<div class="row d-flex justify-content-center">
    <select name="group" id="group">
        @foreach ($group as $g)
            <option value="{{$g->id}}">{{$g->title}}</option>
        @endforeach
    </select>
    <input type="text" name="newtask" id="newtask" required>
    <input type="submit" value="submit" id="submitbtn">
</div>


<div class="row d-flex justify-content-center">
    <div class=".container-fluid">
        <table class="table" id="my_table">
            <thead>
                <th>S.N</th>
                <th>Group</th>
                <th>Task</th>
            </thead>
            <tbody>
                @foreach ($task as $t)
                    <tr>
                        <input type="hidden" id="sn" value="{{$loop->count}}">
                        <td>{{$loop->iteration}}</td>
                        <td>{{$t->taskgroup->title}}</td>
                        <td>{{$t->task}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script>
    var button = document.getElementById('submitbtn');
    var newtask = document.getElementById('newtask');

    var group = document.getElementById('group');
    var selectedval = group.options[group.selectedIndex].value;
    var selectedtext = group.options[group.selectedIndex].innerHTML;

    group.onchange= function(){
        selectedval = group.options[group.selectedIndex].value;
        selectedtext = group.options[group.selectedIndex].innerHTML;
    }
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
            var newCell3 = row.insertCell();
            sn++;
            newCell1.innerHTML = sn;
            newCell2.innerHTML= selectedtext;
            newCell3.innerHTML = newtask.value;
            //newtask.value = "";
            save(newtask.value,selectedval);
         }

     })

    function save(newtask, taskgroup)
      {
            //console.log(check);
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        console.log(newtask, taskgroup);
        $.ajax({
            method:'POST',
            url:"{{route('task.add')}}",
            data:{
                task: newtask,
                group_id: taskgroup
            },
            success:function(data){
                console.log(data);
            }
        });
      }
</script>
@endsection
