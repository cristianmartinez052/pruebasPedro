<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $fillable = ['producto', 'cantidad', 'sede'];


    public function article()
    {
        return  $this->hasMany(Article::class);
    }

    public function updateStock($id, $cantidad)
    {
        $articulos = new Article();
        $articulo = Article::find($id);
        $articulos->restarStock($cantidad);
    }
}
