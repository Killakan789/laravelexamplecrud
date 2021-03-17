<?php

namespace App\Http\Controllers;

use App\Models\Counteragent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CounteragentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts = Counteragent::all();
        return view('admin/counteragents',['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin/counteragentsadd');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $agent = new Counteragent();
        $agent->name = $request->agentName;
        $agent->phone = $request->agentPhone;
        $agent->adress = $request->agentAdress;
        $agent->save();
        return redirect()->route('counteragents');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Counteragent  $counteragent
     * @return \Illuminate\Http\Response
     */
    public function show(Counteragent $counteragent)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Counteragent  $counteragent
     * @return \Illuminate\Http\Response
     */
    public function edit(Counteragent $counteragent,Request $request)
    {
        //
        $id = $request->id;
        $post = DB::table('counteragents')->where('id', $id)->first();
        return view('admin/counteragentdetail',['post' => $post]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Counteragent  $counteragent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Counteragent $counteragent)
    {
        //
        $id = $request->id;

        DB::table('counteragents')
            ->where('id', $id)
            ->update([ 'name' => $request->agentName,
        'phone' => $request->agentPhone,
        'adress' => $request->agentAdress]);
        return redirect()->route('counteragents');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Counteragent  $counteragent
     * @return \Illuminate\Http\Response
     */
    public function destroy(Counteragent $counteragent,Request $request)
    {
        //
        $id = $request->id;

        $article = Counteragent::find($id);
        if ($article) {
            $article->delete();
        }
        return redirect()->route('counteragents');
    }
}
