<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'warehouse_create',
            ],
            [
                'id'    => 18,
                'title' => 'warehouse_edit',
            ],
            [
                'id'    => 19,
                'title' => 'warehouse_show',
            ],
            [
                'id'    => 20,
                'title' => 'warehouse_delete',
            ],
            [
                'id'    => 21,
                'title' => 'warehouse_access',
            ],
            [
                'id'    => 22,
                'title' => 'product_create',
            ],
            [
                'id'    => 23,
                'title' => 'product_edit',
            ],
            [
                'id'    => 24,
                'title' => 'product_show',
            ],
            [
                'id'    => 25,
                'title' => 'product_delete',
            ],
            [
                'id'    => 26,
                'title' => 'product_access',
            ],
            [
                'id'    => 27,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 28,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 29,
                'title' => 'invoice_create',
            ],
            [
                'id'    => 30,
                'title' => 'invoice_edit',
            ],
            [
                'id'    => 31,
                'title' => 'invoice_show',
            ],
            [
                'id'    => 32,
                'title' => 'invoice_delete',
            ],
            [
                'id'    => 33,
                'title' => 'invoice_access',
            ],
            [
                'id'    => 34,
                'title' => 'invoice_item_create',
            ],
            [
                'id'    => 35,
                'title' => 'invoice_item_edit',
            ],
            [
                'id'    => 36,
                'title' => 'invoice_item_show',
            ],
            [
                'id'    => 37,
                'title' => 'invoice_item_delete',
            ],
            [
                'id'    => 38,
                'title' => 'invoice_item_access',
            ],
            [
                'id'    => 39,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
