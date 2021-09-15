<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\info;

use Illuminate\Support\Facades\Validator;

class apiController extends Controller
{
    public function test()
    {
        return response()->json(['a'=>'666']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allData = info::all();
        return response()->json($allData);
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
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'age' => 'required',
            'country' => 'required',
        ]);

        if ($validator->fails()) 
        {
            return ["response"=>$validator->messages(), "success"=>false] ;              
        }
        else
        { 
            $a = new info();
            $a->name = $request->input('name');
            $a->age = $request->input('age');
            $a->country = $request->input('country');
            $a->save();

            return [
                "info"=>$a ,
                "success"=> true ,
            ];     
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $showInfo = info::find($id);
        if($showInfo != null)
        {
            return[
                "data"=>$showInfo,
                "message"=>"Finded",
                "seccess"=>true
            ];
        }
        else
        {
            return[
                "massage"=>"Not found",
                "seccess"=>false
            ];
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
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deletInfo = info::find($id);
        
        if($deletInfo != null)
        {
            $deletInfo->delete();
            return[
                "data"=>$deletInfo ,
                "message"=> "success deleted", 
                "success"=> true ,
            ];
        }
        else
        {
            return[
                    "message"=>"Not found the ID",
                    "seccess"=>false,
            ];
        }
        
    }
}
