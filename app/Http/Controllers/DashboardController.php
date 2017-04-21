<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Support\Facades\Input;

class DashboardController extends Controller {

    public function index() {
        return view('admin.index');
    }

    public function profile() {
        return view('admin.profile');
    }

    public function updateAvatar(Request $request) {
        $user = Sentinel::getUser();
        if (Input::hasFile('avatar')) {
            $file = Input::file('avatar');
            $filename = $file->getClientOriginalName();
            $file->move(public_path('/admin1/assets/uploads/'), $filename);
            $user->avatar = $filename;
        }
        $user->save();

        return redirect()->route('admin@profile')->with('success', 'Avatar đã được sửa');
    }

    public function updateProfile(Request $request) {
        $user = Sentinel::getUser();
        $input = $request->only('first_name', 'last_name', 'gender', 'birthday');
        $user->fill($input)->save();

        return redirect()->route('admin@profile')->with('success', 'Xong rồi');
    }
}
