<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class ExampleTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     * @group foo
     * @return void
     */
    public function testBasicExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(route('admin@getLogin'))
                    ->assertSee('Welcome, Please login');
        });
    }

    /**
     * @group foo
     * Login success
     */
    public function testExample()
    {
        $this->browse(function ($browser) {
            $browser->visit(route('admin@getLogin'))
            ->type('email', 'admin@fresher03.local.com')
            ->type('password', 'cowell@123')
            ->press('Login')
            ->assertPathIs('/admin');
        });
    }

    /**
     * @group foo
     * Login Fail
     */
    public function testLoginFails()
    {
        $this->browse(function ($browser) {
            $browser->visit(route('admin@getLogin'))
            ->type('email', 'admin@fresher03.local.com')
            ->type('password', 'sai')
            ->press('Login')
            ->assertSee('Tên đăng nhập hoặc mật khẩu không đúng.');
        });
    }

    /**
     * @group foo
     * Login with account not activated
     */
    public function testLoginNotActivated()
    {
        $this->browse(function ($browser) {
            $browser->visit(route('admin@getLogin'))
            ->type('email', 'notactivated@fresher03.local.com')
            ->type('password', 'cowell@123')
            ->press('Login')
            ->assertSee('Tài khoản của bạn chưa được kích hoạt!');
        });
    }
}
