<?php
 
namespace App\Http\Controllers;
 
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Throwable;

class UserController extends Controller
{
    /**
     * Show the profile for a given user.
     */
    public function getData() : View
    {
        return view('users', [
            'users' => User::all()
        ]);
    }

    /**
     * Show the profile for a given user.
     */
    public function update(Request $request) : string
    {  

        $userData = User::find($request['id']);
        $userData->name = $request['name'];
        $userData->email = $request['email'];
        $userData->password = Hash::make($request['password']);
        
        $userData->save();

        return '200';
        
    }
}