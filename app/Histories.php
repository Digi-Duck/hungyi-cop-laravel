<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property int $year
 * @property string $event
 * @property string $capital
 * @property string $address
 * @property string $engineering
 * @property string $img
 * @property string $created_at
 * @property string $updated_at
 */
class Histories extends Model
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
    protected $fillable = ['year', 'event', 'capital', 'address', 'engineering', 'img', 'created_at', 'updated_at'];

}
