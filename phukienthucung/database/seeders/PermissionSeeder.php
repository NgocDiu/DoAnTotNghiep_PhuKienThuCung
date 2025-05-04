<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
           'order',
            'brand',
            'category',
            'product',
            'promotion',
            'user',
            'menu',
            'page',
            'article',
            'review',
            'stock_import',
            'stock',
            'report',
            'attribute'
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission, 'guard_name' => 'admin']);
        }
    }
}
