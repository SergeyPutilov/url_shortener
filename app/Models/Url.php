<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
    use HasUlids;

    protected $fillable = [
        'original_url',
        'shortened_url',
    ];
}
