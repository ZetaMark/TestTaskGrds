<?php

namespace Database\Factories;

use App\Models\ShopOrders;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ShopOrdersFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ShopOrders::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->sentence($this->faker->numberBetween(3,8),true);
        $txt = $this->faker->realText($this->faker->numberBetween(1000,4000));
        $isOpen = $this->faker->numberBetween(1,5) > 1;
        $createdAt = $this->faker->dateTimeBetween('-2 mounts','-3 mounts');

        $data = [
            'user_id' => ($this->faker->numberBetween(1,5)==5)? 1: 2,
            'comment' => $txt,
            'amount' => $this->faker->numberBetween(0,500),
            'item_id' => ($this->faker->numberBetween(1,5)==5)? 1: 2,
            'order_is_open' => $isOpen,
            'created_at' => $createdAt,
            'updated_at' => $createdAt,];
        return $data;
    }
}
