<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Task;
use App\TaskGroup;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\carbon;

class TodoController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');

    }

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
        //return (Task::find($request->id));
        $task = Task::find($request->id);
        $condition =$request->check;
        //return (carbon::now());
        if(Carbon::parse($task->taskgroup->due_date)->gte(carbon::now()->toDateString()) )//if now < due_date
        {
            //return 'due_date';
            if($condition == 'true')
            {
                $task->completed = true;
                //$task->submitted_at = Carbon::now();
            }

            else
            {
            $task->completed = false;
            }
            $task->save();
            return \response()->json(['sucess'=>'done']);
        }
        else
        {
            return 'now';
        }

    }

    public function showaddtask()
    {
        $user = User::all();
        $task = Task::all();
        $group = TaskGroup::all();
        return view('addtask',\compact('task','group','user'));
    }

    public function addtask(Request $request)
    {

            $task = new Task();
            $task->task = $request->newtask;
            $task->group_id = $request->group;
            $task->description = $request->description;
            $task->user_id = $request->userid;
            // return($request->group_id);
            $task->save();

            return \redirect()->route('task.manage');
    }

    public function managetask()
    {
        $task= Task::all();
        return view('managetask',\compact('task'));
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
