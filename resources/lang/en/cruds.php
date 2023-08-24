<?php

return [
    'userManagement' => [
        'title'          => 'User management',
        'title_singular' => 'User management',
    ],
    'permission' => [
        'title'          => 'Permissions',
        'title_singular' => 'Permission',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'title'             => 'Title',
            'title_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'role' => [
        'title'          => 'Roles',
        'title_singular' => 'Role',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'title'              => 'Title',
            'title_helper'       => ' ',
            'permissions'        => 'Permissions',
            'permissions_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'user' => [
        'title'          => 'Users',
        'title_singular' => 'User',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => ' ',
            'name'                     => 'Name',
            'name_helper'              => ' ',
            'email'                    => 'Email',
            'email_helper'             => ' ',
            'email_verified_at'        => 'Email verified at',
            'email_verified_at_helper' => ' ',
            'password'                 => 'Password',
            'password_helper'          => ' ',
            'roles'                    => 'Roles',
            'roles_helper'             => ' ',
            'remember_token'           => 'Remember Token',
            'remember_token_helper'    => ' ',
            'created_at'               => 'Created at',
            'created_at_helper'        => ' ',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => ' ',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => ' ',
        ],
    ],
    'productManagement' => [
        'title'          => 'Product Management',
        'title_singular' => 'Product Management',
    ],
    'ADSManagement' => [
        'title'          => 'ADS Management',
        'title_singular' => 'ADS Management',
    ],
    'Country&CityManagement' => [
        'title'             => 'Country&CityManage',
        'title_singular'    => 'Country&CityManagement',
    ],
    'country' => [
        'title'             => 'Country',
        'title_singular'    => 'Country',
        'fields'            =>[

            'id'        => 'ID',
            'id_helper' => ' ',
            'name'      => 'country name',
        ],

    ],
    'ads' => [
        'title'             => 'ADS',
        'title_singular'    => 'ADS',
        'fields'            =>[

            'id'        => 'ID',
            'title' => 'ADS',
            'id_helper' => ' ',
            'url'      => 'URL',
            'type'      => 'type',
        ],

    ],
    'city' => [
        'title'             => 'City',
        'title_singular'    => 'City',
        'fields' => [
        'id' => 'ID',
        'id_helper' => ' ',
        'name' => 'city name',

        ],
    ],
    'productCategory' => [
        'title'          => 'Categories',
        'title_singular' => 'Category',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'name'               => 'Name',
            'name_helper'        => ' ',
            'description'        => 'Description',
            'description_helper' => ' ',
            'photo'              => 'Photo',
            'photo_helper'       => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated At',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted At',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'productTag' => [
        'title'          => 'Tags',
        'title_singular' => 'Tag',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated At',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted At',
            'deleted_at_helper' => ' ',
        ],
    ],
    'product' => [
        'title'          => 'Products',
        'title_singular' => 'Product',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'name'               => 'Name',
            'name_helper'        => ' ',
            'description'        => 'Description',
            'description_helper' => ' ',
            'price'              => 'Price',
            'price_helper'       => ' ',
            'category'           => 'Categories',
            'category_helper'    => ' ',
            'tag'                => 'Tags',
            'tag_helper'         => ' ',
            'photo'              => 'Photo',
            'photo_helper'       => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated At',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted At',
            'deleted_at_helper'  => ' ',
            'resturant'          => 'Resturant',
            'resturant_helper'   => ' ',
            'additionals'        => 'Additionals',
            'additionals_helper' => ' ',
            'discount'           => 'Discount',
            'discount_helper'    => ' ',
        ],
    ],
    'resturant' => [
        'title'          => 'Resturants',
        'title_singular' => 'Resturant',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'email'             => 'Email',
            'email_helper'      => ' ',
            'phone'             => 'Phone',
            'phone_helper'      => ' ',
            'facebook'          => 'Facebook',
            'facebook_helper'   => ' ',
            'twitter'           => 'Twitter',
            'twitter_helper'    => ' ',
            'instagram'         => 'Instagram',
            'instagram_helper'  => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'lat'               => 'Lat',
            'lat_helper'        => ' ',
            'long'              => 'Long',
            'long_helper'       => ' ',
            'image'             => 'Image',
            'image_helper'      => ' ',
        ],
    ],
    'additional' => [
        'title'          => 'Additionals',
        'title_singular' => 'Additional',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'price'             => 'Price',
            'price_helper'      => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'type'              => 'Type',
            'type_helper'       => ' ',
            'product'           => 'Product',
            'product_helper'    => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'favorite' => [
        'title'          => 'Favorite',
        'title_singular' => 'Favorite',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'user'              => 'User',
            'user_helper'       => ' ',
            'product'           => 'Product',
            'product_helper'    => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'paymentMethod' => [
        'title'          => 'Payment Method',
        'title_singular' => 'Payment Method',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'status'            => 'Status',
            'status_helper'     => ' ',
        ],
    ],
    'notification' => [
        'title'          => 'Notification',
        'title_singular' => 'Notification',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'title'             => 'Title',
            'title_helper'      => ' ',
            'body'              => 'Body',
            'body_helper'       => ' ',
            'user'              => 'User',
            'user_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'order' => [
        'title'          => 'Orders',
        'title_singular' => 'Order',
        'fields'         => [
            'id'                    => 'ID',
            'id_helper'             => ' ',
            'total'                 => 'Total',
            'total_helper'          => ' ',
            'user'                  => 'User',
            'user_helper'           => ' ',
            'created_at'            => 'Created at',
            'created_at_helper'     => ' ',
            'updated_at'            => 'Updated at',
            'updated_at_helper'     => ' ',
            'deleted_at'            => 'Deleted at',
            'deleted_at_helper'     => ' ',
            'order_status'          => 'Order Status',
            'order_status_helper'   => ' ',
            'resturant'             => 'Resturant',
            'resturant_helper'      => ' ',
            'delivery_price'        => 'Delivery Price',
            'delivery_price_helper' => ' ',
            'receipt_type'          => 'Receipt Type',
            'receipt_type_helper'   => ' ',
            'tax'                   => 'Tax',
            'tax_helper'            => ' ',
            'payment_method'        => 'Payment Method',
            'payment_method_helper' => ' ',
        ],
    ],
    'orderProduct' => [
        'title'          => 'OrderProduct',
        'title_singular' => 'OrderProduct',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'product'           => 'Product',
            'product_helper'    => ' ',
            'order'             => 'Order',
            'order_helper'      => ' ',
            'price'             => 'Price',
            'price_helper'      => ' ',
            'quantity'          => 'Quantity',
            'quantity_helper'   => ' ',
            'total'             => 'Total',
            'total_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'address' => [
        'title'          => 'Addresses',
        'title_singular' => 'Address',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'lat'               => 'Lat',
            'lat_helper'        => ' ',
            'long'              => 'Long',
            'long_helper'       => ' ',
            'default'           => 'Default',
            'default_helper'    => ' ',
            'user'              => 'User',
            'user_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'setting' => [
        'title'          => 'Settings',
        'title_singular' => 'Setting',
        'fields'         => [
            'id'                   => 'ID',
            'id_helper'            => ' ',
            'text_policy'          => 'Text Policy',
            'text_policy_helper'   => ' ',
            'tex_policy_ar'        => 'Tex Policy Arabic',
            'tex_policy_ar_helper' => ' ',
            'aboutus_en'           => 'About us English',
            'aboutus_en_helper'    => ' ',
            'aboutus_ar'           => 'About us Arabic',
            'aboutus_ar_helper'    => ' ',
            'terms_ar'             => 'Terms Arabic',
            'terms_ar_helper'      => ' ',
            'terms_en'             => 'Terms English',
            'terms_en_helper'      => ' ',
            'created_at'           => 'Created at',
            'created_at_helper'    => ' ',
            'updated_at'           => 'Updated at',
            'updated_at_helper'    => ' ',
            'deleted_at'           => 'Deleted at',
            'deleted_at_helper'    => ' ',
        ],
    ],
    'language' => [
        'title'          => 'Languages',
        'title_singular' => 'Language',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'code'              => 'Code',
            'code_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'faq' => [
        'title'          => 'Faqs',
        'title_singular' => 'Faq',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'questions'         => 'Questions',
            'questions_helper'  => ' ',
            'answer'            => 'Answer',
            'answer_helper'     => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],

];
