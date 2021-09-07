<?php

namespace Tests\Unit\Models;

use App\Models\Category;
use PHPUnit\Framework\TestCase;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Traits\Uuid;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoryTest extends TestCase
{

    private $category;

    protected function setUp(): void
    {
        parent::setUp();
        $this->category = new Category();
    }

    //verifica os campos preenchiveis
    public function test_fillable_attributes()
    {
        $fillable = ['name', 'description', 'is_active'];
        $this->assertEquals($fillable,$this->category->getFillable()); 
    }


    //Teste de datas
    public function test_dates_attributes()
    {
        $dates = ['created_at', 'updated_at', 'deleted_at'];
        foreach($dates as $date){
            $this->assertContains($date, $this->category->getDates());
        }
        $this->assertCount(count($dates), $this->category->getDates());
    }
    //Verifica o uso de Traits
   public function test_if_use_traits()
   {
        $traits = [HasFactory::class, SoftDeletes::class, Uuid::class];
        $categoryTraits = array_keys(class_uses(Category::class));
        $this->assertEquals($traits, $categoryTraits);        
   }

   //verifica se os casts sao dos tipos correspondentes
   function test_casts()
   {
       $casts = [
           'id'=> 'string', 
           'is_active'=>'boolean', 
           'deleted_at' => 'datetime'
        ];
       $this->assertEquals($casts, $this->category->getCasts());
   }

   //Verifica se auto incremento é falso
   public function test_incrementing()
   {
       $this->assertFalse($this->category->incrementing);
   }
}
