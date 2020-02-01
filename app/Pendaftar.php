<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $nama
 * @property string $email
 * @property string $telpon
 * @property string $jenis_kelamin
 * @property string $alasan
 * @property string $created_at
 * @property string $updated_at
 */
class Pendaftar extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'pendaftar';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['nama', 'email', 'telpon', 'jenis_kelamin', 'alasan'];

}
