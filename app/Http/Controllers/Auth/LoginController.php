<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Cartalyst\Sentinel\Checkpoints\NotActivatedException;
use Cartalyst\Sentinel\Checkpoints\ThrottlingException;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use App\Http\Requests\LoginRequest;

class LoginController extends Controller {
    /*
     * |--------------------------------------------------------------------------
     * | Login Controller
     * |--------------------------------------------------------------------------
     * |
     * | This controller handles authenticating users for the application and
     * | redirecting them to your home screen. The controller uses a trait
     * | to conveniently provide its functionality to your applications.
     * |
     */
    
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest', [
            'except' => 'logout'
        ]);
    }

    public function index() {
        if (Sentinel::check())
            return back();
        else
            return view('admin.login');
    }

    public function authenticate(Request $request) {
        try {
            $remember = (bool) $request->get('remember', false);
            if (Sentinel::authenticate($request->all(), $remember)) {
                if (($user = Sentinel::getUser()->roles()->first()->slug) == 'admin')
                    return redirect()->route('admin@dashboard');
                else if (($user = Sentinel::getUser()->roles()->first()->slug) == 'user')
                    return redirect(url('/sales'));
            } else {
                $err = 'Tên đăng nhập hoặc mật khẩu không đúng.';
            }
        } catch (NotActivatedException $e) {
            $err = 'Tài khoản của bạn chưa được kích hoạt!';
        } catch (ThrottlingException $e) {
            $delay = $e->getDelay();
            $err = "Tài khoản của bạn bị block trong vòng {$delay} giây.";
        }
        return redirect()->back()
            ->withInput()
            ->with('err', $err);
        // return redirect()->route('admin@getLogin');
    }

    public function logout() {
        Sentinel::logout();
        return redirect()->route('admin@getLogin');
    }
}
