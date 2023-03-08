<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property integer $id
 * @property integer $user_id
 * @property integer $invoice_status_id
 * @property string $invoice_number
 * @property string $account_number
 * @property string $company
 * @property string $note
 * @property string $created_at
 * @property string $updated_at
 * @property InvoiceStatus $invoiceStatus
 * @property User $user
 * @property InvoiceDetail[] $invoiceDetails
 */
class Invoice extends Model
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
    protected $fillable = ['id','user_id', 'invoice_status_id','report_id', 'invoice_number', 'account_number', 'company','address', 'note', 'created_at', 'updated_at'];
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function report()
    {
        return $this->belongsTo('App\Models\Report');
    }

    public static function getForm()
    {
        return ['user_id', 'invoice_status_id', 'invoice_number', 'account_number', 'company','address', 'note',];
    }

    public static function search($query)
    {
        return empty($query) ? static::query()
            : static::where('company', 'like', '%' . $query . '%')
                ->orWhere('invoice_number', 'like', '%' . $query . '%')
                ->orWhere('account_number', 'like', '%' . $query . '%')
                ->orWhere('note', 'like', '%' . $query . '%')
                ->orWhereHas('user', function ($q) use ($query) {
                    $q->where('name', 'like', '%' . $query . '%');
                })
                ->orWhereHas('invoiceStatus', function ($q) use ($query) {
                    $q->where('title', 'like', '%' . $query . '%');
                });
    }

    public static function getCode($created_at=null)
    {
        if ($created_at==null){
            $now = Carbon::parse($created_at);
        }else{
            $now=Carbon::now();
        }
        $count = Invoice::whereMonth('created_at', $now->month)
                ->whereYear('created_at', $now->year)
                ->get()->count()+1;
        $date = $now->day;
        $month = numberToRomanRepresentation($now->month);
        $year = $now->year;
        return "$count/INV/$date.$month.$year";
    }

    public static function getRules()
    {
        return [
            'data.user_id' => "required",
            'data.invoice_status_id' => "required",
            'data.invoice_number' => "required|max:255",
            'data.account_number' => "required|max:255",
            'data.company' => "required|max:255",
            'data.note' => "required",
        ];
    }

    /**
     * @return BelongsTo
     */
    public function invoiceStatus()
    {
        return $this->belongsTo('App\Models\InvoiceStatus');
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
    public function invoiceDetails()
    {
        return $this->hasMany('App\Models\InvoiceDetail');
    }
}
