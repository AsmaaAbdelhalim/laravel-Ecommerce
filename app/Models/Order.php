<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'contact_email',
        'ordered_at',
        'financial_status',
        'total_price',
        'total_price_usd',
        'subtotal_price',
        'total_tax',
        'taxes_included',
        'total_discounts',
        'total_line_items_price_set',
        'total_weight',
        'total_tip_received',
        //'billing_address',
        'currency',
        'country_code',
        'customer_locale',
        'closed_at',
        'confirmed',
        'discount_codes',
        'payment_gateway_names',
        'phone',
        'presentment_currency',
        'processed_at',
        'processing_method',
        'reference',
        'referring_site',
        'source_identifier',
        'source_name',
        'source_url',
        'tags',
        'line_item_id',
        'customer_id',
    ];

    public function line_item()
    {
        return $this->belongsTo(LineItem::class);
    }
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
