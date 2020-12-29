<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property int $deaths
 * @property int $injury
 * @property int $hospitalized
 * @property int $accidents_people
 * @property int $accidents_times
 * @property int $accidents_false
 * @property int $fines_times
 * @property int $fines_million
 * @property string $created_at
 * @property string $updated_at
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
    protected $fillable = ['deaths', 'injury', 'hospitalized', 'accidents_people', 'accidents_times', 'accidents_false', 'fines_times', 'fines_million', 'created_at', 'updated_at'];

}
