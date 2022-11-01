<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $user_id
 * @property integer $receipt_type_id
 * @property string $name
 * @property string $no_phone
 * @property string $address
 * @property string $note
 * @property string $created_at
 * @property string $updated_at
 * @property ReceiptType $receiptType
 * @property User $user
 * @property ReceiptDetail[] $receiptDetails
 */
class Receipt extends Model
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
    protected $fillable = ['user_id','report_id','receipt_number','ref_number', 'company','name', 'no_phone', 'address', 'note', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function report()
    {
        return $this->belongsTo('App\Models\Report');
    }

    public static function search($query)
    {
        return empty($query) ? static::query()
            : static::where('name', 'like', '%' . $query . '%')
                ->orWhere('no_phone', 'like', '%' . $query . '%')
                ->orWhere('address', 'like', '%' . $query . '%')
                ->orWhere('note', 'like', '%' . $query . '%')
                ->orWhereHas('user', function ($q) use ($query) {
                    $q->where('name', 'like', '%' . $query . '%');
                })
                ->orWhereHas('receiptType', function ($q) use ($query) {
                    $q->where('title', 'like', '%' . $query . '%');
                });
    }

    public static function getForm()
    {
        return ['user_id', 'name','company','ref_number','receipt_number', 'no_phone', 'address', 'note',];
    }

    public static function getRules()
    {
        return [
            'data.user_id' => "required",
            'data.receipt_number' => "required",
        ];
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function receiptType()
    {
        return $this->belongsTo('App\Models\ReceiptType');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function receiptDetails()
    {
        return $this->hasMany('App\Models\ReceiptDetail');
    }

    public static function getCode($created_at=null)
    {
        if ($created_at==null){
            $now = Carbon::parse($created_at);
        }else{
            $now=Carbon::now();
        }
        $count = Receipt::whereMonth('created_at', $now->month)
                ->whereYear('created_at', $now->year)
                ->get()->count()+1;
        $date = $now->day;
        $month = numberToRomanRepresentation($now->month);
        $year = $now->year;
        return "$count/SJ.RH/$date.$month.$year";
    }
}
