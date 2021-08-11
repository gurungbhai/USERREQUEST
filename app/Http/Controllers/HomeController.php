<?php

namespace App\Http\Controllers;
use Auth;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function profile()
    {
        return view('account.profile');
    }

    /**
     * Show the application profile.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit_profile()
    {
        return view('account.edit_profile');
    }

    /**
     * Update profile.
     *
     * @return \Illuminate\Http\Response
     */
    public function update_profile(Request $request)
    {
        
        $this->validate($request, [
            'name' => 'required|max:255',
           
        ]);

    try {

        $user = User::findOrFail(Auth::user()->id);
        if($request->has('name')){ 
            $user->name = $request->name;
        }

        $user->save();
        return redirect('profile')->with('status', 'Profile updated!');
    }

    catch (ModelNotFoundException $e) {
        return response()->json(['error' => trans('user_not_found')], 500);
    }
    }

    /**
     * Show the application change password.
     *
     * @return \Illuminate\Http\Response
     */
    public function change_password()
    {
        return view('account.change_password');
    }

    /**
     * Change Password.
     *
     * @return \Illuminate\Http\Response
     */
    public function update_password(Request $request)
    {
        $this->validate($request, [
            'password' => 'required|confirmed|min:6',
            'old_password' => 'required',
        ]);

    $User = Auth::user();

    if(Hash::check($request->old_password, $User->password))
    {
        $User->password = bcrypt($request->password);
        $User->save();
        
        return redirect('home')->with('status', 'PASSWORD CHANGED');
    } 
}    
}
