<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            [
                "name" => "AdminUser", 
                'email' => 'admin@admin.com', 
                'password' =>  Hash::make('adminpassword'), 
                'role_id' => '1',
                'status_id' => '1',
            ],
             [
                "name" => "EditorUser",
                'email' => 'editor@editor.com', 
                'password' =>  Hash::make('editorpassword'),
                'role_id' => '2',
                'status_id' => '3',
            ],
             [
                "name" => "SubscriberUser",
                'email' => 'subscriber@subscriber.com', 
                'password' =>  Hash::make('subscriberpassword'),
                'role_id' => '5',
                'status_id' => '2',
            ],
        ]);

    }
}
