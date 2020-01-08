<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\Models\Outros\Livro;

class LivrosTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function a_user_can_read_all_the_tasks()
    {
        // Given we have task in the database
        //$livro = factory('App\Models\Outros\Livro')->create();
        $livro = Livro::find(1);

        // When user visit the tasks page
        $response = $this->get('api/livros');

        // He should be able to read the task
        $response->assertSee($livro->nome);
    }
}
