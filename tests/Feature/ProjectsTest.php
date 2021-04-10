<?php

namespace Tests\Feature;


use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProjectsTest extends TestCase
{

    use WithFaker, RefreshDatabase;

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
    public function a_user_can_view_a_project()
    {
        $this->withoutExceptionHandling();
        $project = factory('App\Project')->create();

        $this->get($project->path())
            ->assertSee($project->title)
            ->assertSee($project->description);

    }

    /** @test */
    function a_project_requires_a_title()
    {
        $attributes = factory('App\Project')->raw([ 'title' => '', ]);
        $this->post('/projects', $attributes)->assertSessionHasErrors('title');
    }

    /** @test */
    function a_project_requires_a_description()
    {
        $attributes = factory('App\Project')->raw([ 'description' => '', ]);
        $this->post('/projects', $attributes)->assertSessionHasErrors('description');
    }

    /** @test */
    public function a_project_requires_an_owner()
    {

        $attributes = factory('App\Project')->raw([ 'owner_id' => null ] );
        $this->post('/projects', $attributes)->assertSessionHasErrors('owner_id');
    }

}
