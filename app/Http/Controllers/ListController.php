<?php

namespace App\Http\Controllers;
use App\Itemlist;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\User;
use DB;


class ListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($lat,$lon)
    {
        $lists = DB::select("select *, SQRT(((lon - $lon )*(lon - $lon) +(lat - $lat)*(lat - $lat ))) AS distance from itemlists ORDER BY distance ASC");
        return response()->json($lists);
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
        $validator = $this->validation($request);
        if($validator->fails()){
            return response()->json([ 'errors' => $validator->errors()->all()]);
        }
        $this->addItemToList($request);
        return response()->json(['state'=>'store-event-to-list']);
    }

    public function validation($request){
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'title'=>'required',
            'descrp'=>'required',
            'lat' => 'required',
            'lon' => 'required',
            'type' => 'required',
            'image' => 'required',
            'video' => 'required',
        ]);

        return $validator;
    }

    public function addItemToList($request){
        ItemList::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $list = Itemlist::find($id);
        if($list){
            return response()->json($list);
        }else{
            return response()->json(['statue'=>'Data not found']);
        }
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

    public function uploadFile(Request $request)
    {
        $file = $request->file('file');
        $newName = value(function() use ($file){
            $filename = str_random(20) . '.' . $file->getClientOriginalExtension();
            return strtolower($filename);
        });
        $file->move(public_path() . '/upload/', $newName);
        return response()->json(['name'=> $newName]);
    }

    public function user($id){
        $user = User::find($id);
        if($user){
            return response()->json($user->Itemlist);
        }else{
            return response()->json(['status'=>'User not found']);
        }
    }

}
