<?php

namespace Tests\Unit\Models;

use App\Models\Genre;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Traits\Uuid;
use Illuminate\Database\Eloquent\SoftDeletes;
use PHPUnit\Framework\TestCase;

class GenreTest extends TestCase
{
    private $genre;

    protected function setUp(): void{
        parent::setUp();
        $this->genre = new Genre();
    }

    //Verifica campos preenchiveis
    public function test_fillable()
    {
        $fillable = ['name', 'is_active'];
        $this->assertEquals($fillable, $this->genre->getFillable());
    }

    //Teste de datas
    public function test_dates_attributes()
    {
        $dates = [ 'created_at', 'updated_at', 'deleted_at'];
        foreach($dates as $date){
            $this->assertContains($date, $this->genre->getDates());
        }
        $this->assertCount(count($dates), $this->genre->getDates());
    }

    //Verifica Traits
    public function test_if_use_traits(){
        $traits = [HasFactory::class, SoftDeletes::class, Uuid::class];
        $genreTraits = array_keys(class_uses(Genre::class));
        $this->assertEquals($traits, $genreTraits);
    }

    //Verifica os Casts
    public function test_casts(){
        $casts = [
            'id'=> 'string', 
            'is_active'=>'boolean', 
            'deleted_at' => 'datetime'
        ];
        $genre = new Genre();
        $this->assertEquals($casts,$genre->getCasts());

    }

    //Verifica Autoincremento
    public function test_incrementing()
    {
        $this->assertFalse($this->genre->incrementing);
    }
    
}
