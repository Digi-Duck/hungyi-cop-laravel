<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $title
 * @property string $subtitle
 * @property string $content
 * @property string $created_at
 * @property string $updated_at
 * @property int $sort
 */
class TechnologyZones extends Model
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
    protected $fillable = ['title', 'subtitle', 'content', 'created_at', 'updated_at', 'sort'];

    public function blocks()
    {
        return $this->hasMany('App\TechnologyBlocks', 'zones_id', 'id')->with('details')->orderBy('sort', 'asc');
    }

}
