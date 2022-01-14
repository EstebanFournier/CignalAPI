<?php

namespace App\Http\Controllers;

use App\Models\Alert;
use Illuminate\Http\Request;

class AlertController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Alert::paginate(5);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'dateAlert' => 'required',
            'nameAlert' => 'required',
            'certificat_id' => 'required',
            'description' => 'required',
        ]);

        return Alert::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Alert  $alert
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Alert::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Alert  $alert
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $alert = Alert::find($id);
        $alert->update($request->all());
        return $alert;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Alert  $alert
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Alert::destroy($id);
    }
}
