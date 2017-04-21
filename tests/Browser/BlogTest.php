<?php
namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class BlogTest extends DuskTestCase {

    /**
     * A Dusk test Home page.
     * @group blog
     * 
     * @return void
     */
    public function testHomePage() {
        $this->browse(function ($browser) {
            $browser->visit('/')
                ->assertSee('LEFLAIR');
        });
    }

    /**
     * @group blog
     */
    public function testPostPage() {
        $this->browse(function ($browser) {
            $browser->visit('/post/51/nhung-san-pham-vang-giu-lop-trang-diem-lau-troi')
                ->assertSee('Published on');
        });
    }

    /**
     * @group blog
     */
    public function testPostPageFails() {
        $this->browse(function ($browser) {
            $browser->visit('/post/500/nhung-san-pham-vang-giu-lop-trang-diem-lau-troi')
                ->assertSee('Page not found');
        });
    }

    /**
     * @group blog
     */
    public function testCategoryPage() {
        $this->browse(function ($browser) {
            $browser->visit('/category/thoi-trang')
                ->assertSee('Category');
        });
    }

    /**
     * @group blog
     */
    public function testCategoryPageFails() {
        $this->browse(function ($browser) {
            $browser->visit('/category/thoi-trangdasd')
                ->assertSee('Page not found');
        });
    }

    /**
     * @group blog
     */
    public function testTagPage() {
        $this->browse(function ($browser) {
            $browser->visit('/tag/nuoc-hoa')
                ->assertSee('Tag');
        });
    }

    /**
     * @group blog
     */
    public function testTagPageFails() {
        $this->browse(function ($browser) {
            $browser->visit('/tag/nuoc-hoadasda')
                ->assertSee('Page not found');
        });
    }

    /**
     * @group blog
     */
    public function testSearch() {
        $this->browse(function ($browser) {
            $browser->visit('/search?s=sadasdas')
                ->assertSee('Search Results for');
        });
    }
}
