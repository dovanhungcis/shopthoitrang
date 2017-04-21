<?php
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $this->call(UsersTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(TagsTableSeeder::class);
        $this->call(PostsTableSeeder::class);
        $this->call(PostTagsTableSeeder::class);
        $this->call(PostCategoryTableSeeder::class);
        $this->call(ItemsTableSeeder::class);
        $this->call(SaleTableSeeder::class);
        $this->call(ProductColorTableSeeder::class);
        $this->call(ProductSizesTableSeeder::class);
        $this->call(SuppliesTableSeeder::class);
        $this->call(ProductTableSeeder::class);
        $this->call(ProductImageTableSeeder::class);
        $this->call(ProductQuantitiesTableSeeder::class);
    }
}

class CategoriesTableSeeder extends Seeder {

    public function run() {
        DB::table('categories')->insert([
            [
                'name' => 'Thời Trang',
                'slug' => 'thoi-trang'
            ],
            [
                'name' => 'Làm Đẹp',
                'slug' => 'lam-dep'
            ],
            [
                'name' => 'LIFEFTYLE',
                'slug' => 'life-style'
            ],
            [
                'name' => 'Văn Hóa',
                'slug' => 'van-hoa'
            ],
            [
                'name' => 'Thiết Kế',
                'slug' => 'thiet-ke'
            ],
            [
                'name' => 'Thương Hiệu',
                'slug' => 'thuong-hieu'
            ]
        ]);
    }
}

class TagsTableSeeder extends Seeder {

    public function run() {
        DB::table('tags')->insert([
            [
                'name' => 'công ty mỹ phẩm',
                'slug' => 'cong-ty-my-pham'
            ],
            [
                'name' => 'nước hoa',
                'slug' => 'nuoc-hoa'
            ],
            [
                'name' => 'thương hiệu chuyên về nước hoa',
                'slug' => 'thuong-hieu-chuyen-ve-nuoc-hoa'
            ],
            [
                'name' => 'Búi rối',
                'slug' => 'bui-roi'
            ],
            [
                'name' => 'tạo kiểu tóc',
                'slug' => 'tao-kieu-toc'
            ],
            [
                'name' => 'kiểu tóc',
                'slug' => 'kieu-toc'
            ],
            [
                'name' => 'búi xoắn hai bên',
                'slug' => 'bui-xoan-hai-ben'
            ]
        ]);
    }
}

class PostsTableSeeder extends Seeder {

    public function run() {
        $faker = Faker::create('vi_VN');
        for ($i = 1; $i <= 50; $i ++) {
            $title = $faker->word;
            DB::table('posts')->insert([
                [
                    'img' => random_int(1, 10).'.jpg',
                    'title' => $title,
                    'slug' => Str::slug($title),
                    'description' => $faker->paragraph,
                    'content' => $faker->paragraph,
                    'likes' => ($i * 100)
                ]
            ]);
        }
    }
}

class PostTagsTableSeeder extends Seeder {

    public function run() {
        for ($i = 1; $i <= 200; $i ++) {
            DB::table('post_tags')->insert([
                [
                    'id_post' => random_int(1, 50),
                    'id_tags' => random_int(1, 7)
                ]
            ]);
        }
    }
}

class PostCategoryTableSeeder extends Seeder {

    public function run() {
        for ($i = 1; $i <= 200; $i ++) {
            DB::table('post_category')->insert([
                [
                    'id_post' => random_int(1, 50),
                    'id_category' => random_int(1, 6)
                ]
            ]);
        }
    }
}

// class PostCategoryTableSeeder extends Seeder {

// public function run() {
// for ($i = 1; $i <= 200; $i ++) {
// DB::table('post_category')->insert([
// [
// 'id_post' => random_int(1, 50),
// 'id_category' => random_int(1, 6)
// ]
// ]);
// }
// }
// }
class SaleTableSeeder extends Seeder {

    public function run() {
        for ($i = 1; $i <= 50; $i ++) {
            DB::table('sales')->insert([
                [
                    'name' => 'Mỹ Phẩm Thiên Nhiên Bắc Âu STENDERS ' . $i,
                    'slug' => 'my-pham-thien-nhien-bac-au-' . $i,
                    'img_event' => '1.jpg',
                    'img_banner' => '2.jpg',
                    'start_date' => '2017-03-31',
                    'end_date' => '2017-10-14'
                ]
            ]);
        }
        for ($i = 1; $i <= 50; $i ++) {
            DB::table('sales')->insert([
                [
                    'name' => 'Mỹ Phẩm China ' . $i,
                    'slug' => 'my-pham-china-' . $i,
                    'img_event' => '1.jpg',
                    'img_banner' => '2.jpg',
                    'start_date' => '2017-08-31',
                    'end_date' => '2017-10-14'
                ]
            ]);
        }
    }
}

class SuppliesTableSeeder extends Seeder {

    public function run() {
        $faker = Faker::create();
        foreach (range(1, 1000) as $index) {
            $name = $faker->city;
            DB::table('suppliers')->insert([
                'name' => $name,
                'slug' => Str::slug($name),
                'photo' => random_int(1, 17) . '.jpg'
            ]);
        }
    }
}

class ItemsTableSeeder extends Seeder {

