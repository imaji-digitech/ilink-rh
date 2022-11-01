<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $receipt_id
 * @property string $title
 * @property int $price
 * @property string $quantity
 * @property string $quantity_type
 * @property string $note
 * @property string $created_at
 * @property string $updated_at
 * @property Receipt $receipt
 */
class ReceiptDetail extends Model
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
    protected $fillable = ['receipt_id', 'title', 'price', 'quantity', 'quantity_type', 'note', 'created_at', 'updated_at'];

    public static function getForm()
    {
        return [ 'title', 'price', 'quantity', 'quantity_type','note'];
    }

    public static function getRules()
    {
        return [
            'data.title' => "required|max:255",
            'data.price' => "required",
            'data.quantity' => "required",
            'data.quantity_type' => "required|max:255",

        ];
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function receipt()
    {
        return $this->belongsTo('App\Models\Receipt');
    }
}
