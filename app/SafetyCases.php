<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $file
 * @property string $name
 * @property int $sort
 * @property string $created_at
 * @property string $updated_at
 */
class SafetyCases extends Model
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
    protected $fillable = ['file', 'name', 'sort', 'created_at', 'updated_at'];

}
