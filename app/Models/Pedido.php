<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    public function produtos()
    {
        /**
         * Parâmetros
         * 1 - Model do relacionamento NxN em relação ao Model que estamos implementando
         * 2 - Tabela auxiliar que armazena os registros de relacioamento
         * 3 - Nome da FK da tabela mapeada pelo model na tabela de relacionamento ('pedido_id')
         * 4 - Nome da FK da tabela mapeada pelo model utilizada no relacionamento ('produot_id')
         *
         * No caso de tabelas com nomes fora do padrão, é necessário passar todos os parâmetros a fim de que o eloquent
         * encontre os campos que identificam o relacionamento, por exemplo:
         * return $this->belongsToMany(Produto::class, 'pedidos_produtos', 'pedido_id', 'produto_id');
         */

        return $this->belongsToMany(Produto::class, 'pedido_produtos')
                ->withPivot('id', 'created_at'); // traz o campo especificado também
                                                   //(por padrão apenas as FKs do relacionamento são trazidas)
    }
}
