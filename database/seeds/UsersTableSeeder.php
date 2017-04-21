<?php
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('roles')->truncate();
        DB::table('role_users')->truncate();

        $roles = [
            [
                'name' => 'Admin',
                'slug' => 'admin',
                'permissions' => [
                    'post.show' => true,
                    'post.create' => true,
                    'post.update' => true,
                    'post.publish' => true,
                    'post.delete' => true,
                    'user.show' => true,
                    'user.create' => true,
                    'user.update' => true,
                    'user.delete' => true,
                    'user.add_role' => true,
                    'user.band' => true
                ]
            ],
            [
                'name' => 'Mod',
                'slug' => 'mod',
                'permissions' => [
                    'post.show' => true,
                    'post.publish' => true,
                    'user.show' => true
                ]
            ],
            [
                'name' => 'Writter',
                'slug' => 'writter',
                'permissions' => [
                    'post.show' => true,
                    'post.create' => true,
                    'post.update' => true,
                    'post.delete' => true
                ]
            ]
        ];

        foreach ($roles as $role) {
            Sentinel::getRoleRepository()->createModel()
                ->fill($role)
                ->save();
        }

        // Create user with admin-role
        $admin_data = [
            'email' => 'admin@fresher03.local.com',
            'password' => 'cowell@123',
            'first_name' => 'Admin',
            'last_name' => 'System',
            'permissions' => [
                'admin' => true
            ]
        ];

        $admin = Sentinel::registerAndActivate($admin_data);
        $role = Sentinel::findRoleBySlug('admin');
        $role->users()->attach($admin);

        $admin_data = [
            'email' => 'demo@gmail.com',
            'password' => 'demo123',
            'first_name' => 'Huy',
            'last_name' => '123',
            'permissions' => [
                'mod' => true
            ]
        ];

        $admin = Sentinel::registerAndActivate($admin_data);
        $role = Sentinel::findRoleBySlug('mod');
        $role->users()->attach($admin);
    }
}
