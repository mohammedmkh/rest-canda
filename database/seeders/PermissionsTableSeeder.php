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
                'title' => 'product_management_access',
            ],
            [
                'id'    => 18,
                'title' => 'product_category_create',
            ],
            [
                'id'    => 19,
                'title' => 'product_category_edit',
            ],
            [
                'id'    => 20,
                'title' => 'product_category_show',
            ],
            [
                'id'    => 21,
                'title' => 'product_category_delete',
            ],
            [
                'id'    => 22,
                'title' => 'product_category_access',
            ],
            [
                'id'    => 23,
                'title' => 'product_tag_create',
            ],
            [
                'id'    => 24,
                'title' => 'product_tag_edit',
            ],
            [
                'id'    => 25,
                'title' => 'product_tag_show',
            ],
            [
                'id'    => 26,
                'title' => 'product_tag_delete',
            ],
            [
                'id'    => 27,
                'title' => 'product_tag_access',
            ],
            [
                'id'    => 28,
                'title' => 'product_create',
            ],
            [
                'id'    => 29,
                'title' => 'product_edit',
            ],
            [
                'id'    => 30,
                'title' => 'product_show',
            ],
            [
                'id'    => 31,
                'title' => 'product_delete',
            ],
            [
                'id'    => 32,
                'title' => 'product_access',
            ],
            [
                'id'    => 33,
                'title' => 'resturant_create',
            ],
            [
                'id'    => 34,
                'title' => 'resturant_edit',
            ],
            [
                'id'    => 35,
                'title' => 'resturant_show',
            ],
            [
                'id'    => 36,
                'title' => 'resturant_delete',
            ],
            [
                'id'    => 37,
                'title' => 'resturant_access',
            ],
            [
                'id'    => 38,
                'title' => 'additional_create',
            ],
            [
                'id'    => 39,
                'title' => 'additional_edit',
            ],
            [
                'id'    => 40,
                'title' => 'additional_show',
            ],
            [
                'id'    => 41,
                'title' => 'additional_delete',
            ],
            [
                'id'    => 42,
                'title' => 'additional_access',
            ],
            [
                'id'    => 43,
                'title' => 'favorite_create',
            ],
            [
                'id'    => 44,
                'title' => 'favorite_edit',
            ],
            [
                'id'    => 45,
                'title' => 'favorite_show',
            ],
            [
                'id'    => 46,
                'title' => 'favorite_delete',
            ],
            [
                'id'    => 47,
                'title' => 'favorite_access',
            ],
            [
                'id'    => 48,
                'title' => 'payment_method_create',
            ],
            [
                'id'    => 49,
                'title' => 'payment_method_edit',
            ],
            [
                'id'    => 50,
                'title' => 'payment_method_show',
            ],
            [
                'id'    => 51,
                'title' => 'payment_method_delete',
            ],
            [
                'id'    => 52,
                'title' => 'payment_method_access',
            ],
            [
                'id'    => 53,
                'title' => 'notification_create',
            ],
            [
                'id'    => 54,
                'title' => 'notification_edit',
            ],
            [
                'id'    => 55,
                'title' => 'notification_show',
            ],
            [
                'id'    => 56,
                'title' => 'notification_delete',
            ],
            [
                'id'    => 57,
                'title' => 'notification_access',
            ],
            [
                'id'    => 58,
                'title' => 'order_create',
            ],
            [
                'id'    => 59,
                'title' => 'order_edit',
            ],
            [
                'id'    => 60,
                'title' => 'order_show',
            ],
            [
                'id'    => 61,
                'title' => 'order_delete',
            ],
            [
                'id'    => 62,
                'title' => 'order_access',
            ],
            [
                'id'    => 63,
                'title' => 'order_product_create',
            ],
            [
                'id'    => 64,
                'title' => 'order_product_edit',
            ],
            [
                'id'    => 65,
                'title' => 'order_product_show',
            ],
            [
                'id'    => 66,
                'title' => 'order_product_delete',
            ],
            [
                'id'    => 67,
                'title' => 'order_product_access',
            ],
            [
                'id'    => 68,
                'title' => 'address_create',
            ],
            [
                'id'    => 69,
                'title' => 'address_edit',
            ],
            [
                'id'    => 70,
                'title' => 'address_show',
            ],
            [
                'id'    => 71,
                'title' => 'address_delete',
            ],
            [
                'id'    => 72,
                'title' => 'address_access',
            ],
            [
                'id'    => 73,
                'title' => 'setting_create',
            ],
            [
                'id'    => 74,
                'title' => 'setting_edit',
            ],
            [
                'id'    => 75,
                'title' => 'setting_show',
            ],
            [
                'id'    => 76,
                'title' => 'setting_delete',
            ],
            [
                'id'    => 77,
                'title' => 'setting_access',
            ],
            [
                'id'    => 78,
                'title' => 'language_create',
            ],
            [
                'id'    => 79,
                'title' => 'language_edit',
            ],
            [
                'id'    => 80,
                'title' => 'language_show',
            ],
            [
                'id'    => 81,
                'title' => 'language_delete',
            ],
            [
                'id'    => 82,
                'title' => 'language_access',
            ],
            [
                'id'    => 83,
                'title' => 'faq_create',
            ],
            [
                'id'    => 84,
                'title' => 'faq_edit',
            ],
            [
                'id'    => 85,
                'title' => 'faq_show',
            ],
            [
                'id'    => 86,
                'title' => 'faq_delete',
            ],
            [
                'id'    => 87,
                'title' => 'faq_access',
            ],
            [
                'id'    => 88,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
