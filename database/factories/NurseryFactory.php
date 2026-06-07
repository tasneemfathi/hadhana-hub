<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class NurseryFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name_en'      => $this->faker->company().' Nursery',
            'name_ar'      => 'حضانة '.$this->faker->firstName(),
            'city'         => $this->faker->randomElement(['Gaza', 'Khan Younis', 'Rafah', 'Deir al-Balah']),
            'district'     => $this->faker->streetName(),
            'description_en'=> $this->faker->sentence(12),
            'description_ar'=> 'بيئة آمنة ومحفزة لتنمية مهارات الطفل.',
            'age_min'      => 6,
            'age_max'      => 60,
            'capacity'     => $this->faker->numberBetween(20, 120),
            'rating'       => $this->faker->randomFloat(1, 3.5, 5),
            'phone'        => $this->faker->phoneNumber(),
            'email'        => $this->faker->companyEmail(),
            'image_url'    => null,
            'is_verified'  => $this->faker->boolean(70),
            'has_meals'    => $this->faker->boolean(),
            'has_transport'=> $this->faker->boolean(),
            'is_bilingual' => $this->faker->boolean(60),
        ];
    }
}
