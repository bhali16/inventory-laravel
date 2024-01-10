<?php

namespace App\Models;

use App\Traits\Auditable;
use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Inovice extends Model
{
    use SoftDeletes, Auditable, HasFactory;

    public $table = 'inovices';

    protected $dates = [
        'invoice_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'order_no',
        'invoice_date',
        'delivery_method',
        'account',
        'job_name',
        'branch',
        'delivery_address',
        'delivery_phone',
        'billing_address',
        'billing_phone',
        'notes',
        'subtotal',
        'tax',
        'delivery_charges',
        'freight',
        'handling',
        'restocking',
        'other_charges',
        'total',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function getInvoiceDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setInvoiceDateAttribute($value)
    {
        $this->attributes['invoice_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function items_ordereds()
    {
        return $this->belongsToMany(Product::class);
    }
}
