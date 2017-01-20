<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Input;
use App\Models\Setting;

class ApiV1Controller extends Controller
{
    public function __construct() {
        header('Access-Control-Allow-Origin: http://bsmk'); 
        header("Access-Control-Allow-Credentials: true");
      //  header('Content-Type: application/json');        
        header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
        header('Access-Control-Max-Age: 1000');
        header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token , Authorization, auth-token');
    }
    
    /**
     * Get Front params
     * 
     */
     public function getFront() {
        //Setting::insert(['front'=>json_encode($params)]);
        return response()->json(json_decode(Setting::find(1)->front));
     }
     
     /**
     * Set Front params
     * 
     */
     public function setFront() {
        $params = array(
            'title' => Input::get('title'),
            'body' => Input::get('body')
        );
        Setting::find(1)->update(['front'=>json_encode($params)]);
        return response()->json($params);
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
        //
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
