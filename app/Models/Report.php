<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $user_id
 * @property string $note
 * @property string $created_at
 * @property string $updated_at
 * @property User $user
 * @property Driver[] $drivers
 * @property Invoice[] $invoices
 * @property MaterialMutation[] $materialMutations
 * @property Receipt[] $receipts
 * @property TravelPermit[] $travelPermits
 */
class Report extends Model
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
    protected $fillable = ['id','user_id', 'note','data', 'created_at', 'updated_at'];
    public static function search($query)
    {
        return empty($query) ? static::query()
            : static::where('note', 'like', '%' . $query . '%')
                ->orWhereHas('user', function ($q) use ($query) {
                    $q->where('name', 'like', '%' . $query . '%');
                });
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
    public function drivers()
    {
        return $this->hasMany('App\Models\Driver');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function invoices()
    {
        return $this->hasMany('App\Models\Invoice');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function materialMutations()
    {
        return $this->hasMany('App\Models\MaterialMutation');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function receipts()
    {
        return $this->hasMany('App\Models\Receipt');
    }
    public function goodReceipts()
    {
        return $this->hasMany('App\Models\GoodReceipt');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function travelPermits()
    {
        return $this->hasMany('App\Models\TravelPermit');
    }
}
