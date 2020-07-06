<?php

namespace App\Models\Admin;

use Eloquent as Model;

/**
 * Class ProductCategory
 * @package App\Models\Admin
 * @version July 6, 2020, 6:04 am UTC
 *
 * @property \App\Models\Admin\Marketplace $marketplacesid
 * @property \Illuminate\Database\Eloquent\Collection $productSubCategories
 * @property \Illuminate\Database\Eloquent\Collection $products
 * @property integer $MarketplacesID
 * @property string $Name
 */
class ProductCategory extends Model
{

    public $table = 'product_categories';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'MarketplacesID',
        'Name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'ID' => 'integer',
        'MarketplacesID' => 'integer',
        'Name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'MarketplacesID' => 'required',
        'Name' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function marketplacesid()
    {
        return $this->belongsTo(\App\Models\Admin\Marketplace::class, 'MarketplacesID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function productSubCategories()
    {
        return $this->hasMany(\App\Models\Admin\ProductSubCategory::class, 'ProductCategoryID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function products()
    {
        return $this->hasMany(\App\Models\Admin\Product::class, 'ProductCategoryID');
    }
}