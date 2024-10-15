<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contatos extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'numero',
        'email',
    ];

    public function getFiltrosPaginate(string $search = '') {
        $contato = $this->where(function ($query) use ($search){
            if ($search) {
                $query->where('nome', $search);
                $query->orWhere('nome', 'LIKE', "%{$search}%");
            }
        })->get();

        return $contato;
    }
}
