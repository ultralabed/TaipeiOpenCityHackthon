<?php

namespace App\Http\Controllers;
use App\ItemLists;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
        $listItem = new ItemLists;
        $imageFile = $request->file('image');

        $newImageName = value(function() use ($imageFile){
            $filename = str_random(20) . '.' . $imageFile->getClientOriginalExtension();
            return strtolower($filename);
        });

        $imageFile->move(public_path() . '/upload/');

        // $listItem->name = $request->input('title');
        // $listItem->email = $request->input('descrp');
        // $listItem->home_phone = $request->input('lat');
        // $listItem->mobile_phone = $request->input('lon');
        // $listItem->serial_number = $request->input('type');
        // $listItem->address = $request->input('process');
        // $listItem->image = $newImageName;

        // $listItem->save();

        // return 'sign-up-complete';
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
