<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\LocationRequest;

class RequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $requests = App\LocationRequest::all();
        return view('request-map', ['requests' => $requests]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('request');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        App\LocationRequest::create(
            [
                'fulfilled' => false,
                // 'coords' => $request->input('coords'),
                'location_plaintext' => $request->input('location_plaintext'),
                'contact_number' =>  $request->input('contact_number'),
                'num_women' =>  $request->input('num_women'),
                'num_children' =>  $request->input('num_children'),
            ]
        );

        return view('updated');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $request = App\LocationRequest::findOrFail($id);
        return view('request-detail', ['request' => $request]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $request = App\LocationRequest::findOrFail($id);
        return view('request', ['request' => $request]);
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
        $location = App\LocationRequest::findOrFail($id);
        $location->fulfilled = $request->input('fulfilled');
        $location->location_plaintext = $request->input('location_plaintext'),
        $location->contact_number =  $request->input('contact_number'),
        $location->num_women =  $request->input('num_women'),
        $location->num_children =  $request->input('num_children'),
        $location->save();

        return view('updated');
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
