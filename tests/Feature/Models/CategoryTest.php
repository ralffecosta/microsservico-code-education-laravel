<?php

namespace Tests\Feature\Models;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Database\Eloquent\Factories\Factory;
use Tests\TestCase;
use App\Models\Category;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Str;

class CategoryTest extends TestCase
{
    use DatabaseMigrations;
    
    
    public function test_uuid()
    {
        $category = Category::factory(1)->create()->first();
        //Verifica se id é Uuid
        $this->assertTrue(Str::isUuid($category->id));
    }

    //Teste listagem de dados
    public function test_list()
    {
        //Populando o banco de dados de teste
        Category::factory(1)->create();

        //Listando dados
        $categories = Category::all();
        $this->assertCount(1, $categories);
        $categoryKeys = array_keys($categories->first()->getAttributes());
        $this->assertEqualsCanonicalizing(
            [
                'id',
                'name',
                'description',
                'is_active',
                'created_at',
                'updated_at',
                'deleted_at'
            ]
            ,$categoryKeys
            );
    }

    //Teste de criação 
    public function test_create(){
        $category = Category::create([
            'name' => 'test',
        ]);
        $category->refresh();

        $this->assertEquals('test', $category->name);
        $this->assertNull($category->description);
        $this->assertTrue($category->is_active);
        $this->assertTrue(Str::isUuid($category->id));
    }

    //Teste de Atualização
    public function test_update()
    {
        $category = Category::factory()->count(1)->make()->first();
        $data = $category;
       
        $data->name = 'name_test';

        $data->update();
       
       foreach($data as $key=>$value){
           $this->assertEquals($value, $category->{$key});
       }
    }

    //Teste de Exclusão
    public function test_delete()
    {
        $category = Category::factory(1)->create()->first();
        $category->delete();
        $this->assertSoftDeleted($category);


    }

}
