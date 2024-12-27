<?php

namespace Database\Factories;

use App\Models\Author;
use App\Models\Language;
use App\Models\Topic;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $rand_user_id = User::whereNot('roles', 'guest')->get()->random()->id;
        $rand_author_id = Author::all()->random()->id;
        $rand_lang_id = Language::all()->random()->id;
        $rand_topic_id = Topic::all()->random()->id;

        return [
            'title' => fake()->words(2, true),
            'price' => fake()->numberBetween(100, 500),
            'user_id' => $rand_user_id,
            'author_id' => $rand_author_id,
            'language_id' => $rand_lang_id,
            'topic_id' => $rand_topic_id

        ];
    }
}
