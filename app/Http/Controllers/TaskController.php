<?php

namespace App\Http\Controllers;

use DB;
use App\Quotation;
use Illuminate\Http\Request;
use App\Task;
use App\User;
use App\Http\Requests;
use Illuminate\View\Middleware\ErrorBinder;
use App\Http\Requests\CreateTaskRequest;
use Illuminate\Support\Facades\Input;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks=Task::all();
        $users=User::all();
//        $users = array();
//        foreach ($tasks as $task) {
//            array_unshift($users,User::where('task_id',$task->id)->get());
//
//        }
        return view('tasks.index', compact('tasks','users'));
    }
    public function users()
    {
        $tasks=Task::all();
        $users=User::all();

        return view('tasks.users', compact('tasks','users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users=User::all();
        $tasks=Task::all();

        return view('tasks.create',compact('tasks','users'));
    }
    public function createUser(){
        $users=User::all();
        $tasks=Task::all();



        return view('tasks.createUser',compact('users','tasks'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Task::create($request->all());

        return redirect('/tasks');
    }
    public function storeUser(CreatePostRequest $request)
    {
        User::create($request->all());


        return redirect('/tasks');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task=Task::findOrFail($id);
        $tasks=Task::all();

        return view('tasks.show', compact('task','tasks'));
    }
    public function showUser($id)
    {
        $user=User::findOrFail($id);
        $users=User::all();
        return view('tasks.showUser', compact('user','users'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tasks=Task::findOrFail($id);

        $users=User::all();
//        $middle = DB::table('users')->where('first_name', $tasks->user)->first();
//        DB::update('update users set task_id = ? where id = ? ', [$tasks->id,$middle->id]);

        return view('tasks.edit', compact('tasks','users'));
    }
    public function editUser($id)
    {
        $users=User::findOrFail($id);
        $tasks=Task::all();
        DB::update('update tasks set user_id = ? where id = ?', [$users->id,$users->task_id]);
////        $task=Task::findOrFail($users->id);
//        $users->tasks()->attach(1, ['task_id' => $task->id, 'user_id' => $id]);

        return view('tasks.editUser', compact('users','tasks'));
    }
    public function assignUser($id)
    {
        $users=User::findOrFail($id);
        $tasks=Task::all();
        $userList=User::all();
        return view('tasks.assignUser', compact('users','tasks','userList'));
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
        $task=Task::findOrFail($id);
        $task->update($request->all());
        return redirect('/tasks');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task=Task::findOrFail($id);
        $task->delete();
        return redirect('/tasks');
    }
    public function home()
    {
        $tasks=Task::all();
        $users=User::all();

        return view('tasks.welcome', compact('tasks','users'));
    }
}
