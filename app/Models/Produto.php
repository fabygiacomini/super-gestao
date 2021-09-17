<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'descricao', 'peso', 'unidade_id'];

    /** Estabelece o relacionamento de 1 -> 1
     * 1 produto possui 1 produto detalhe
     * sendo produtos a tabela forte
     */
    public function produtoDetalhe()
    {
        return $this->hasOne(ProdutoDetalhe::class);
    }
}
