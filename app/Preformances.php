<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $title
 * @property string $preformances_date
 * @property string $type_id
 * @property string $location
 * @property string $funds
 * @property string $imgs
 * @property string $content
 * @property int $sort
 * @property int $view_times
 * @property string $created_at
 * @property string $updated_at
 */
class Preformances extends Model
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
    protected $fillable = ['title', 'preformances_date', 'type_id', 'location', 'funds', 'imgs', 'content', 'sort', 'view_times', 'created_at', 'updated_at'];

}
