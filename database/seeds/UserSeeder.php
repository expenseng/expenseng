<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        DB::table('role_user')->truncate();

        $adminRole = Role::where('name', 'admin')->first();
        $managerRole = Role::where('name', 'manager')->first();
        $editorRole = Role::where('name', 'editor')->first();
        $userRole = Role::where('name', 'user')->first();

        $admin = User::create([
            'name' => 'AdminUser',
            'email' => 'admin@admin.com',
            'password' => Hash::make('adminpassword'),
            'status_id' => '1',
        ]);
        $manager = User::create([
            'name' => 'Manager User',
            'email' => 'manager@manager.com',
            'password' => Hash::make('managerpassword'),
            'status_id' => '2',
        ]);
        $editor = User::create([
            'name' => 'Editor User',
            'email' => 'editor@editor.com',
            'password' => Hash::make('editorpassword'),
            'status_id' => '3',
        ]);
        $user = User::create([
            'name' => 'Generic User',
            'email' => 'user@user.com',
            'password' => Hash::make('userpassword'),
            'status_id' => '2',
        ]);

        $admin->roles()->attach($adminRole);
        $manager->roles()->attach($managerRole);
        $editor->roles()->attach($editorRole);
        $user->roles()->attach($userRole);
    }
}
