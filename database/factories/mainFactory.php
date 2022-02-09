<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class mainFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            // menggunakan sentence agar membuat kata random 
            // menggunakan fungsi mt_rand untuk random paramenter pertama berisi minimal kata paramenter kedua berisi maksimal kata 
            'tittle' => $this->faker->sentence(mt_rand(2,8)),
            'slug' => $this->faker->slug(),
            'excerpt' => $this->faker->paragraph(),
            // 'body' => $this->faker->paragraphs(mt_rand(5,10)),
            'body' => collect($this->faker->paragraphs(mt_rand(5,10)))->map(fn ($p) => "<p>$p</p>")->implode(''),
            'category_id' => mt_rand(1,3),
            'user_id' => mt_rand(1,3)
        ];
    }
}
