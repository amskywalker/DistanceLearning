<?php

namespace App\Http\Controllers;

use App\RemoteClass;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    private $remoteClass;
    /**
     *
     *
     */
    public function __construct(RemoteClass $remoteClass)
    {
        $this->remoteClass = $remoteClass;
    }
    public function views(){
        return view('registerAulas');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $count = $this->remoteClass->where('id', '>', 0)->count();

        if ($count > 0) {
            return response()->json([$this->remoteClass->paginate(4), 'status' => 200]);
        } else {
            return response()->json(['message' => 'Nenhum dado encontrado', 'status' => 200]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->remoteClass->disciplines_id = 137;
        $this->remoteClass->date = $request->date;
        $this->remoteClass->quantity = $request->quantity;
        $this->remoteClass->content = $request->content;
        $this->remoteClass->type = $request->type;
        $this->remoteClass->plataform = $request->plataform;

        $this->remoteClass->save();

        return redirect()->route('form')->with('status', 'Aula Registrada');;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if ($this->remoteClass->where('id', $id)->exists()) {
            return response()->json(['data' => $this->remoteClass->where('id', $id)->first(), 'status' => 200]);
        } else {
            return response()->json(['message' => 'Data not found', 'status' => 200]);
        }
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
