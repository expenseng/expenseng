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
            'phone_number' => '0803671257',
             'date_of_birth' => '07/24/2020',
            'gender' => 'male'
        ]);
        $manager = User::create([
            'name' => 'Manager User',
            'email' => 'manager@manager.com',
            'password' => Hash::make('managerpassword'),
            'status_id' => '2',
            'phone_number' => '0803671257',
             'date_of_birth' => '07/24/2020',
            'gender' => 'male'
        ]);
        $editor = User::create([
            'name' => 'Editor User',
            'email' => 'editor@editor.com',
            'password' => Hash::make('editorpassword'),
            'status_id' => '3',
            'phone_number' => '0803671257',
             'date_of_birth' => '07/24/2020',
            'gender' => 'male'
        ]);
        $user = User::create([
            'name' => 'Generic User',
            'email' => 'user@user.com',
            'password' => Hash::make('userpassword'),
            'status_id' => '2',
            'phone_number' => '0803671257',
            'date_of_birth' => '07/24/2020',
            'gender' => 'male'
        ]);

        $admin->roles()->attach($adminRole);
        $manager->roles()->attach($managerRole);
        $editor->roles()->attach($editorRole);
        $user->roles()->attach($userRole);
    }
}
