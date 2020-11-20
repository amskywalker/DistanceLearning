<?php

namespace App\Http\Controllers;

use App\Activity;
use Illuminate\Http\Request;

class ActivitiesController extends Controller
{
    private $activity;

    public function __construct(Activity $activity){
        $this->activity = $activity;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $count = $this->activity->where('id', '>', 0)->count();

        if ($count > 0) {
            return response()->json(
                [
                    "activities" =>  $this->activity->get(),
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

    public function create(Request $request)
    {
        $this->activity->disciplines_id = $request->disciplines_id;
        $this->activity->delivery_date = $request->delivery_date;
        $this->activity->description = $request->description;

        $this->activity->save();

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
     * Display the specified resource.
     *
     * @param  \App\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function show(Activity $activity)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Activity $activity)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($this->activity->where('id', $id)->exists()) {
            $data = $this->activity->find($id);
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
}
