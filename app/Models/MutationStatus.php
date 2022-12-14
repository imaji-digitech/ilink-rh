<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $title
 * @property int $indicator
 * @property string $created_at
 * @property string $updated_at
 * @property MaterialMutation[] $materialMutations
 */
class MutationStatus extends Model
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
    protected $fillable = ['title', 'indicator', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function materialMutations()
    {
        return $this->hasMany('App\Models\MaterialMutation');
    }
}
