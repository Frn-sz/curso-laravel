<?php

namespace Tests\Feature;

use App\Repositories\SeriesRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SeriesRepositoryTest extends TestCase
{
    /**
     * A basic feature test example.
     */

    use RefreshDatabase;

    public function test_when_a_series_is_created_its_seasons_and_episodes_must_also_be_created()
    {
        //Arrange
        $repository = $this->app->make(SeriesRepository::class);

        $series_data = [
            'name'=>'Nome da série',
            'seasons_qnt' => 1,
            'episodes_per_season'=>1,
            'cover'=>null
        ];


        //Act
        $repository->add($series_data);

        //Assert

        $this->assertDatabaseHas('series',$series_data);

        $this->assertDatabaseHas('seasons',['number'=>1]);

        $this->assertDatabaseHas('episodes',['number'=>1]);


    }
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
