<?php

namespace App\Models;


class Post 
{
    private static $blog_post = [
        [
            "tittle" => "Judul Post Pertama",
            "author" => "Rai",
            "slug" => "judul-post-pertama",
            "body" => "Lorem ipsum dolor sit, amet consectetur adipisicing elit. Rerum eius deleniti maxime accusamus ex possimus repudiandae impedit, suscipit nihil provident fugiat quos dolores, hic nisi officia vitae reiciendis et dignissimos eveniet voluptates! Magni, velit provident quaerat autem, praesentium sequi doloribus voluptatem saepe, excepturi animi at quos voluptas eveniet. Provident distinctio, quos dolore reiciendis doloremque et voluptatibus hic accusamus sit eligendi. Earum beatae aliquam sit deleniti, nihil aperiam voluptatum dolores velit?"
        ],
        [
            "tittle" => "Judul Post kedua",
            "author" => "Fandi",
            "slug" => "judul-post-kedua",
            "body" => "Lorem ipsum dolor sit, amet consectetur adipisicing elit. Optio nemo, excepturi dicta, quidem labore ex quisquam dolores praesentium qui quae fugit obcaecati vel eum facere ea quis suscipit sed fugiat inventore aut expedita! Fugit, natus! Libero excepturi aliquid magnam illo? Fugit corporis numquam tempora tenetur quam nostrum voluptatum ipsa id nemo voluptates harum et dignissimos ratione voluptas, quia doloremque doloribus, dolore, vel recusandae? Laudantium iure porro architecto illum, laboriosam blanditiis dolore eos facere quam placeat quas accusamus quos corporis odit voluptatum facilis doloribus, eius nesciunt officia quasi? Tenetur ratione exercitationem dolorem inventore laudantium? Dolore reiciendis rerum eius quibusdam obcaecati maiores?" 
        ]
    ];

    private static $produk = [
        [
            "sub" => "meja",
            "image" => "meja.jpg"
        ],
        [
            "sub" => "mejas",
            "image" => "meja.jpg"
        ]
    ];


    public static function all ()
    {
        return collect(self::$blog_post);
    }

    public static function find($slug)
    {
        $posts = static::all();

        return $posts->firstWhere('slug',$slug);

    }

    public static function data()
    {
       return collect(self::$produk);

    }
}
