<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AssetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama' => $this->faker->word(),
            'slug' => $this->faker->slug(),
            'merek' => $this->faker->word(),
            'jumlah' => mt_rand(1,50),
            'tahun' => $this->faker->year('+10 years'),
            'garansi' => mt_rand(1,5),
            'gambar_qr' => $this->faker->word(),
            'harga' => mt_rand(5,10),
            'category_id' => mt_rand(1,5),
            'room_id' => mt_rand(1,10)
        ];
    }
}
