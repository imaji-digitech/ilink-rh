<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property integer $id
 * @property integer $material_id
 * @property integer $good_receipt_id
 * @property float $volume
 * @property string $created_at
 * @property string $updated_at
 * @property GoodReceipt $goodReceipt
 * @property Material $material
 */
class GoodReceiptDetail extends Model
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
    protected $fillable = ['material_id', 'good_receipt_id', 'quantity','quantity_type','note', 'created_at', 'updated_at'];

    public static function getForm()
    {
        return ['material_id','quantity','quantity_type','note'];
    }
    public static function getRules(){
        return [
            'data.material_id'=>'required',
            'data.quantity'=>'required',
            'data.quantity_type'=>'required',
        ];
    }

    /**
     * @return BelongsTo
     */
    public function goodReceipt()
    {
        return $this->belongsTo('App\Models\GoodReceipt');
    }

    /**
     * @return BelongsTo
     */
    public function material()
    {
        return $this->belongsTo('App\Models\Material');
    }
}
