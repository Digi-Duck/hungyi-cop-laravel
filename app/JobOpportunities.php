<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $unit_id
 * @property string $position
 * @property int $sort
 * @property string $created_at
 * @property string $updated_at
 */
class JobOpportunities extends Model
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
    protected $fillable = ['unit_id', 'position', 'sort', 'created_at', 'updated_at'];

    public function repairsUnits()
    {
        return $this->belongsTo('App\repairsUnits', 'unit_id');
    }

}
