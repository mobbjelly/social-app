<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Session;

class ProfilesController extends Controller
{
    public function index($slug)
    {
        $user = User::where('slug', $slug)->first();
        return view('profiles.profile')
            ->with('user', $user);
    }

    public function edit()
    {
        return view('profiles.edit')->with('info', Auth::user()->profile);
    }

    public function update(Request $r)
    {

        $this->validate($r, [
            'location' => 'required',
            'about' => 'required|max:255'
        ]);

        Auth::user()->profile()->update([
            'location' => $r->location,
            'about' => $r->about
        ]);

        if ($r->hasFile('avatar'))
        {
            Auth::user()->update([
                'avatar' => $r->avatar->store('public/avatars')
            ]);
        }

        Session::flash('success', '个人资料更新成功！');
        return redirect()->back();
    }
}
