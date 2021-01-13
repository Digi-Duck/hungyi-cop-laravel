<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $title
 * @property string $account
 * @property string $password
 * @property string $url
 * @property string $cctv_title
 * @property string $assign_names
 * @property string $created_at
 * @property string $updated_at
 */
class Cctvs extends Model
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
    protected $fillable = ['title', 'account', 'password', 'url', 'cctv_title', 'assign_names', 'created_at', 'updated_at'];

    public function setAssignAttr($value)
    {
        $this->attributes['assign_names'] = json_encode($value);
    }

    public function getAssignAttr($value)
    {
        return $this->attributes['assign_names'] = json_decode($value);
    }

}
