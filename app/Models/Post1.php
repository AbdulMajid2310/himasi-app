<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

class Post
{
    private static $blog_posts = [
        [
            "title" => "Judul Post Pertama",
            "author" => "Jaja Royana",
            "slug" => "judul-post-pertma",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam at explicabo tempore! Eos sunt earum cumque temporibus ipsum incidunt assumenda qui accusamus magni minima, delectus id odit laudantium dignissimos aliquam reprehenderit nobis ab, labore reiciendis? Magni, nostrum? Maiores neque voluptatem doloremque unde libero ipsum necessitatibus vel? Eum sit culpa fuga"
        ],
        [
            "title" => "Judul Post Kedua",
            "author" => "Naila Nadira",
            "slug" => "judul-post-kedua",

            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos quos perspiciatis odio consectetur excepturi, aut, numquam tenetur ex doloremque, suscipit autem recusandae qui! Totam qui quis magnam provident est nesciunt vero dolorum eum ullam? Quas iste officiis magnam, vel nam inventore nostrum cumque quibusdam esse accusamus non in consectetur pariatur rem aliquid quaerat est deserunt, quo magni reiciendis earum, consequuntur hic et nesciunt. Enim harum itaque, tempore repellat tempora consequatur omnis recusandae obcaecati placeat sint ab veniam ut. Necessitatibus, provident?"
        ],
    ];

    public static function all()
    {
        return collect(self::$blog_posts);
    }

    public static function find($slug)
    {
        $post = static::all();
        // $posts = [];
        // foreach ($blog_posts as $p) {
        //     if ($p['slug'] === $slug) {
        //         $post = $p;
        //     }
        // }
        return $post->firstWhere('slug', $slug);
    }
}
