<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Transacao extends Model
{
    use SoftDeletes;

     protected $table = 'transacoes';

    protected $fillable = [
        'user_id',
        'descricao',
        'valor',
        'cpf',
        'documento',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
