<?php

namespace Database\Factories;

use App\Models\Candidate;
use Illuminate\Database\Eloquent\Factories\Factory;

class CandidateFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Candidate::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
                 'name'      => $this->faker->word,
                 'experience'    => $this->faker->numberBetween(1,10),
                 'age'     => $this->faker->numberBetween(22,35),
             ];

    }
}
