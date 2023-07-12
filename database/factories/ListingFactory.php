<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Listing>
 */
class ListingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title'=>$this->faker->sentence(),
            'tags'=>'PHP, Laravel, Vue',
            'company'=>$this->faker->company(),
            'location'=>$this->faker->city(),
            'email'=>$this->faker->email(),
            'website'=>$this->faker->domainName(),
            'description'=>$this->faker->paragraph(),
        ];
    }
}
