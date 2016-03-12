<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $listItem = new List;

        $file = Input::file('file');
        $newName = value(function() use ($file){
            $filename = str_random(20) . '.' . $file->getClientOriginalExtension();
            return strtolower($filename);
        });
        Input::file('file')->move(public_path() . '/upload', $newName);
        $table->file_url = '/enviro_control/public/upload/' . $newName;

        $listItem->name = $request->input('title');
        $listItem->email = $request->input('descrp');
        $listItem->home_phone = $request->input('lat');
        $listItem->mobile_phone = $request->input('lon');
        $listItem->serial_number = $request->input('type');
        $listItem->address = $request->input('process');
        $listItem->address = $request->input('process');
        $listItem->address = $request->input('process');

        $listItem->save();

        return 'sign-up-complete';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
