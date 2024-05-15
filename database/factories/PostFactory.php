<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\PostCategory;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $title = fake()->sentence(10);
        return [
            Post::create([
                'title' => $title,
                'post_category_id' => PostCategory::all()->random()->id,
                'slug' => Str::slug($title),
                'description' => fake()->sentence(250),
                'meta_keyword' => fake()->sentence(2),
                'meta_description' => fake()->sentence(15),
                'visitor' => rand(1,1000),
                'status' => rand(0,1),
                'user_id' => User::all()->random()->id
            ])
        ];
    }
}