    public function run() {
        DB::table('items')->insert([
            [
                'name' => 'Quần Áo',
                'slug' => 'quan-ao'
            ],
            [
                'name' => 'Túi sách',
                'slug' => 'tui-sach'
            ],
            [
                'name' => 'Giầy dép',
                'slug' => 'giay-dep'
            ],
            [
                'name' => 'Đồng hồ',
                'slug' => 'dong-ho'
            ],
            [
                'name' => 'Cặp sách',
                'slug' => 'cap-sach'
            ],
            [
                'name' => 'Mỹ phẩm',
                'slug' => 'my-pham'
            ],
            [
                'name' => 'Phụ kiện',
                'slug' => 'phu-kien'
            ],
            [
                'name' => 'Trang sức',
                'slug' => 'trang-suc'
            ],
            [
                'name' => 'Kính mắt',
                'slug' => 'kinh-mat'
            ],
            [
                'name' => 'Son',
                'slug' => 'son'
            ],
        ]);
    }
}

class ProductTableSeeder extends Seeder {

    public function run() {
        for ($i = 1; $i <= 15; $i ++) {
            DB::table('products')->insert([
                [
                    'id_sale' => random_int(1, 5),
                    'id_supplier' => random_int(1, 50),
                    'id_item' => random_int(1, 6),
                    'name' => 'Kem Bọt Tắm Hương Bưởi 110g ' . $i,
                    'slug' => 'kem-bot-tam-huong-buoi-' . $i,
                    'detail_product' => 'Xuất xứ: Latvia
                                        Sản xuất: Latvia
                                        Công dụng:
                                        Kết cấu dạng kem bọt xốp, mềm mại sẽ nhẹ nhàng làm sạch làn da và giúp bạn có được cảm giác thư giãn, thoải mái nhất Thành phần chiết xuất từ quả bưởi sẽ tăng cường nuôi dưỡng, cung cấp chất chống oxy hóa, bảo vệ da và lưu lại trên da hương thơm tươi mát, dễ chịu
                                        Hạn sử dụng: ít nhất đến tháng 03/2018',
                    'detail_size' => "Người mẫu mặc size M và cao 178cm
                                        Size sản phẩm	Vòng ngực (cm)	Vòng eo (cm)
                                        L	88-92	68-72
                                        M	84-88	64-68",

                    'detail_infomation' => "Vẻ ngoài nổi bật cho các cô nàng nữ tính.
                                            kims là nhãn hiệu thuộc thời trang KIMI, mang đến vẻ đẹp thời trang được chắt lọc cùng xu hướng, cẩn thận trong từng khâu lựa chọn vải và tinh tế trên từng đường kim mũi chỉ. Hãy theo chân kims cùng khám phá cái đẹp trên từng thớ vải và trong từng nhánh hoa.",
                    'material_storage' => "Chất liệu: Linen
                                        Bảo quản: Giặt nhẹ với các sản phẩm cùng màu, không tẩy",
                    'quantity' => random_int(1, 200),
                    'sold' => 0
                ]
            ]);
        }
    }
}

class ProductColorTableSeeder extends Seeder {

    public function run() {
        DB::table('product_colors')->insert([
            [
                'color' => 'Đen',
                'bc' => 'black'
            ],
            [
                'color' => 'Đỏ',
                'bc' => 'red'
            ],
            [
                'color' => 'Xanh',
                'bc' => 'blue'
            ],
            [
                'color' => 'Vàng',
                'bc' => 'yellow'
            ],
            [
                'color' => 'Trắng',
                'bc' => 'white'
            ],
            [
                'color' => 'Nâu',
                'bc' => 'Brown'
            ],
            [
                'color' => 'Hồng',
                'bc' => 'pink'
            ],
            [
                'color' => 'Xanh lá cây',
                'bc' => 'green'
            ],
            [
                'color' => '-',
                'bc' => '-'
            ]
        ]);
    }
}

class ProductImageTableSeeder extends Seeder {

    public function run() {
        $a = array(
            '20.jpg',
            '21.jpg',
            '22.jpg',
        );
        for ($i = 1; $i <= 100; $i ++) {
            DB::table('product_images')->insert([
                [
                    'product_id' => random_int(1, 15),
                    'photo' => $a[$i % 3]
                ]
            ]);
        }
    }
}

class ProductSizesTableSeeder extends Seeder {

    public function run() {
        DB::table('product_sizes')->insert([
            [
                'size' => 'XS'
            ],
            [
                'size' => 'S'
            ],
            [
                'size' => 'M'
            ],
            [
                'size' => 'L'
            ],
            [
                'size' => 'XL'
            ],
            [
                'size' => '-'
            ]
        ]);
    }
}

class ProductQuantitiesTableSeeder extends Seeder {

    public function run() {
        for ($i = 1; $i <= 100; $i ++) {
            DB::table('product_quantities')->insert([
                [
                    'product_id' => random_int(1, 15),
                    'size_id' => random_int(1, 6),
                    'color_id' => random_int(1, 9),
                    'price' => $i * 100000,
                    'price_sale' => $i * 100000 - 20000,
                    'quantity' => random_int(1, 30)
                ]
            ]);
        }
    }
}