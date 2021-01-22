<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $orange_text
 * @property string $blue_text
 * @property string $created_at
 * @property string $updated_at
 * @property int $sort
 */
class SecurityPolities extends Model
{
    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['orange_text', 'blue_text', 'created_at', 'updated_at', 'sort'];

}
