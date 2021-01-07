<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $title
 * @property string $type_id
 * @property string $imgs
 * @property string $owner
 * @property string $duration
 * @property string $award_date
 * @property string $start_date
 * @property string $price
 * @property string $scheduled_progress
 * @property string $actual_progress
 * @property string $content
 * @property int $sort
 * @property int $view_times
 * @property string $created_at
 * @property string $updated_at
 */
class Constructions extends Model
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
    protected $fillable = ['title', 'type_id', 'imgs', 'owner', 'duration', 'award_date', 'start_date', 'price', 'scheduled_progress', 'actual_progress', 'content', 'sort', 'view_times', 'created_at', 'updated_at'];

}
