<?php
namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use App\Http\Requests\LoginRequest;
 
class RegisterController extends Controller {
    /*
     * |--------------------------------------------------------------------------
     * | Register Controller
     * |--------------------------------------------------------------------------
     * |
     * | This controller handles the registration of new users as well as their
     * | validation and creation. By default this controller uses a trait to
     * | provide this functionality without requiring any additional code.
     * |
     */
    
    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data            
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data) {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data            
     * @return User
     */
    public function index() {
        if (Sentinel::check())
            
            return back();
        else
            
            return view('admin.register');
    }

    public function create(LoginRequest $request) {
        $input = $request->only('email', 'password', 'first_name', 'last_name');
        $user = Sentinel::registerAndActivate($input);
        
        // Find the role using the role name
        $usersRole = Sentinel::findRoleBySlug('user');
        
        // Assign the role to the users
        $usersRole->users()->attach($user);
        
        return redirect()->route('admin@getLogin')->with('success', 'Đăng kí tài khoản thành công, bạn có thể đăng nhập ngay lúc này!');
    }
}
