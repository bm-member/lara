<?php

use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1; $i<=50; $i++) {
                    $post = new App\Post();
                    $post->title = Str::random(10);
                    $post->content = Str::random(100);
                    $post->user_id = rand(1,3);
                    $post->save();
                }
    }
}
