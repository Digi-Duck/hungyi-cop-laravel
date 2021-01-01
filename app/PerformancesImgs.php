<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property int $performances_id
 * @property string $img
 * @property string $created_at
 * @property string $updated_at
 */
class PerformancesImgs extends Model
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
    protected $fillable = ['performances_id', 'img', 'created_at', 'updated_at'];
}
