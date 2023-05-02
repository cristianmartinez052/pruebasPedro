<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Article extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'descripcion', 'estado', 'stock'];

    public function pedido()
    {
        return $this->belongsTo(Pedido::class);
    }

    //Funcion para añadir más stock
    public function añadirStock($cantidad){
        $this->increment('stock',$cantidad);
        $this->update([
            'stock'=>DB::raw("stock + $cantidad"),
        ]);
    }

    //Al stock actual le restamos el stock que recibimos por el request
    public function restarStock($cantidad){
        $this->decrement('stock', $cantidad);
        $this->update([
            'stock'=>DB::raw("stock - $cantidad"),
        ]);
    }


}
