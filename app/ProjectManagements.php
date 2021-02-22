<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $created_at
 * @property string $updated_at
 * @property string $name
 * @property string $target
 * @property string $approved_date
 * @property string $start_date
 * @property string $finished_date
 * @property string $director
 * @property string $remark
 * @property string $creator
 * @property string $img
 * @property string $assign_names
 */
class ProjectManagements extends Model
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
    protected $fillable = ['created_at', 'updated_at', 'name', 'target', 'approved_date', 'start_date', 'finished_date', 'director', 'remark', 'creator', 'img', 'assign_names'];

}
