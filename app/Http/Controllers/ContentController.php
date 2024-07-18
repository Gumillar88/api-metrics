<?php

namespace App\Http\Controllers;

use App;
use Hash;
use Mail;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;


class ContentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // input here
    }

    public function index(Request $request) 
    {
        $data = [
            'indexing'  => 'Documentation : This is API Monitoring metrics Dude!',
        ];

        return view('home', $data);
    }
}