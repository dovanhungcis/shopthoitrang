<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class UserControllerTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group user1
     * @return void
     */
    public function testIndexUser()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(route('admin@getLogin'))
            ->type('email', 'admin@fresher03.local.com')
            ->type('password', 'cowell@123')
            ->press('Login')
            ->visit(route('admin@user@user'))
            ->assertSee('FIRST NAME');
        });
    }
    /**
     * A Dusk test example.
     * @group user
     * @return void
     */
    public function testIndexCreateUser()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(route('admin@getLogin'))
            ->type('email', 'admin@fresher03.local.com')
            ->type('password', 'cowell@123')
            ->press('Login')
            ->visit(route('admin@user@create'))
            ->type('email', 'huy@fresher03.local.com')
            ->type('password', 'cowell@123')
            ->type('first_name', 'cowell@123')
            ->type('last_name', 'cowell@123')
            ->select('id_role', '3')
            ->press('Create')
            ->assertSee('Xong rồi');
        });
    }
}
