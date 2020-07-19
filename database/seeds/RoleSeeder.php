<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::truncate();

        Role::create([
            'name' => 'admin',
            'description' =>
                'somebody who has access to all the administration features within a single site.',
        ]);
        Role::create([
            'name' => 'manager',
            'description' =>
                'only update what an admin has created apart from comments, add/delete comments',
        ]);
        Role::create([
            'name' => 'editor',
            'description' =>
                'somebody who can publish and manage posts including the posts of other users.',
        ]);
        
        Role::create([
            'name' => 'user',
            'description' => 'somebody who can only manage their profile.',
        ]);
    }
}
