<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fornecedor extends Model
{
    use SoftDeletes; // incorpora por meio de Trait
    protected $table = 'fornecedores';
    protected $fillable = [
        'nome', 'site', 'uf', 'email'
    ];

    // relacionamento 1 (fornecedor) -> N (produtos)
    public function produtos()
    {
        return $this->hasMany(Item::class, 'fornecedor_id', 'id');
    }
}
