<?php 
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User;
use Auth;

class UsersController extends Controller {

   public function __construct() 
   {

   }

   public function authenticate(Request $request)
   {
  		$user = User::where('username', $request->input('username'))->first();


      if ($user && (Hash::check($request->input('password'), $user->password)))
        {
          $apikey = base64_encode(str_random(40));
          User::where('username', $request->input('username'))->update(['api_key' => "$apikey"]);
          return response()->json(['status' => 'success','token' => $apikey, 
                                   'firstname' => $user->firstname, 
                                   'lastname' => $user->lastname,
                                  ]);
        }
      else 
      {
        return response()->json(['message'=>'Your email or Password icorrect'], 401);
      }

   }

   public function register(Request $request) {
      $user = User::create($request);
      if ($user) {
        return response()->json(['status' => 'success'], 200);
      }
   }

}
