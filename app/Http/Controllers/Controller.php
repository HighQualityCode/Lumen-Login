<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use Auth;

class Controller extends BaseController
{
    //
    public function __construct() {
    	// $this->middleware('auth');
    }

    public function index() {
    	$user = Auth::user();
    	if ($user) {
    		echo "USER LOGGED IN";
    	} else {
    		return view('login');
    	}
    }
}
