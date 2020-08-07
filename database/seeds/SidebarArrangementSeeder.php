<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SidebarArrangementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sidebar_arrangement')->insert([
            [
                'name' => 'dashboard',
                'sidebar_code' => "<li class=' {{Route::is('dashboard')? 'nav-item active' : 'nav-item '}}'>
                <a class='nav-link' href='{{Route::is('dashboard')? '#' :route('dashboard')}}'>
                <i class='material-icons'>dashboard</i>
                <p>Dashboard</p>
                </a>
                 </li> ",
                'position' => 0,
            ],
            [
                'name' => 'users',
                'sidebar_code' => "<li class='{{Route::is('users.view') || Route::is('users.create') || Route::is('users.edit')? 'nav-item active' : 'nav-item'}} '>
                <a class='nav-link' href='{{Route::is('users.view') || Route::is('users.create') || Route::is('users.edit') ? '#' : route('users.view')}}'>
                    <i class='material-icons'>persons</i>
                <p>Users</p>
                    </a>
                    </li>",
                'position' => 1,
            ],
            [
                'name' => 'company',
                'sidebar_code' => "<li class='{{Route::is('company.view') || Route::is('company.create') || Route::is('company.edit')? 'nav-item active' : 'nav-item'}} '>
                <a class='nav-link' href='{{Route::is('company.view') || Route::is('company.create') || Route::is('company.edit') ? '#' : route('company.view')}}'>
                <i class='material-icons'>content_paste</i>
                <p>Company</p>
                </a>
                </li>",
                'position' => 2,
            ],
            [
                'name' => 'ministry',
                'sidebar_code' => "<li class='{{Route::is('ministry.view') || Route::is('ministry.create') || Route::is('ministry.edit')
                ? 'nav-item active' : 'nav-item'}} '>
                    <a class='nav-link' href='{{Route::is('ministry.view') || Route::is('ministry.create') || Route::is('ministry.edit')
                    ? '#' : route('ministry.view')}}'>
                    <i class='material-icons'>library_books</i>
                    <p>Ministry</p>
                    </a>
                </li>",
                'position' => 3,
            ],
            [
                'name' => 'Expenses',
                'sidebar_code' => "<li class='{{Route::is('expenses.view') || Route::is('expenses.create') || Route::is('expenses.edit')
                ? 'nav-item active' : 'nav-item'}} '>
                    <a class='nav-link' href='{{Route::is('expenses.view') || Route::is('expenses.create') || Route::is('expenses.edit') ? '#' : route('expenses.view')}}'>
                    <i class='material-icons'>bubble_chart</i>
                    <p>Expenses</p>
                    </a>
                </li>",
                'position' => 4,
            ],
            [
                'name' => 'Payments',
                'sidebar_code' => "<li class='{{Route::is('payments.view') || Route::is('payments.create') || Route::is('payments.edit')
                ? 'nav-item active' : 'nav-item'}} '>
                    <a class='nav-link' href='{{route('payments.view')}}'>
                    <i class='material-icons'>money</i>
                    <p>Payments</p>
                    </a>
                </li>",
                'position' => 5,
            ],
            [
                'name' => 'Cabinet',
                'sidebar_code' => "<li class='{{Route::is('cabinet.view') || Route::is('cabinet.create') || Route::is('cabinet.edit')
                ? 'nav-item active' : 'nav-item'}}  '>
                    <a class='nav-link' href='{{route('cabinet.view')}}'>
                    <i class='material-icons'>create_new_folder</i>
                    <p>Cabinet</p>
                    </a>
                </li>",
                'position' => 6,
            ],
            [
                'name' => 'Sector',
                'sidebar_code' => "<li class='{{Route::is('sector.view') || Route::is('sector.create') || Route::is('sector.edit')
                ? 'nav-item active' : 'nav-item'}} '>
                    <a class='nav-link' href='{{Route::is('sector.view') || Route::is('sector.create') || Route::is('sector.edit')
                    ? '#' : route('sector.view')}}'>
                    <i class='material-icons'>work</i>
                    <p>Sector</p>
                    </a>
                </li>",
                'position' => 7,
            ],
            [
                'name' => 'Teams',
                'sidebar_code' => "<li class='{{Route::is('team.view') || Route::is('team.create') || Route::is('team.edit')
                ? 'nav-item active' : 'nav-item'}}  '>
                    <a class='nav-link' href='{{route('team.view')}}'>
                    <i class='material-icons'>people</i>
                    <p>Teams</p>
                    </a>
                </li>",
                'position' => 8,
            ],
            [
                'name' => 'Subcriptions',
                'sidebar_code' => "<li class='{{Route::is('subscribe.view') || Route::is('subscribe.create') || Route::is('subscribe.edit')
                ? 'nav-item active' : 'nav-item'}} '>
                    <a class='nav-link' href='{{Route::is('subscribe.view')? '#' :route('subscribe.view')}}'>
                    <i class='material-icons'>star_outline</i>
                    <p>Subcriptions</p>
                    </a>
                </li>",
                'position' => 9,
            ],
            [
                'name' => 'People',
                'sidebar_code' => "<li class='nav-item '>
                    <a class='nav-link' href='#'>
                    <i class='material-icons'>supervisor_account</i>
                    <p>People</p>
                    </a>
                </li>",
                'position' => 10,
            ],
            [
                'name' => 'Upload Spreadsheet',
                'sidebar_code' => "
                <li class='{{Route::is('importExcel')
                ? 'nav-item active' : 'nav-item'}} '>
                    <a class='nav-link' href='{{Route::is('importExcel')? '#' :route('importExcel')}}'>

                    <i class='material-icons'>note_add</i>
                    <p>Upload Spreadsheet</p>
                    </a>
                </li>
                ",
                'position' => 11,
            ],
            [
                'name' => 'Blog',
                'sidebar_code' => "<li class='{{Route::is('blogetc.admin.index')
                ? 'nav-item active' : 'nav-item'}} '>
                    <a class='nav-link' href='{{ route('blogetc.admin.index') }}'>
                    <i class='material-icons'>Blog</i>
                    <p>Blog</p>
                    </a>
                </li>",
                'position' => 12,
            ],
            [
                'name' => 'Comments',
                'sidebar_code' => "<li class='{{Route::is('comments')
                ? 'nav-item active' : 'nav-item'}} '>
                    <a class='nav-link' href='{{route('comments')}}'>
                    <i class='material-icons'>comment</i>
                    <p>Comments</p>
                    </a>
                </li>",
                'position' => 13,
            ],
            [
                'name' => 'Sheets',
                'sidebar_code' => "<li class='{{Route::is('sheets')? 'active nav-item' : 'nav-item' }}'>
                <a class='nav-link' href='{{route('sheets')}}''>
                <i class='material-icons'>attachment</i>
                    <p>Sheets</p>
                </a>
                </li>",
                'position' => 14,
            ],
            [
                'name' => 'Website Statistics',
                'sidebar_code' => "<li class='{{Route::is('website_stats')? 'active nav-item' : 'nav-item' }}'>
                <a class='nav-link' href='{{route('website_stats')}}'>
                <i class='material-icons'>assessment</i>
                    <p>Website Statistics</p>
                </a>
                </li>",
                'position' => 15,
            ],
        ]);
    }
}
