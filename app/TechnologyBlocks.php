<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property int $zones_id
 * @property string $title
 * @property int $style
 * @property string $created_at
 * @property string $updated_at
 * @property int $sort
 */
class TechnologyBlocks extends Model
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
    protected $fillable = ['zones_id', 'title', 'style', 'created_at', 'updated_at', 'sort'];

}
