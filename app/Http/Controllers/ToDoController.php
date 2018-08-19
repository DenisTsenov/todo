<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\ToDo;
use Session;

class ToDoController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        if (auth()->user()) {
            $user = auth()->user();

            $todo = DB::table('todo_list')->where('user_id', $user->id)->paginate(1);
            return view('todo.index', ['todo' => $todo]);
        }

        return view('todo.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('todo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

        $user = auth()->user();

        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
        ]);

        $todo = new ToDo;

        $todo->title = $request->title;
        $todo->description = $request->description;
        $todo->user_id = $user->id;
        $todo->save();

        Session::flash('success', 'You successfully added new task!');

        return redirect()->route('tasks.show', $todo->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {

        $user = auth()->user();
        $item = DB::table('todo_list')->where([
                    ['id', '=', $id],
                    ['user_id', '=', $user->id]
                ])->get();
        
        if (!sizeof($item)) {
            abort(404);
        }
        return view('todo.show', ['item' => $item]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {

        $item = DB::table('todo_list')->where('id', '=', $id)->get();

        return view('todo.edit', ['item' => $item]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {

        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
        ]);

        $todo = ToDo::find($id);

        $todo->title = $request->input('title');
        $todo->description = $request->input('description');
        $todo->save();

        Session::flash('success', 'You successfully redact task!');

        return redirect()->route('tasks.show', $todo->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {

        $item = ToDo::find($id);
        $item->delete();

        Session::flash('success', 'Task was successfully deleted!');

        return redirect()->route('tasks.index');
    }

}
