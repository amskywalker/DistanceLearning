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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Discipline $id)
    {
        return response()->json(['message' => 'New features coming soon', 'code' => 200]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Discipline  $discipline
     * @return \Illuminate\Http\Response
     */
    public function delete(Discipline $discipline)
    {
        return response()->json(['message' => 'New features coming soon', 'code' => 200]);
    }  

    /**
     * Display the specified resource.
     *
     * @param  \App\Discipline  $discipline
     * @return \Illuminate\Http\Response
     */
    public function get($id)
    {
        if ($this->discipline->where('id', $id)->exists()) {
            return response()->json(['data' => $this->discipline->where('id', $id)->first(), 'status' => 200]);
        }else{
            return response()->json(['message'=>'Data not found', 'status' => 200]); 
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $count = $this->discipline->where('id', '>', 0)->count();

        if ($count > 0) {
            return response()->json([$this->discipline->paginate(4), 'status' => 200]);
        } else {
            return response()->json(['message' => 'Data not found', 'status' => 200]);
        }
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
        return response()->json(['message' => 'New features coming soon', 'code' => 200]);
    }



}
