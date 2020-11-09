<?php

namespace Database\Seeders;

use App\Models\BlogPost;
use App\Models\Comment;
use App\Models\User;
// use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('users')->insert([
        //     'name'  => 'John Doe',
        //     'email' => 'john@doe.com',
        //     'email_verified_at' => now(),
        //     'password'       => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        //     'remember_token' => Str::random(10),
        // ]);

        // state defined for default value
        $doe = User::factory()->newUser()->create();

        $else = User::factory(20)->create();

        // dd(get_class($doe), get_class($else));  // here $doe is just user object while $else is a collection
        $users = $else->concat([$doe]); // that's why concatenating $doe(by making array) in $else collection

        // dd($users->count()); // to count users

        $posts = BlogPost::factory()->count(50)->make()->each(function ($post) use ($users) {
            $post->user_id = $users->random()->id;
            $post->save();
        });

        $comments = Comment::factory()->count(150)->make()->each(function ($comment) use ($posts) {
            $comment->blog_post_id = $posts->random()->id;
            $comment->save();
        });
    }
}
