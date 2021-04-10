<?php

namespace Tests\Feature;


use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProjectsTest extends TestCase
{

    use DatabaseMigrations,RefreshDatabase, WithFaker;

    /** @test */
    function a_user_can_create_a_project()
    {
        $this->withoutExceptionHandling();
        $attributes = [
            'title'       => $this->faker->sentence,
            'description' => $this->faker->paragraph,
        ];

        $this->post('/projects', $attributes)->assertRedirect('/projects');
    }

    /** @test */
    function a_project_requires_a_title()
    {
        $this->post('/projects',[])->assertSessionHasErrors('title');
    }
    /** @test */
    function a_project_requires_a_description()
    {
        $this->post('/projects',[])->assertSessionHasErrors('description');
    }

}
