<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\User\UserRepository;
use App\User;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller {

    public function __construct(UserRepository $user) {
        $this->user = $user;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $list = Sentinel::getUserRepository()->with('roles')->paginate(10);
        $admin = Sentinel::findRoleByName('Admin');
        $mod = Sentinel::findRoleByName('Mod');
        $writter = Sentinel::findRoleByName('Writter');
        $user = Sentinel::findRoleByName('User');

        return view('admin.user.show', compact('list', 'admin', 'mod', 'writter', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $roles = Sentinel::getRoleRepository()->all();

        return view('admin.user.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $input = $request->only('email', 'password', 'first_name', 'last_name');
        $user = Sentinel::registerAndActivate($input);

        $usersRole = Sentinel::findRoleById($request->input('id_role'));
        $usersRole->users()->attach($user);

        return redirect()->route('admin@user@user')->with('success', 'Xong rồi');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $user = Sentinel::findUserById($id);
        $roles = Sentinel::getRoleRepository()->all();
        $user_role = $user->roles->first()->id;

        return view('admin.user.edit', compact('user', 'roles', 'user_role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $user = User::findOrFail($id);
        $input = $request->only('email', 'first_name', 'last_name');
        $user->fill($input)->save();
        DB::table('role_users')->where('user_id', $id)->update([
            'role_id' => $request->input('id_role')
        ]);

        return redirect()->route('admin@user@user')->with('success', 'Xong rồi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin@user@user')->with('success', 'Đã xóa');
    }

    public function customer() {
        $user = Sentinel::findRoleByName('User');
        $list = Sentinel::getUserRepository()->with('roles')->paginate(10);

        return view('admin.user.customer', compact('list', 'user'));
    }

    /**
     * Display page 404 when change acccount by method get
     *
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function getchangeAccount() {
        return view('errors.404');
    }

    /**
     * Update the information user by method post
     *
     * @param Request $request
     * @return number
     */
    public function changeAccount(Request $request) {
        $user = User::findOrFail(Sentinel::getUser()->id);
        $user->fill($request->data)->save();
        if (isset($request->data['password'])) {
            $user->fill([
                'password' => Hash::make($request->data['password'])
            ])->save();
        }

        return 1;
    }
}
