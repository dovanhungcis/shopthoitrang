<?php
namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class SalesPageTest extends DuskTestCase {

    /**
     * Test sales home page
     * @group Sales
     *
     * @return void
     */
    public function testSalesHomePage() {
        $this->browse(function ($browser) {
            $this->browse(function (Browser $browser) {
                $browser->visit(route('admin@getLogin'))
                    ->type('email', 'dovanhungk57@gmail.com')
                    ->type('password', '123456')
                    ->press('Login')
                    ->visit('/sales')
                    ->assertSee("SHOP TODAY'S SALES");
            });
        });
    }

    /**
     * test list products page
     * @group Sales
     * return void
     */
    public function testProductsPage() {
        $this->browse(function ($browser) {
            $this->browse(function (Browser $browser) {
                $browser->visit('/sales/products/my-pham-thien-nhien-bac-au-100')
                    ->assertSee('Mỹ Phẩm Thiên Nhiên Bắc Âu STENDERS 100');
            });
        });
    }

    /**
     * test list products page not found
     * @group Sales
     * return void
     */
    public function testProductsPageNotFound() {
        $this->browse(function ($browser) {
            $this->browse(function (Browser $browser) {
                $browser->visit('/sales/productsasd/my-pham-thien-nhien-bac-au-100')
                    ->assertSee('Page not found');
            });
        });
    }

    /**
     * test deltail products page
     * @group Sales
     * return void
     */
    public function testSinglePage() {
        $this->browse(function ($browser) {
            $this->browse(function (Browser $browser) {
                $browser->visit('/sales/single/kem-bot-tam-huong-buoi-127')
                    ->assertSee('STENDERS 119');
            });
        });
    }

    /**
     * test deltail products page not found
     * @group Sales
     * return void
     */
    public function testSinglePageNotFound() {
        $this->browse(function ($browser) {
            $this->browse(function (Browser $browser) {
                $browser->visit('/sales/single/kem-bot-tam-huong-buoi-127dsadas')
                    ->assertSee('Page not found');
            });
        });
    }
}
