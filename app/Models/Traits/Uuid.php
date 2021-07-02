<?php

namespace App\Models\Traits;

use Ramsey\Uuid\Uuid as RamseyUuid;


//Trait para gerar um ID com UUID

trait Uuid{

    //Utilizado para efetuar uma tarefa quando o model é chamado
    public static function boot(){
        parent::boot();
        //Quando for criar ->atribui um uuid versao 4 para o id      
        static::creating(function($obj){
            $obj->id = RamseyUuid::uuid4()->toString();
        });
    }
}