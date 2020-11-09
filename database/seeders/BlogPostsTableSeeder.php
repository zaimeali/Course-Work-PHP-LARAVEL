<?php

namespace Database\Seeders;

use App\Models\BlogPost;
use App\Models\User;
use Illuminate\Database\Seeder;

class BlogPostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();

        if (empty($users)) { // or can use count() helper function like $users->count() > 0
            $this->command->info('No blog post will be created because there is no user available');
            return;
        }

        $postsCount = max((int) $this->command->ask('How many posts you would like?', 50), 0);
        BlogPost::factory($postsCount)->make()->each(function ($post) use ($users) {
            $post->user_id = $users->random()->id;
            $post->save();
        });
    }
}
