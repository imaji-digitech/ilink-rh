<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property integer $id
 * @property integer $travel_permit_id
 * @property string title
 * @property int $quantity
 * @property string $quantity_type
 * @property string $note
 * @property string $created_at
 * @property string $updated_at
 * @property MaterialType $materialType
 * @property TravelPermit $travelPermit
 */
class TravelPermitDetail extends Model
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
    protected $fillable = ['travel_permit_id','material_id', 'title', 'quantity', 'quantity_type', 'note', 'created_at', 'updated_at'];

    public static function getForm()
    {
        return ['title', 'quantity','quantity_type', 'note'];
    }

    public static function getRules()
    {
        return [
            'data.title' => "required|max:255",
            'data.quantity' => "required",
            'data.quantity_type' => "required|max:255",
        ];
    }


    /**
     * @return BelongsTo
     */
    public function travelPermit()
    {
        return $this->belongsTo('App\Models\TravelPermit');
    }
    public function material()
    {
        return $this->belongsTo('App\Models\Material');
    }
}
