<?php
namespace App\Repositories\Blog;

interface BlogRepositoryInterface
{
    public function list_with_paging($param = []);
    public function get_related_post($id);
    public function get_post_by_category_slug($slug);
    public function get_post_by_tag_slug($slug);
    public function search($str);
}
