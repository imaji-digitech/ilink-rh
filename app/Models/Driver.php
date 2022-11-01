<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property integer $id
 * @property string $name
 * @property string $no_ktp
 * @property string $address
 * @property string $no_phone
 * @property string $created_at
 * @property string $updated_at
 * @property TravelPermit[] $travelPermits
 */
class Driver extends Model
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
    protected $fillable = ['name', 'no_ktp', 'address', 'no_phone', 'created_at', 'updated_at'];

    public static function search($query)
    {
        return empty($query) ? static::query()
            : static::where('name', 'like', '%' . $query . '%')
                ->orWhere('no_ktp', 'like', '%' . $query . '%')
                ->orWhere('address', 'like', '%' . $query . '%')
                ->orWhere('no_phone', 'like', '%' . $query . '%');
    }

    public static function getForm()
    {
        return ['name', 'no_ktp', 'address', 'no_phone',];
    }

    public static function getRules()
    {
        return [
            'data.name' => "required|max:255",
            'data.no_ktp' => "required|max:255",
            'data.address' => "required|max:255",
            'data.no_phone' => "required|max:255",
        ];
    }


    /**
     * @return HasMany
     */
    public function travelPermits()
    {
        return $this->hasMany('App\Models\TravelPermit');
    }
}
