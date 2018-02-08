<?php 
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller {

   public function __construct() 
   {

   }

   public function authenticate(Request $request)
   {
  		$user = User::where('email', $request->input('email'))->first();

      if ($user && (Hash::check($request->input('password'), $user->password)))
        {
          $apikey = base64_encode(str_random(40));
          User::where('email', $request->input('email'))->update(['api_key' => "$apikey"]);
          return response()->json(['status' => 'success','api_key' => $apikey, 'name' => $user->name]);
        }
      else 
      {
        return response()->json(['message'=>'Your email or Password icorrect'], 401);
      }

   }

}
