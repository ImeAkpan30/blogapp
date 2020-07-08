<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;
use App\Profile;
use Auth;


class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function profile()
    {
        return view('profiles.profile');
    }

    public function addProfile(Request $request)
    {
        // return $request->input('name');
        $this->validate($request, [
            'name' => 'required',
            'designation' => 'required',
            'profile_pic' => 'required'
        ]);

        // return 'Validation passed';
        $profiles = new Profile;
            $profiles->name = $request->input('name');
            $profiles->user_id = Auth::user()->id;
            $profiles->designation = $request->input('designation');
            if($request->hasFile('profile_pic')){
                $file = $request->file('profile_pic');
                $file->move(public_path(). '/uploads/', $file->getClientOriginalName());
                $url = URL::to("/") . '/uploads/'. $file->getClientOriginalName();
            }
            $profiles->profile_pic = $url;
            $profiles->save();
            return redirect('/home')->with('success', 'Profile Added Successfully!');              
            
    }

}
