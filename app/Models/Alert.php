<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alert extends Model
{
    use HasFactory;

    /**
     * The attributes tha are mass assignable.
     * 
     * @var array<int, string>
     */
    protected $table = 'alert';
    protected $fillable = [
        'dateAlert',
        'nameAlert',
        'certificat_id',
        'description',
    ];
}
