<?php

namespace App\Models\Admin;

use Carbon\Carbon;
use Eloquent as Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Product
 * @package App\Models\Admin
 * @version July 6, 2020, 5:44 am UTC
 *
 * @property Marketplace $marketplacesid
 * @property ProductCategory $productcategoryid
 * @property ProductSubCategory $productsubcategoryid
 * @property QuantityType $quantitytypeid
 * @property User $userid
 * @property Collection $invoiceItems
 * @property integer $UserID
 * @property integer $MarketplacesID
 * @property integer $ProductCategoryID
 * @property integer $ProductSubCategoryID
 * @property string $Name
 * @property number $Quantity
 * @property integer $QuantityTypeID
 * @property number $PurchasingPrice
 * @property number $SellingPrice
 * @property number $LowPrice
 * @property string $Image
 * @property string|Carbon $ExpiryDate
 * @property string $Barcode
 * @property boolean $UnlimitedQuantity
 */
class Product extends Model
{

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'UserID' => 'required',
        'MarketplacesID' => 'required',
        'ProductCategoryID' => 'required',
        'Name' => 'required',
        'Quantity' => 'required',
        'QuantityTypeID' => 'required',
        'PurchasingPrice' => 'required',
        'SellingPrice' => 'required',
        'Image' => 'required',
        'Barcode' => 'required',
        'UnlimitedQuantity' => 'required'
    ];
    public $table = 'products';
    public $fillable = [
        'UserID',
        'MarketplacesID',
        'ProductCategoryID',
        'ProductSubCategoryID',
        'Name',
        'Quantity',
        'QuantityTypeID',
        'PurchasingPrice',
        'SellingPrice',
        'LowPrice',
        'Image',
        'ExpiryDate',
        'Barcode',
        'UnlimitedQuantity'
    ];
    protected $with = ['marketplace:id,name'];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'ID' => 'integer',
        'UserID' => 'integer',
        'MarketplacesID' => 'integer',
        'ProductCategoryID' => 'integer',
        'ProductSubCategoryID' => 'integer',
        'Name' => 'string',
        'Quantity' => 'float',
        'QuantityTypeID' => 'integer',
        'PurchasingPrice' => 'float',
        'SellingPrice' => 'float',
        'LowPrice' => 'float',
        'Image' => 'string',
        'ExpiryDate' => 'datetime',
        'Barcode' => 'string',
        'UnlimitedQuantity' => 'boolean'
    ];

    /**
     * @return BelongsTo
     **/
    public function Marketplace()
    {
        return $this->belongsTo(Marketplace::class, 'MarketplacesID');
    }

    /**
     * @return BelongsTo
     **/
    public function productcategoryid()
    {
        return $this->belongsTo(ProductCategory::class, 'ProductCategoryID');
    }

    /**
     * @return BelongsTo
     **/
    public function productsubcategoryid()
    {
        return $this->belongsTo(ProductSubCategory::class, 'ProductSubCategoryID');
    }

    /**
     * @return BelongsTo
     **/
    public function quantitytypeid()
    {
        return $this->belongsTo(QuantityType::class, 'QuantityTypeID');
    }

    /**
     * @return BelongsTo
     **/
    public function userid()
    {
        return $this->belongsTo(User::class, 'UserID');
    }

    /**
     * @return HasMany
     **/
    public function invoiceItems()
    {
        return $this->hasMany(InvoiceItem::class, 'ProductID');
    }
}
