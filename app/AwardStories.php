<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $award_date
 * @property string $title
 * @property string $content
 * @property string $img
 * @property string $created_at
 * @property string $updated_at
 */
class AwardStories extends Model
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
    protected $fillable = ['award_date', 'title', 'content', 'img', 'created_at', 'updated_at'];

}
