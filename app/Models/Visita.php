<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visita extends Model
{
    use HasFactory;

    protected $table = 'visitas';

    protected $fillable = ['quantidade', 'mes', 'ano'];

    protected $with = ['detalhe'];

    public $timestamps = false;

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->id_cliente = auth()->user()->id_cliente;
        });
    }

    public static function all($columns = ['*'])
    {
        $usuario = auth()->user();

        $dados = self::whereHas('cliente', function ($query) use ($usuario) {
            $query->where('id_cliente', $usuario->id_cliente);
        })->get($columns);

        return $dados;
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'id_cliente', 'id');
    }

    public function detalhe()
    {
        return $this->hasOne(VisitaDetalhe::class, 'id_visita', 'id');
    }
}
