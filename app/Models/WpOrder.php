<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WpOrder extends Model
{
    use HasFactory;

    protected $table = 'wp_orders';

    protected $fillable = [
        'wp_store_id',
        'order_id',
        'name',
        'phone',
        'region_code',
        'address',
        'grand_total',
        'auto_charges',
        'courier_charges',
        'status',
        'payment_status',
        'color',
        'size',
        'pincode',
        'advance_payment',
        'notes',
        'razorpay_order_id',
        'razorpay_payment_id',
        'dis_amt',
        
        'email_address',
        'unit_number',
        'city',
        'postal_code',
        'extra_notes',
        'upstairs_delivery',
        'delivery_start_date',
        'delivery_instructions',    
        
        'dropdown_settings_order',
        'shipping_tracking_id',
        'coupon_code',
        'gst_amt'
    ];
    

    const PENDING = 0;
    const DISPATCHED = 1;
    const DELIVERED = 2;
    const CANCELLED = 3;
    const CONFIRMED = 4;

    const STATUS_ARR = [
        self::PENDING => 'Pending',
        self::CONFIRMED => 'Confirmed',
        self::DISPATCHED => 'Dispatched',
        self::DELIVERED => 'Delivered',
        self::CANCELLED => 'Cancelled',
    ];

    public static $rules = [
        'wp_store_id' => 'required|exists:whatsapp_stores,id',
        'name' => 'required',
        'phone' => 'required|numeric',
        'region_code' => 'required',
        'address' => 'required',
        'grand_total' => 'required',
    ];

    public function wpStore()
    {
        return $this->belongsTo(WhatsappStore::class, 'wp_store_id');
    }

    public function products()
    {
        return $this->hasMany(WpOrderItem::class);
    }
}
