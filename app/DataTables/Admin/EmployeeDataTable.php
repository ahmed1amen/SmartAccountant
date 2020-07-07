<?php

namespace App\DataTables\Admin;

use App\Models\Admin\Employee;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class EmployeeDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);




        return $dataTable

            ->addColumn('ProfileImage', function($data) { return '<img src="https://picsum.photos/100/100" alt="" width="50" class=" img-fluid">';})
            ->addColumn('IdentityImage', function($data) { return '<img src="https://picsum.photos/100/100" alt="" width="50" class=" img-fluid">';})
            ->addColumn('EmploymentContractImage', function($data) { return '<img src="https://picsum.photos/100/100" alt="" width="50" class=" img-fluid">';})
            ->addColumn('action', 'admin.employees.datatables_actions')
            ->rawColumns(['ProfileImage','IdentityImage','EmploymentContractImage','action'])
            ->blacklist(['ProfileImage','IdentityImage','EmploymentContractImage']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Employee $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Employee $model)
    {

        return $model->newQuery()->with('user:id,Name');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '120px', 'printable' => false])
            ->parameters([
                'dom'       => 'Bfrtip',
                'stateSave' => true,
                'order'     => [[0, 'desc']],
                'buttons'   => [
                    ['extend' => 'create', 'className' => 'btn btn-default btn-sm no-corner',],
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

           new Column(['data'=>'user.Name', 'name'=>'user.Name' ,'title'=>__('Models/User.Name')]),
           new Column(['data'=>'marketplace.name', 'name'=>'marketplace.name','title'=>__('Models/Marketplace.Name')]),
           new Column(['data'=>'Nationality', 'name'=>'Nationality','title'=>__('Models/Employee.Nationality')]),
           new Column(['data'=>'JobTitle', 'name'=>'JobTitle','title'=>__('Models/Employee.JobTitle')]),
           new Column(['data'=>'NationalID', 'name'=>'NationalID','title'=>__('Models/Employee.NationalID')]),
           new Column(['data'=>'PhoneNumber', 'name'=>'PhoneNumber','title'=>__('Models/Employee.PhoneNumber')]),
           new Column(['data'=>'ProfileImage', 'name'=>'ProfileImage','title'=>__('Models/Employee.ProfileImage')]),
           new Column(['data'=>'IdentityImage', 'name'=>'IdentityImage','title'=>__('Models/Employee.IdentityImage')]),
           new Column(['data'=>'EmploymentContractImage', 'name'=>'EmploymentContractImage','title'=>__('Models/Employee.EmploymentContractImage')]),
           new Column(['data'=>'IBAN', 'name'=>'IBAN','title'=>__('Models/Employee.IBAN')]),
           new Column(['data'=>'Sex', 'name'=>'Sex','title'=>__('Models/Employee.Sex')]),
           new Column(['data'=>'Salary', 'name'=>'Salary','title'=>__('Models/Employee.Salary')]),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'employees_datatable_' . time();
    }
}
