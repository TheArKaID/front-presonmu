<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $nama
 * @property string $gambar
 * @property string $status
 * @property string $kesan
 * @property string $created_at
 * @property string $updated_at
 */
class Kesan extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'kesan';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['nama', 'gambar', 'status', 'kesan', 'created_at', 'updated_at'];

}
