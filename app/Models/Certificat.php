<?php

namespace App\Models;

use App\Traits\CertificatTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificat extends Model
{
    use HasFactory, CertificatTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'certificat';
    protected $fillable = [
        'projectName',
        'type',
        'plateform',
        'description',
        'startDate',
        'endDate',
        'createdBy',
        'email_id',
    ];

    public function email()
    {
        return $this->belongsTo(Email::class);
    }
}
