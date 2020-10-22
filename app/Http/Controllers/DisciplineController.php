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
    public function create(Request $request)
    {
        $this->discipline->id = $request->id;
        $this->discipline->name = $request->name;
        $this->discipline->openinghours = $request->openinghours;
        $this->discipline->teacher = $request->teacher;

        $this->discipline->save();

        return response()->json(
            [
                'sucess' =>
                [
                    "code" => 200,
                    "message" => "Successfully REGISTERED",
                    "status" => "SUCESS"
                ]
            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Discipline  $discipline
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {

        if ($this->discipline->where('id', $id)->exists()) {
            $data = $this->discipline->find($id);
            $data->delete();
            return response()->json(
                [
                    'sucess' =>
                    [
                        "code" => 200,
                        "message" => "Successfully deleted",
                        "status" => "SUCESS"
                    ]
                ]
            );
        } else {
            return response()->json(
                [
                    "error" =>
                    [
                        "code" => 404,
                        "message" => "Requested entity was not found",
                        "status" => "NOT_FOUND"
                    ]
                ]
            );
        }
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

            return response()->json(
                [
                    "discipline" => $this->discipline->where('id', $id)->first(),
                    "code" => 200,
                    "status" => "SUCCESS"
                ]
            );
        } else {
            return response()->json(
                [
                    "error" =>
                    [
                        "code" => 404,
                        "message" => "Requested entity was not found",
                        "status" => "NOT_FOUND"
                    ]
                ]
            );
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
            return response()->json(
                [
                    "disciplines" =>  $this->discipline->get(),
                    "code" => 200,
                    "status" => "SUCCESS"
                ]
            );
        } else {
            return response()->json(
                [
                    "error" =>
                    [
                        "code" => 404,
                        "message" => "Requested entity was not found",
                        "status" => "NOT_FOUND"
                    ]
                ]
            );
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
