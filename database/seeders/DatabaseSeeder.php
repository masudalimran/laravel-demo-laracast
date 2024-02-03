<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Comments;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        function generateSeed(int $postCount = 10)
        {
            $userArr = ["Imon Shahriar", "Shakib Foisal", "Shajib Talukdar", "Shivani Banerjee", "Tarun Shikdar", "Elahi Akbar"];
            $categoryArr = ["Fast Foods", "Street Foods", "Masala Foods", "Curry Foods", "Spicy Foods", "Deserts", "Fried Foods"];

            // Generate Users
            $userObjArr = [];
            foreach ($userArr as $user) {
                $userObjArr[] = User::factory()->create(["name" => $user]);
            }

            // Generate categories
            $categoryObjArr = [];
            foreach ($categoryArr as $category) {
                $categoryObjArr[] = Category::factory()->create(["name" => $category]);
            }

            // Generating Posts
            $postsObjArr = [];
            for ($i = 0; $i < $postCount; $i++) {
                $postsObjArr[] = Post::factory()->create([
                    "user_id" => $userObjArr[mt_rand(0, count($userObjArr) - 1)]->id,
                    "category_id" => $categoryObjArr[mt_rand(0, count($categoryObjArr) - 1)]->id,
                ]);
            }

            // Generating Comments
            for ($j = 0; $j < 500; $j++) {
                Comments::factory()->create([
                    "post_id" => $postsObjArr[mt_rand(0, count($postsObjArr) - 1)]->id,
                    "user_id" => $userObjArr[mt_rand(0, count($userObjArr) - 1)]->id,
                ]);
            }

        }
        generateSeed(50);
    }
}
