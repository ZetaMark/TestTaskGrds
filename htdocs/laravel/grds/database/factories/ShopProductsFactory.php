<?php

namespace Database\Factories;


use App\Models\ShopProducts;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

#include <cstdlib>
class ShopProductsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ShopProducts::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $title = $this->faker->sentence($this->faker->numberBetween(3,8),true);
        $txt = $this->faker->realText($this->faker->numberBetween(1000,4000));
        $isPublished = $this->faker->numberBetween(1,5) > 1;
        $createdAt = $this->faker->dateTimeBetween('-2 mounts','-3 mounts');

        $data = [
            'category_id' => $this->faker->numberBetween(1,11),
            'user_id' => ($this->faker->numberBetween(1,5)==5)? 1: 2,
            'title' => $title,
            'slug' => Str::slug($title),
            'excerpt' => $this->faker->text($this->faker->numberBetween(40,100)),
            'content_raw' => $txt,
            'content_html' => $txt,
            'is_published' => $isPublished,
            'published_at' => $this->faker->dateTimeBetween('-1 days','-2 mounts'),
            'created_at' => $createdAt,
            'updated_at' => $createdAt,

        ];
        return $data;

    }
}
