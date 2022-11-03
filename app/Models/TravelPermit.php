<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property integer $id
 * @property integer $user_id
 * @property integer $driver_id
 * @property string $name
 * @property string $company
 * @property string $no_phone
 * @property string $address
 * @property string $vehicle
 * @property string $vehicle_number
 * @property string $created_at
 * @property string $updated_at
 * @property Driver $driver
 * @property User $user
 * @property TravelPermitDetail[] $travelPermitDetails
 */
class TravelPermit extends Model
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
    protected $fillable = ['user_id', 'report_id', 'travel_permit_number', 'name', 'company', 'no_phone', 'address', 'vehicle', 'vehicle_number', 'created_at', 'updated_at'];

    public static function getForm()
    {
        return ['created_at', 'name', 'company', 'no_phone', 'address', 'vehicle', 'vehicle_number',];
    }

    public static function getRules()
    {
        return [
//            'data.diver_id' => "required",
            'data.name' => "max:255",
            'data.company' => "max:255",
            'data.no_phone' => "required|max:255",
            'data.address' => "required",
            'data.vehicle' => "required|max:255",
            'data.vehicle_number' => "required|max:255",
        ];
    }

    public static function search($query)
    {
        return empty($query) ? static::query()
            : static::where('name', 'like', '%' . $query . '%')
                ->orWhere('no_phone', 'like', '%' . $query . '%')
                ->orWhere('company', 'like', '%' . $query . '%')
                ->orWhere('vehicle', 'like', '%' . $query . '%')
                ->orWhere('vehicle_number', 'like', '%' . $query . '%')
                ->orWhere('address', 'like', '%' . $query . '%')
                ->orWhere('note', 'like', '%' . $query . '%')
                ->orWhereHas('user', function ($q) use ($query) {
                    $q->where('name', 'like', '%' . $query . '%');
                })
                ->orWhereHas('driver', function ($q) use ($query) {
                    $q->where('name', 'like', '%' . $query . '%');
                });
    }

    public static function getCode($created_at=null)
    {
        if ($created_at==null){
            $now = Carbon::parse($created_at);
        }else{
            $now=Carbon::now();
        }
        $count = TravelPermit::whereMonth('created_at', $now->month)
            ->whereYear('created_at', $now->year)
            ->get()->count()+1;
        $date = $now->day;
        $month = numberToRomanRepresentation($now->month);
        $year = $now->year;
        return "$count/SJ.RH/$date.$month.$year";
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
    public function driver()
    {
        return $this->belongsTo('App\Models\Driver');
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
    public function travelPermitDetails()
    {
        return $this->hasMany('App\Models\TravelPermitDetail');
    }
}
