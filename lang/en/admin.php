<?php

return [

    'groups' => [
        'blog' => 'Blog',
        'shop' => 'Shop',
        'support' => 'Support',
        'marketing' => 'Marketing',
    ],

    'product_type' => [
        'course' => 'Course',
        'license' => 'License',
        'ebook' => 'eBook',
    ],

    'ticket_priority' => [
        'low' => 'Low',
        'medium' => 'Medium',
        'high' => 'High',
    ],

    'resources' => [
        'user' => [
            'singular' => 'User',
            'plural' => 'Users',
            'fields' => [
                'name' => 'Name',
                'email' => 'Email',
                'password' => 'Password',
                'avatar' => 'Avatar',
            ],
        ],
        'category' => [
            'singular' => 'Category',
            'plural' => 'Categories',
            'fields' => [
                'name' => 'Name',
                'slug' => 'Slug',
            ],
        ],
        'post' => [
            'singular' => 'Post',
            'plural' => 'Posts',
            'fields' => [
                'title' => 'Title',
                'slug' => 'Slug',
                'description' => 'Description',
                'cover' => 'Post cover',
                'content' => 'Content',
                'category' => 'Category',
                'tags' => 'Tags',
                'external_url' => 'External URL',
                'published' => 'Published',
                'original_content' => 'Original content',
                'publish_date' => 'Publish date',
            ],
        ],
        'tag' => [
            'singular' => 'Tag',
            'plural' => 'Tags',
            'fields' => [
                'name' => 'Name',
                'slug' => 'Slug',
            ],
        ],
        'product' => [
            'singular' => 'Product',
            'plural' => 'Products',
            'fields' => [
                'name' => 'Product name',
                'price' => 'Price',
                'description' => 'Description',
                'cover' => 'Product cover',
                'product_type' => 'Type',
                'external_link' => 'Product link',
                'published' => 'Published',
                'is_lifetime' => 'Lifetime license',
            ],
        ],
        'testimony' => [
            'singular' => 'Testimony',
            'plural' => 'Testimonies',
            'fields' => [
                'name' => 'Name',
                'designation' => 'Designation',
                'testimonial' => 'Testimonial',
                'avatar' => 'Avatar',
            ],
        ],
        'ticket' => [
            'singular' => 'Ticket',
            'plural' => 'Tickets',
            'fields' => [
                'user' => 'User',
                'title' => 'Title',
                'content' => 'Content',
                'priority' => 'Priority',
                'identifier' => 'Identifier',
            ],
        ],
    ],

    'widgets' => [
        'stats' => [
            'posts' => 'Total posts',
            'products' => 'Total products',
            'users' => 'Total users',
            'testimonies' => 'Testimonies',
        ],
    ],
];
