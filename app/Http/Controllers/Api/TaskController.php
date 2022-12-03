<?php

namespace App\Http\Controllers\Api;

use App\Models\Task;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    public function add(Request $request)
    {
        $validator=Validator::make($request->all(),[
            'user_id'=>'required',
            'task'=>'required',
            'status'=>'required',

        ]);
        if($validator->fails())
        {
            return response()->json([
                'message'=>$validator->messages()

            ],422);
        }
        else
        {
            $taskapi=new Task;
            $taskapi->user_id=$request->user_id;
            $taskapi->task=$request->task;
            $taskapi->status=$request->status;
            $taskapi->save();

            return response()->json([
                'message'=>'student created succsessfully'
            ],200);
        }
    }
    public function update(Request $request,$id)
    {
        $taskapi= Task::find($id);
        if($taskapi)
        {
            $taskapi->user_id=$request->user_id;
            $taskapi->task=$request->task;
            $taskapi->status=$request->status;
            $taskapi->update();

            return response()->json([
                'message'=>'student updated successfully'
            ],200);
        }
        else
        {
            return response()->json([
                'message'=>'id not found'
            ],400);
        }
    }
}
