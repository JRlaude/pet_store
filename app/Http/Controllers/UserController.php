<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    
    public function index()
    {
        $user = User::all();
        return view('user.index', compact('user'));
    }
    public function create()
    {
        return view('user.create');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        return redirect('/user');
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

    public function loginPost(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect('/user');
        }
        return redirect('/user/login');
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/user/login');
    }
    public function profile()
    {
        return view('user.profile');
    }
    public function profileUpdate(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
        $user = User::find(Auth::user()->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        return redirect('/user/profile');
    }
    public function profilePassword(Request $request)
    {
        $this->validate($request, [
            'password' => 'required',
            'new_password' => 'required',
            'new_password_confirmation' => 'required',
        ]);
        if (Hash::check($request->password, Auth::user()->password)) {
            if ($request->new_password == $request->new_password_confirmation) {
                $user = User::find(Auth::user()->id);
                $user->password = bcrypt($request->new_password);
                $user->save();
                return redirect('/user/profile');
            }
        }
        return redirect('/user/profile');
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
    public function profileCover(Request $request)
    {
        $this->validate($request, [
            'cover_picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $user = User::find(Auth::user()->id);
        if ($request->hasFile('cover_picture')) {
            $image = $request->file('cover_picture');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
            $user->cover_picture = $name;
            $user->save();
        }
        return redirect('/user/profile');
    }
    public function profilePasswordUpdate(Request $request)
    {
        $this->validate($request, [
            'password' => 'required',
            'new_password' => 'required',
            'new_password_confirmation' => 'required',
        ]);
        if (Hash::check($request->password, Auth::user()->password)) {
            if ($request->new_password == $request->new_password_confirmation) {
                $user = User::find(Auth::user()->id);
                $user->password = bcrypt($request->new_password);
                $user->save();
                return redirect('/user/profile');
            }
        }
        return redirect('/user/profile');
    }
    public function profilePictureUpdate(Request $request)
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
    public function profileCoverUpdate(Request $request)
    {
        $this->validate($request, [
            'cover_picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $user = User::find(Auth::user()->id);
        if ($request->hasFile('cover_picture')) {
            $image = $request->file('cover_picture');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
            $user->cover_picture = $name;
            $user->save();
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
