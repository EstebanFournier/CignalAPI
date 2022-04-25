<?php

/**
 * Model de la table Email
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'email';
    protected $fillable = [
        'name',
        'email',
        'user_id',
    ];

    /**
     * Retourne les certificats liés à l'email passé en paramètre.
     */
    public function certificats()
    {
        return $this->hasMany(Certificat::class);
    }
}
