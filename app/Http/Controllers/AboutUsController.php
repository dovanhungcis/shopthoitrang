<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutUsController extends Controller {

    public function about() {
        $book = 5;

        return view('about', compact('book'));
    }
}
