<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_riwayat
 * @property string $email
 * @property string $tanggal
 * @property string $jam
 * @property string $shift
 * @property string $latlng
 */
class Riwayat extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'riwayat';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id_riwayat';

    /**
     * @var array
     */
    protected $fillable = ['email', 'tanggal', 'jam', 'shift', 'latlng'];

}
