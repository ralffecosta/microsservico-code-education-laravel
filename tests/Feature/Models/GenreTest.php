<?php

namespace Tests\Feature\Models;

use App\Models\Genre;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Str;

class GenreTest extends TestCase
{
    use DatabaseMigrations;

    //Teste UUID
    public function test_uuid()
    {
        $genre = Genre::factory(1)->create()->first();
        $this->assertTrue(Str::isUuid($genre->id));
    }

    //Teste de Criação
    public function test_create()
    {
        $genre = Genre::factory(1)->create()->first()->getAttributes();
        $id = Genre::first()->id;
        //verifica se a tabela possui os dados criados
        $this->assertDatabaseHas('genres', $genre);
        //Verifica se uuid criado corretamente
        $this->assertTrue(Str::isUuid($id));
    }

    //Teste de Listagem
    public function test_list()
    {
        Genre::factory(1)->create();
        $genres = Genre::all();
        $this->assertCount(1, $genres);
        $genreKeys = array_keys($genres->first()->getAttributes());
        $this->assertEqualsCanonicalizing(
            [
                'id',
                'name',
                'is_active',
                'deleted_at',
                'created_at',
                'updated_at'
                
            ], $genreKeys
        );
    }

    //Teste de Atualização
    public function test_update()
    {
        $genre = Genre::factory(1)->create()->first();
        $newData = [
            'name' => 'Genero Atualizado'
        ]; 
        $genre->update($newData);
        foreach($newData as $key=>$value){
            $this->assertEquals($value, $genre->{$key});
        }
    }

    //Teste de Exclusão
    public function test_delete()
    {
        $genre = Genre::factory(1)->create()->first();
        $genre->delete();
        $this->assertSoftDeleted($genre);
    }

}
