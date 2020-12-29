<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $url
 * @property string $name
 * @property int $sort
 * @property string $created_at
 * @property string $updated_at
 */
class SafetyLinks extends Model
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
    protected $fillable = ['url', 'name', 'sort', 'created_at', 'updated_at'];

}
