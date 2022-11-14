<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property integer $id
 * @property integer $material_id
 * @property integer $user_id
 * @property integer $mutation_status_id
 * @property integer $report_id
 * @property int $amount
 * @property string $note
 * @property string $created_at
 * @property string $updated_at
 * @property Material $material
 * @property MutationStatus $mutationStatus
 * @property Report $report
 * @property User $user
 */
class MaterialMutation extends Model
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
    protected $fillable = ['id','material_id', 'user_id', 'mutation_status_id', 'report_id', 'amount', 'note', 'created_at', 'updated_at'];
    public static function search($query)
    {
        return empty($query) ? static::query()
            : static::where('note', 'like', '%' . $query . '%')
                ->orWhereHas('user', function ($q) use ($query) {
                    $q->where('name', 'like', '%' . $query . '%');
                })
                ->orWhereHas('mutationStatus', function ($q) use ($query) {
                    $q->where('title', 'like', '%' . $query . '%');
                })
                ->orWhereHas('material', function ($q) use ($query) {
                    $q->where('name', 'like', '%' . $query . '%');
                });
    }

    public static function getForm()
    {
        return ['material_id', 'user_id', 'mutation_status_id', 'amount', 'note',];
    }

    public static function getRules()
    {
        return [
            'data.material_id' => "required",
            'data.user_id' => "required",
            'data.mutation_status_id' => "required",
            'data.amount' => "required|min:1",
        ];
    }

    /**
     * @return BelongsTo
     */
    public function material()
    {
        return $this->belongsTo('App\Models\Material');
    }

    /**
     * @return BelongsTo
     */
    public function mutationStatus()
    {
        return $this->belongsTo('App\Models\MutationStatus');
    }

    /**
     * @return BelongsTo
     */
    public function report()
    {
        return $this->belongsTo('App\Models\Report');
    }

    /**
     * @return BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
