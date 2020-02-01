<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $about
 * @property string $version
 * @property string $mulai
 * @property string $selesai
 */
class Informasi extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'informasi';

    /**
     * @var array
     */
    protected $fillable = ['about', 'version', 'mulai', 'selesai'];

}
