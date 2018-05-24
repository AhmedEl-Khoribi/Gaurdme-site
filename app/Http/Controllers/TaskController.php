<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\User;
use App\Comment;
use Tag;
use DB;


class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show','home']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        return view('homepage');
    }

    public function index()
    {
        // $tasks=DB::table('tasks')->latest()->get(); Query Builder
            $tasks=Task::latest()     //Eloquent Model
                  ->filter(request(['day', 'month', 'year', 'Auther']))  
                  ->get()->unique();
            // $tasks=Task::simplePaginate(5);
            return view('welcome', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(),[
            'title'=>'required',
            'body'=>'required'
        ]);

        $task= new Task;
        $task->title=request('title');
        $task->body=request('body');
        $task->user_id=auth()->id();
        $task->save();
        // Task::create(request(['title','body']));
        //Task::create(['title'=>request('title'), 'body'=>request('body'), 'user_id'=>auth()->user()->id ]);
        //to assign tags for Posts with multi entry
        $fromForm=request("tags");
        if(!empty($fromForm)){
        $tags=explode(",", $fromForm);
        foreach ($tags as $t) {
            $tag= new \App\Tag;
            $tag->name=$t;
            $tag->save();

            DB::table('tag_task')->insert(["task_id"=>$task->id, "tag_id"=>$tag->id]);
        }
        }
        session()->flash('message', 'Done Publishing Your Post ' . \Auth::user()->name . ' ! ');

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        // $task=DB::table('tasks')->find($id); Query  Builder
        $task=Task::find($id);      //Eloquent Model
        $cu=Comment::get()->where('task_id', $id);

        return view('/about', compact('task', 'cu'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $task=Task::find($id);
        return view('layouts.edit', compact('task'));
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
        $this->validate(request(),[
            'title'=>'required',
            'body'=>'required'
        ]);

        $task=new Task;
        $task->where('id', $id)->update(['title'=>request('title'), 'body'=>request('body')]);
        session()->flash('message', 'Post is Updated');
        return redirect('/tasks/'. $id );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('tasks')->where('id', $id)->delete();
        session()->flash('message', 'Post is Deleted');
        return redirect('/');
    }
}
