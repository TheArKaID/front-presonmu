<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $judul1
 * @property string $icon1
 * @property string $deskripsi1
 * @property string $judul2
 * @property string $icon2
 * @property string $deskripsi2
 * @property string $judul3
 * @property string $icon3
 * @property string $deskripsi3
 * @property string $created_at
 * @property string $updated_at
 */
class Tentang extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'tentang';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['judul1', 'icon1', 'deskripsi1', 'judul2', 'icon2', 'deskripsi2', 'judul3', 'icon3', 'deskripsi3', 'created_at', 'updated_at'];

}
