<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            [
                "name" => "Admin", 'description' => 'somebody who has access to all the administration features within a single site.',
            ],
            [
                "name" => "Editor", 'description' => 'somebody who can publish and manage posts including the posts of other users.',
            ],
            [
                "name" => "Author", 'description' => 'somebody who can publish and manage their own posts.',
            ],
            [
                "name" => "Contributor", 'description' => 'somebody who can write and manage their own posts but cannot publish them.',
            ],
            [
                "name" => "Subscriber", 'description' => 'somebody who can only manage their profile.',
            ],
        ]);
    }
}
