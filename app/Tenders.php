<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $title
 * @property string $tender_date
 * @property string $imgs
 * @property string $content
 * @property int $sort
 * @property int $view_times
 * @property string $created_at
 * @property string $updated_at
 */
class Tenders extends Model
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
    protected $fillable = ['title', 'tender_date', 'imgs', 'content', 'sort', 'view_times', 'created_at', 'updated_at'];

}
