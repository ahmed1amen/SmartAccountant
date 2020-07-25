<?php

namespace App\DataTables\Admin;

use App\Models\Product;
use Yajra\DataTables\DataTableAbstract;
use Yajra\DataTables\Html\Builder;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class ProductDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param  mixed  $query  Results from query() method.
     * @return DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);

        return $dataTable
            ->addColumn('Image', function ($data) {
                return '<img src="https://picsum.photos/100/100" alt="" width="50" class=" img-fluid">';
            })
            ->addColumn('action', 'admin.products.datatables_actions')
            ->rawColumns(['Image', 'action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param  \App\Models\Product  $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Product $model)
    {
        return $model->newQuery()->with( ['user:id,Name','productcategory:id,Name', 'productsubcategory:id,Name' ]);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction([ 'title'=>__('Buttons.Action'),'width' => '120px', 'printable' => false])
            ->parameters([
                'dom' => 'Bfrtip',
                'stateSave' => true,
                'order' => [[0, 'desc']],
                'buttons' => [
                    ['extend' => 'export', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'print', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'reset', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'reload', 'className' => 'btn btn-default btn-sm no-corner',],
                ],
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [

            new Column([ 'data' => 'id', 'name' => 'id', 'title' => '#' ]),
            new Column([ 'data' => 'productcategory.Name', 'name' => 'productcategory.Name', 'title' => __('Models/Product.ProductCategoryID') ]),
            new Column([ "defaultContent"=> "-", 'data' => 'productsubcategory.Name', 'name' => 'productsubcategory.Name', 'title' => __('Models/Product.ProductSubCategoryID') ]),
            new Column([ 'data' => 'Name', 'name' => 'Name', 'title' => __('Models/Product.Name')]), new Column(['data' => 'Quantity', 'name' => 'Quantity', 'title' => __('Models/Product.Quantity')]),
            new Column([ 'data' => 'PurchasingPrice' , 'name' => 'PurchasingPrice' , 'title' => __('Models/Product.PurchasingPrice') ]),
            new Column([ 'data' => 'SellingPrice', 'name' => 'SellingPrice', 'title' => __('Models/Product.SellingPrice') ]),
            new Column(['data' => 'LowPrice', 'name' => 'LowPrice', 'title' => __('Models/Product.LowPrice')]),
            new Column(['data' => 'Image', 'name' => 'Image', 'title' => __('Models/Product.Image')]),
            new Column(['data' => 'ExpiryDate', 'name' => 'ExpiryDate', 'title' => __('Models/Product.ExpiryDate')]),
            new Column(['data' => 'Barcode', 'name' => 'Barcode', 'title' => __('Models/Product.Barcode')]),
            new Column(['data' => 'ExcludeFromVAT', 'name' => 'ExcludeFromVAT', 'title' => __('Models/Product.ExcludeFromVAT')]),
            new Column([ 'data' => 'UnlimitedQuantity', 'name' => 'UnlimitedQuantity', 'title' => __('Models/Product.UnlimitedQuantity') ]),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'products_datatable_'.time();
    }
}


