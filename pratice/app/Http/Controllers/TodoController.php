<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;
use App\Task;
use App\TaskGroup;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\carbon;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $task = Task::all();
        $todo = Todo::all();
        $group = TaskGroup::all();
        return view('todo',compact('task','todo','group'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $condition =$request->check;
        //return \response()->json(['sucess'=>'done']);
        if($condition == 'true')
        {
            //return 'save';
            $userid= Auth::User()->id;
            $todo = new Todo();
            $todo->user_id = $userid;
            $todo->task_id = $request->task_id;
            $todo->status = true;
            $todo->submitted_at = Carbon::now();
            $todo->save();
            return \response()->json(['sucess'=>'done']);
        }

        // if($request->check === false)
        else
        {
            //return 'delete';
            //dd('delete');
            $del = DB::delete('delete from todo where user_id = ? and task_id= ?', [Auth::User()->id,$request->task_id]);
            return \response()->json(['sucess'=>'done']);
        }

        // $del = DB::delete('delete from todo where user_id = ?', [$userid]);
        // foreach($request->task as $task)
        // {
        //     $todo = new Todo;
        //     $todo->user_id = $userid;
        //     $todo->task = $task;
        //     $todo->status = 1;
        //     $todo->submitted_at = Carbon::now();
        //     $todo->save();
        // }

        // dd($todo);
    }

    public function showaddtask()
    {
        $task = Task::all();
        $group = TaskGroup::all();
        return view('addtask',\compact('task','group'));
    }

    public function addtask(Request $request)
    {

            $task = new Task();
            $task->task = $request->task;
            $task->group_id = $request->group_id;
            // return($request->group_id);
            $task->save();

            return \response()->json(['sucess'=>'done']);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
