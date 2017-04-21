<?php
namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TagController extends Controller {

    public function store(Request $request) {
        $data['name'] = $request->data;
        $data['slug'] = Str::slug($data['name']);
        $count = Tag::where('name', $data['name'])->count();
        if ($count == 0) {
            Tag::create($data);
            return Tag::where('name', $data['name'])->first();
        }
        return 0;
    }
}
