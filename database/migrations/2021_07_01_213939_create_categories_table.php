<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->uuid('id')->primary();
            
            //Campo Nome da Categoria
            $table->string('name', 100);
            
            //Campo Descrição da categoria e pode estar em branco
            $table->text('description')->nullable();
            
            //Campo verificacao de Ativo - por padrão ativo
            $table->boolean('is_active')->default(true);
            
            //Campo para exclusao logica
            $table->softDeletes();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
