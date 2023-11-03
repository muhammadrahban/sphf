<?php

namespace App\Models;

use App\Models\Settings;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'order_number', 'tax', 'platform_fee', 'befor_charge', 'total_charge', 'total_item', 'status'
    ];

    public function addProductDetail(Product $productData, $quantity)
    {
        $beforechanges = $productData->fdp * $quantity;
        $this->productDetails()->create([
            'product_id' => $productData->id,
            'quantity' => $quantity,
            'price' => $beforechanges,
        ]);
    }

    public function productDetails()
    {
        return $this->hasMany(ProductDetail::class);
    }

    public function getTotalItems()
    {
        return $this->productDetails->sum('quantity');
    }

    public function getBeforeCharge()
    {
        return $this->productDetails->sum(function ($productDetail) {
            return $productDetail->quantity * $productDetail->price;
        });
    }

    public function getPlatformFee()
    {
        $platformfee = Settings::first('platform_fdp');
        return $platformfee ? $platformfee->platform_fdp : 20;
    }

    public function getTax()
    {
        return 0;
    }

    public function getTotalCharge()
    {
        return $this->getBeforeCharge() + $this->getPlatformFee() + $this->getTax();
    }
}
