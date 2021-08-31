<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{
    use HasFactory;

    // use SoftDeletes;

    protected $table = 'fornecedores';
    protected $fillable = ['nome', 'site', 'uf', 'email'];

    public function produtos () {
        return $this->hasMany('App\Models\Item', 'fornecedor_id', 'id'); // ou
        // return $this->hasMany('App\Models\Item'); 
    }
}
