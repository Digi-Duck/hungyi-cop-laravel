<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $zone_title
 * @property string $url
 * @property string $name
 * @property int $sort
 * @property string $created_at
 * @property string $updated_at
 */
class SafetyZones extends Model
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
    protected $fillable = ['zone_title', 'url', 'name', 'sort', 'created_at', 'updated_at'];

}
