<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Po extends Model
{
    use HasFactory;
    protected $table = 'pos';
    protected $fillable = [
        'po',
        'requested_by',
        'aprouved_by',
        'company',
        'fournisseur',
        'date',
        'invoice_no',
        'invoice_image'
    ];
}
