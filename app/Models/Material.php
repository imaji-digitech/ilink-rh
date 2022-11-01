<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property integer $id
 * @property integer $material_type_id
 * @property string $name
 * @property string $stock
 * @property string $note
 * @property string $created_at
 * @property string $updated_at
 * @property MaterialType $materialType
 */
class Material extends Model
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
    protected $fillable = ['material_type_id', 'name', 'stock', 'note', 'created_at', 'updated_at'];

    public static function search($query)
    {
        return empty($query) ? static::query()
            : static::where('name', 'like', '%' . $query . '%')
                ->orWhere('note', 'like', '%' . $query . '%')
                ->orWhereHas('materialType', function ($q) use ($query) {
                    $q->where('title', 'like', '%' . $query . '%');
                });
    }


    public static function getForm()
    {
        return ['material_type_id', 'name', 'note',];
    }

    public static function getRules()
    {
        return [
            'data.material_type_id' => "required",
            'data.name' => "required|max:255",
            'data.stock' => "required",
            'data.note' => "required",
        ];
    }

    /**
     * @return BelongsTo
     */
    public function materialType()
    {
        return $this->belongsTo('App\Models\MaterialType');
    }

    public function materialMutation(){
        return $this->hasMany('App\Models\MaterialMutation');
    }
}
