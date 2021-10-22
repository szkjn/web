<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::truncate();
        \App\Models\Category::truncate();
        \App\Models\Post::truncate();
        \App\Models\Comment::truncate();

        // -------------------- u s e r s --------------------- //

        \App\Models\User::create([
            'id' => '1',
            'is_admin' => '1',
            'name' => 'admin',
            'email' => 'admin@email.com',
            'password' => Hash::make('123456789'),
        ]);

        \App\Models\User::create([
            'id' => '2',
            'name' => 'toto',
            'email' => 'toto@email.com',
            'password' => Hash::make('123456789'),
        ]);

        \App\Models\User::create([
            'id' => '3',
            'name' => 'lulu',
            'email' => 'lulu@email.com',
            'password' => Hash::make('123456789'),
        ]);

        \App\Models\User::create([
            'id' => '4',
            'name' => 'fifi',
            'email' => 'fifi@email.com',
            'password' => Hash::make('123456789'),
        ]);

        // ---------------- c a t e g o r i e s ------------------ //

        \App\Models\Category::create([
            'name' => 'News',
            'slug' => 'news',
        ]);

        \App\Models\Category::create([
            'name' => 'Tech',
            'slug' => 'tech',
        ]);

        \App\Models\Category::create([
            'name' => 'Music',
            'slug' => 'music',
        ]);

        \App\Models\Category::create([
            'name' => 'Sports',
            'slug' => 'sports',
        ]);

        \App\Models\Category::create([
            'name' => 'Gaming',
            'slug' => 'gaming',
        ]);

        // -------------------- p o s t s --------------------- //

        \App\Models\Post::create([
            'user_id' => '4',
            'category_id' => '1',
            'url' => '',
            'title' => 'i love reddit !!',
            'content' => 'content of the first post, this is supposed to be fetch directly from the API',
            'picture' => 'https://bit.ly/3AgzGqZ',
            'votes' => '222',
        ]);

        \App\Models\Post::create([
            'user_id' => '2',
            'category_id' => '5',
            'url' => '',
            'title' => "ur thoughts on Travis Scott's gig in Fornite ???",
            'content' => 'content of the second post, this is supposed to be fetch directly from the API',
            'picture' => 'https://bit.ly/3jySjzN',
            'votes' => '352',
        ]);

        \App\Models\Post::create([
            'user_id' => '3',
            'category_id' => '4',
            'url' => '',
            'title' => "never got any better than this",
            'content' => 'content of the third post, this is supposed to be fetch directly from the API',
            'picture' => 'https://bit.ly/3fBVy8t',
            'votes' => '1998',
        ]);

        \App\Models\Post::create([
            'user_id' => '3',
            'category_id' => '2',
            'url' => '',
            'title' => "tech + art",
            'content' => 'Russian duo Kristina Karpysheva and Alexander Letsius are 404.zero, audio-visual creators whose debut album places them firmly amongst the best ambient producers currently working.',
            'picture' => 'https://bit.ly/3s38Dwc',
            'votes' => '100',
        ]);


        \App\Models\Post::create([
            'user_id' => '3',
            'category_id' => '3',
            'url' => '',
            'title' => "fav bass player in the world",
            'content' => 'Thundercat + Blood Orange for breakfast please',
            'picture' => 'https://bit.ly/2VDqPR4',
            'votes' => '756',
        ]);

        \App\Models\Post::create([
            'user_id' => '4',
            'category_id' => '5',
            'url' => '',
            'title' => "nothing beats red orchestra 2 !!!",
            'content' => 'content of the second post, this is supposed to be fetch directly from the API',
            'picture' => 'https://bit.ly/3CBrvaB',
            'votes' => '400',
        ]);

        // -------------------- c o m m e n t s --------------------- //

        \App\Models\Comment::create([
            'post_id' => '1',
            'users_id' => '3',
            'comment' => 'omg i love this so much !!!!',
            'votes' => '2',
        ]);

        \App\Models\Comment::create([
            'post_id' => '1',
            'users_id' => '2',
            'comment' => 'wow beautiful fantastic ',
            'votes' => '4',
        ]);

        \App\Models\Comment::create([
            'post_id' => '1',
            'users_id' => '1',
            'comment' => '<3 <3 <3 <3 <3 <3 <3 <3 <3 <3 ',
            'votes' => '9',
        ]);
    }
}