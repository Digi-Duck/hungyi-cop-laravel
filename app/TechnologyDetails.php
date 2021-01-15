<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property int $zones_id
 * @property int $blocks_id
 * @property string $title
 * @property string $content
 * @property string $imgs
 * @property string $created_at
 * @property string $updated_at
 * @property int $sort
 */
class TechnologyDetails extends Model
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
    protected $fillable = ['zones_id', 'blocks_id', 'title', 'content', 'imgs', 'created_at', 'updated_at', 'sort'];

}
