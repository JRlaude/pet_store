<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin')->only('index');
    }

    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }
    public function show($id)
    {
        $user = User::find($id);
        return view('user.show', compact('user'));
    }
    public function edit($id)
    {
        $user = User::find($id);
        return view('user.edit', compact('user'));
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        return redirect('/user');
    }
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('/user');
    }

    public function profile(User $user)
    {
        return view('user.profile', compact('user'));
    }
    public function profilePicture(Request $request)
    {
        $this->validate($request, [
            'profile_picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $user = User::find(Auth::user()->id);
        if ($request->hasFile('profile_picture')) {
            $image = $request->file('profile_picture');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
            $user->profile_picture = $name;
            $user->save();
        }
        return redirect('/user/profile');
    }
    public function changePassword(Request $request)
    {
        $this->validate($request, [
            'password' => 'required',
            'new_password' => 'required',
            'new_password_confirmation' => 'required',
        ]);
        if (Hash::check($request->password, Auth::user()->password)) {
            if ($request->new_password == $request->new_password_confirmation) {
                $user = User::find(Auth::user()->id);
                $user->password = Hash::make($request->new_password);
                $user->save();
                return redirect('/user/profile');
            }
        }
        return redirect('/user/profile');
    }





    // if(auth()->user()->role == 'admin'){
    //     $this->redirectTo = '/admin';
    // }
    // elseif(auth()->user()->role == 'user'){
    //     $this->redirectTo = '/user';
    // }
}
