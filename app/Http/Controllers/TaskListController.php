<?php

namespace App\Http\Controllers;

use App\Models\TaskList;
use Illuminate\Http\Request;

class TaskListController extends Controller
{
    public function index()
    {
        $todolist = TaskList::where('process', 'waiting')->get();
        $inprogresslist = TaskList::where('process', 'inprogress')->get();
        $donelist = TaskList::where('process', 'done')->get();
        return view('todolist', compact('todolist', 'inprogresslist', 'donelist'));
    }

    public function create(Request $request)
    {
        // dd($request->all());
        TaskList::create([
            'task' => $request->task,
        ]);
        return redirect()->back();
    }
    
    public function listUpdate(Request $request, $id)
    {
        $task = TaskList::find($id);
        // dd($task->id);
        // dd($request->all());
        $task->update([
            "process" => $request->process,
        ]);
        return redirect()->back();
    }

    public function progressUpdate(Request $request, $id)
    {
        $task = TaskList::find($id);
        $task->update([
            "process" => $request->process,
        ]);
        return redirect()->back();
    }

    public function doneUpdate(Request $request, $id)
    {
        $task = TaskList::find($id);
        $task->update([
            "process" => $request->process,
        ]);
        return redirect()->back();
    }
}
