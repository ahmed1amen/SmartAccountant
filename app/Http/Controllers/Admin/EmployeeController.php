<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\EmployeeDataTable;
use App\Http\Requests\Admin;
use App\Http\Requests\Admin\CreateEmployeeRequest;
use App\Http\Requests\Admin\UpdateEmployeeRequest;
use App\Models\Employee;
use App\Models\Marketplace;
use \App\Models\MarketplaceOwner;
use App\Repositories\EmployeeRepository;
use App\Repositories\UserRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Illuminate\Support\Facades\DB;
use Response;

class EmployeeController extends AppBaseController
{


    private $employeeRepository;
    /** @var  UserRepository */
    private $userRepository;


    public function __construct(EmployeeRepository $employeeRepo, UserRepository $userRepo)
    {
        $this->employeeRepository = $employeeRepo;
        $this->userRepository = $userRepo;
    }

    /**
     * Display a listing of the Employee.
     *
     * @param EmployeeDataTable $employeeDataTable
     * @return Response
     */
    public function index(EmployeeDataTable $employeeDataTable)
    {
        return $employeeDataTable->render('admin.employees.index');
    }

    /**
     * Show the form for creating a new Employee.
     *
     * @return Response
     */
    public function create()
    {
        $marketplaces = $this->employeeRepository->GetDataForSelect('marketplaces','MarketplaceOwnerID');

        return view('admin.employees.create')->with(['marketplaces'=>$marketplaces]);
    }

    /**aa
     * Store a newly created Employee in storage.
     *
     * @param CreateEmployeeRequest $request
     *
     * @return Response
     */
    public function store(CreateEmployeeRequest $request)
    {
        $input = $request->all();
        $user=  $this->userRepository->create($input);

        $input['UserID']   = $user->id;
        $input['ProfileImage'] = $this->employeeRepository->StoreFile($request->file('ProfileImage'),'');
        $input['IdentityImage'] = $this->employeeRepository->StoreFile($request->file('IdentityImage'),'');
        $input['EmploymentContractImage'] = $this->employeeRepository->StoreFile($request->file('EmploymentContractImage'),'');

        $employee = $this->employeeRepository->create($input);

        Flash::success('Employee saved successfully.');

        return redirect(route('admin.employees.index'));
    }

    /**
     * Display the specified Employee.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id )
    {
        $employee = $this->employeeRepository->find($id );

        if (empty($employee)) {
            Flash::error('Employee not found');

            return redirect(route('admin.employees.index'));
        }

        return view('admin.employees.show')->with('employee', $employee);
    }

    /**
     * Show the form for editing the specified Employee.
     *
     * @param  int $id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id )
    {
        $employee = $this->employeeRepository->find($id );

        if (empty($employee)) {
            Flash::error('Employee not found');

            return redirect(route('admin.employees.index'));
        }

        return view('admin.employees.edit')
            ->with(['employee'=> $employee ,
                'marketplaces' =>$this->employeeRepository->GetDataForSelect('marketplaces','MarketplaceOwnerID')]);
    }

    /**
     * Update the specified Employee in storage.
     *
     * @param  int              $id
     * @param UpdateEmployeeRequest $request
     *
     * @return Response
     */
    public function update($id , UpdateEmployeeRequest $request)
    {
        $employee = $this->employeeRepository->find($id );
        $input = $request->all();
        $input['ProfileImage'] = $this->employeeRepository
            ->StoreFile($request->file('ProfileImage'),$employee['ProfileImage']== null?'':$employee['ProfileImage']);
        $input['IdentityImage'] = $this->employeeRepository
            ->StoreFile($request->file('IdentityImage'),$employee['IdentityImage']== null?'':$employee['IdentityImage']);
        $input['EmploymentContractImage'] = $this->employeeRepository
            ->StoreFile($request->file('EmploymentContractImage'),$employee['EmploymentContractImage']== null?'':$employee['EmploymentContractImage']);
        if (empty($employee)) {
            Flash::error('Employee not found');

            return redirect(route('admin.employees.index'));
        }

        $employee = $this->employeeRepository->update($input, $id );

        Flash::success('Employee updated successfully.');

        return redirect(route('admin.employees.index'));
    }

    /**
     * Remove the specified Employee from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id )
    {
        $employee = $this->employeeRepository->find($id );

        if (empty($employee)) {
            Flash::error('Employee not found');

            return redirect(route('admin.employees.index'));
        }

        $this->employeeRepository->delete($id );

        Flash::success('Employee deleted successfully.');

        return redirect(route('admin.employees.index'));
    }
    public function salaryInfos(Employee $employee){
        $infos = $employee->employeeSalaryInfos;
        return view('admin.employee_salary_infos.index',compact('infos','employee'));
    }

}
