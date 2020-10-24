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
    public function index()
    {
        //
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
    public function destroy(Activity $activity)
    {
        //
    }
}