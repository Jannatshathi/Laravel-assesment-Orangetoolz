<?php

namespace App\Http\Controllers\Api;

use App\Models\TaskList;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TaskController extends Controller
{
    public function store(Request $request){
        $tasks=TaskList::create([
            'task' => $request->task,
        ]);
        return response()->json(['tasks'=>$tasks]);
    }

}
