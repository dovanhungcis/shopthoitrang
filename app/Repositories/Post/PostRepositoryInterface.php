<?php
namespace App\Repositories\Post;

use App\Post;

interface PostRepositoryInterface {

    public function update_view_post(Post $post);

    public function list_with_categories_and_paging($param = []);

    public function get_all_category();

    public function get_all_tag();
}