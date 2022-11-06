<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property integer $id
 * @property integer $user_id
 * @property string $good_receipt_number
 * @property string $condition
 * @property string $created_at
 * @property string $updated_at
 * @property User $user
 * @property GoodReceiptDetail[] $goodReceiptDetails
 */
class GoodReceipt extends Model
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
    protected $fillable = ['user_id', 'good_receipt_number', 'sender', 'condition', 'created_at', 'updated_at','good_receipt_mutation_id'];

    public static function getForm()
    {
        return ['good_receipt_number', 'sender', 'condition'];
    }
    public static function getCode($created_at=null)
    {
        if ($created_at==null){
            $now = Carbon::parse($created_at);
        }else{
            $now=Carbon::now();
        }
        $count = GoodReceipt::whereMonth('created_at', $now->month)
                ->whereYear('created_at', $now->year)
                ->get()->count()+1;
        $date = $now->day;
        $month = numberToRomanRepresentation($now->month);
        $year = $now->year;
        return "$count/BTTB/$date.$month.$year";
    }

    public static function getRules()
    {
        return [
//            'data.good_receipt_number' => 'required',
            'data.sender' => 'required',
            'data.condition' => 'required'
        ];
    }
    public static function search($query)
    {
        return empty($query) ? static::query()
            : static::where('name', 'like', '%' . $query . '%')
                ->orWhere('no_ktp', 'like', '%' . $query . '%')
                ->orWhere('address', 'like', '%' . $query . '%')
                ->orWhere('no_phone', 'like', '%' . $query . '%');
    }

    /**
     * @return BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    /**
     * @return HasMany
     */
    public function goodReceiptDetails()
    {
        return $this->hasMany('App\Models\GoodReceiptDetail');
    }
    public function goodReceiptMutation(){
        return $this->belongsTo('App\Models\GoodReceiptMutation');
    }
}
