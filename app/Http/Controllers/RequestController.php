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
        LocationRequest::create(
            [
                'fulfilled' => false,
                // 'coords' => $request->input('coords'),
                'location_plaintext' => $request->input('location_plaintext'),
                'contact_number' =>  $request->input('contact_number'),
                'num_women' =>  $request->input('num_women'),
                'num_children' =>  $request->input('num_children'),
            ]
        );


    /* Send an SMS using Twilio. You can run this file 3 different ways:
     *
     * - Save it as sendnotifications.php and at the command line, run 
     *        php sendnotifications.php
     *
     * - Upload it to a web host and load mywebhost.com/sendnotifications.php 
     *   in a web browser.
     * - Download a local server like WAMP, MAMP or XAMPP. Point the web root 
     *   directory to the folder containing this file, and load 
     *   localhost:8888/sendnotifications.php in a web browser.
     */
 
    // Step 1: Download the Twilio-PHP library from twilio.com/docs/libraries, 
    // and move it into the folder containing this file.
//    require "twilio/sdk/Services/Twilio.php";
 
    // Step 2: set our AccountSid and AuthToken from www.twilio.com/user/account
    $AccountSid = "AC52acd91f4433d04580974c2e87f80f54";
    $AuthToken = "deb5a391d458df417211f51d1e5f6126";
    $fromNumber = "441680402019";
 
    // Step 3: instantiate a new Twilio Rest Client
    //$client = new Services_Twilio($AccountSid, $AuthToken);
 
    // Step 4: make an array of people we know, to send them a message. 
    // Feel free to change/add your own phone number and name here.

 
    // Step 5: Loop over all our friends. $number is a phone number above, and 
    // $name is the name next to it
    
    $twilio = new \Aloha\Twilio\Twilio($AccountSid, $AuthToken, $fromNumber);

    //$twilio->message($request->input('contact_number'), 'Thank you for sending your request for a SleepSpace from ' . $request->input('location_plaintext') . ', please go to The Jungle depot to pick it up');
/*
    foreach ($people as $number => $name) {
 
        

        $sms = $client->account->messages->sendMessage(
 
        // Step 6: Change the 'From' number below to be a valid Twilio number 
        // that you've purchased, or the (deprecated) Sandbox number
            "+441680402019", 
 
            // the number we are sending to - Any phone number
            $number,
 
            // the sms body
            "Thank you for sending your request, please go to XYZ to pick it up";
        );
 
        // Display a confirmation message on the screen
        echo "Sent message to $name";
    }
*/
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
        $location->location_plaintext = $request->input('location_plaintext');
        $location->contact_number =  $request->input('contact_number');
        $location->num_women =  $request->input('num_women');
        $location->num_children =  $request->input('num_children');
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
