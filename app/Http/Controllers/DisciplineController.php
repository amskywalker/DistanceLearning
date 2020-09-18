<?php

namespace App\Http\Controllers;

use App\Discipline;
use Illuminate\Http\Request;

class DisciplineController extends Controller
{
    private $discipline;

    public function __construct(Discipline $discipline)
    {
        $this->discipline = $discipline;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $count = $this->discipline->where('id', '>', 0)->count();


        if ($count > 0) {
            return response()->json([$this->discipline->paginate(10),'status' => 200]);
        }else{
            return response()->json(['message' => 'Nenhum dado encontrado','status' => 200]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Discipline $id)
    {
        $count = Discipline::where('id', $id)->count();
        if ($count > 0) {
            return response()->json(['data' => Discipline::all(), 'status' => 200]);
        } else {
            return response()->json(['data' => Discipline::all(), 'status' => 200]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Discipline  $discipline
     * @return \Illuminate\Http\Response
     */
    public function show(Discipline $id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Discipline  $discipline
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Discipline $discipline)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Discipline  $discipline
     * @return \Illuminate\Http\Response
     */
    public function destroy(Discipline $discipline)
    {
        //
    }
}
