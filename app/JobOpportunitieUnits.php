<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $unit
 * @property int $sort
 * @property string $created_at
 * @property string $updated_at
 */
class JobOpportunitieUnits extends Model
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
    protected $fillable = ['unit', 'sort', 'created_at', 'updated_at'];

}
