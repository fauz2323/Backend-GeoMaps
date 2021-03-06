<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photos extends Model
{
    use HasFactory;

    protected $guarded= [];

    /**
     * Get the wisata that owns the Photos
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function wisatas()
    {
        return $this->belongsTo(Wisata::class,'wisata_id', 'id');
    }

}
