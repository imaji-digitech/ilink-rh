<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $invoice_id
 * @property string $title
 * @property int $price
 * @property string $quantity
 * @property string $quantity_type
 * @property string $note
 * @property string $created_at
 * @property string $updated_at
 * @property Invoice $invoice
 */
class InvoiceDetail extends Model
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
    protected $fillable = ['invoice_id', 'title', 'price', 'quantity', 'quantity_type', 'note', 'created_at', 'updated_at'];


    public static function getForm()
    {
        return ['invoice_id', 'title', 'price', 'quantity', 'quantity_type', 'note'];
    }


    public static function getRules()
    {
        return [
            'data.invoice_id' => "required",
            'data.title' => "required|max:255",
            'data.price' => "required",
            'data.quantity' => "required",
            'data.quantity_type' => "required|max:255",
        ];
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function invoice()
    {
        return $this->belongsTo('App\Models\Invoice');
    }
}
