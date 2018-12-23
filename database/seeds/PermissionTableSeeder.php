<?php

use App\Permission;
use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions=[
            [
                'name' => 'role-real',
                'display_name' => 'Display Role Listing',
                'description' => 'See only Listing Or Role'
            ],
            [
                'name' => 'role-create',
                'display_name' => 'Create Role',
                'description' => 'Create New Role'
            ],
            [
                'name' => 'role-edit',
                'display_name' => 'Edit Role',
                'description' => 'Edit Role'
            ],
            [
                'name' => 'role-delete',
                'display_name' => 'Delete Role',
                'description' => 'Delete Role'
            ],
            [
                'name' => 'article-list',
                'display_name' => 'Display Notebook Listing',
                'description' => 'See only Listing Of Notebook'
            ],
            [
                'name' => 'article-create',
                'display_name' => 'Create Notebook',
                'description' => 'Create New Notebook'
            ],
            [
                'name' => 'article-edit',
                'display_name' => 'Edit Notebook',
                'description' => 'Edit Notebook'
            ],
            [
                'name' => 'article-delete',
                'display_name' => 'Delete Notebook',
                'description' => 'Delete Notebook'
            ]
        ];

        foreach ($permissions as $key=>$value){
            Permission::create($value);
        }
    }
}
