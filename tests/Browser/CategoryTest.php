<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class CategoryTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group category
     * @return void
     */
    public function testCategory()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(route('admin@getLogin'))
            ->type('email', 'admin@fresher03.local.com')
            ->type('password', 'cowell@123')
            ->press('Login')
            ->visit(route('admin@category@category'))
            ->assertSee("CATEGORY'S NAME");
        });
    }
    /**
     * A Dusk test example.
     * @group category
     * @return void
     */
    public function testCategoryCreate()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(route('admin@getLogin'))
            ->type('email', 'admin@fresher03.local.com')
            ->type('password', 'cowell@123')
            ->press('Login')
            ->visit(route('admin@category@create'))
            ->type('name', 'New Category')
            ->press('Create')
            ->assertSee('Xong rồi');
        });
    }
}
