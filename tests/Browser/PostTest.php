<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class PostTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group post
     * @return void
     */
    public function testPost()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(route('admin@getLogin'))
            ->type('email', 'admin@fresher03.local.com')
            ->type('password', 'cowell@123')
            ->press('Login')
            ->visit(route('admin@post@post'))
            ->assertSee("CONTENT");
        });
    }
    /**
     * A Dusk test example.
     * @group post
     * @return void
     */
    public function testPostCreate()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(route('admin@getLogin'))
            ->type('email', 'admin@fresher03.local.com')
            ->type('password', 'cowell@123')
            ->press('Login')
            ->visit(route('admin@post@create'))
            ->type('email', 'huy@fresher03.local.com')
            ->type('password', 'cowell@123')
            ->type('first_name', 'cowell@123')
            ->type('last_name', 'cowell@123')
            ->select('id_role', '3')
            ->assertSee("Xong rồi");
        });
    }
}
