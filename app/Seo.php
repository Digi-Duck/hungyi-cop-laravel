<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $title
 * @property string $keyword
 * @property string $description
 * @property string $created_at
 * @property string $updated_at
 */
class Seo extends Model
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
    protected $fillable = ['title', 'keyword', 'description', 'created_at', 'updated_at'];

}
