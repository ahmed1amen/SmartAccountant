<?php

namespace App\Http\Controllers\Admin;
use App\Http\Requests\CreateSupplierInvoiceRequest;
use App\Http\Requests\UpdateSupplierInvoiceRequest;
use App\Repositories\{
    SupplierInvoiceRepository,
    Admin\SupplierRepository
};
use App\Http\Controllers\AppBaseController;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;
use Response;

class SupplierInvoiceController extends AppBaseController
{
    /** @var  SupplierInvoiceRepository */
    private $supplierInvoiceRepository;

    /** @var  SupplierInvoiceRepository */
    private $supplierRepository;

    public function __construct(SupplierInvoiceRepository $supplierInvoiceRepo, SupplierRepository $supplierRepo)
    {
        $this->supplierInvoiceRepository = $supplierInvoiceRepo;
        $this->supplierRepository = $supplierRepo;
    }

    /**
     * Display a listing of the SupplierInvoice.
     *
     * @param Request $request
     *
     * @return Factory|View
     */
    public function index(Request $request)
    {
        $supplierInvoices = $this->supplierInvoiceRepository->all();
        return view('admin.suppliers.invoice.index')
            ->with('supplierInvoices', $supplierInvoices);
    }

    /**
     * Show the form for creating a new SupplierInvoice.
     *
     * @return Factory|View
     */
    public function create()
    {
        $suppliers = $this->supplierInvoiceRepository->GetDataForSelect('suppliers', 'MarketplaceOwnerID');
        $payment_types = $this->supplierInvoiceRepository->GetDataForSelect('payment_types');
        return view('admin.suppliers.invoice.create', compact('suppliers', 'payment_types'));
    }

    /**
     * Store a newly created SupplierInvoice in storage.
     *
     * @param CreateSupplierInvoiceRequest $request
     *
     * @return RedirectResponse|Redirector
     */
    public function store(Request $request)
    {
        $marketplaceOwnerID = $this->supplierInvoiceRepository->GetMyOwner();
        $request->request->add([
            'MarketplaceOwnerID' => $marketplaceOwnerID
        ]);
        $input = $request->all();
        $supplierInvoice = $this->supplierInvoiceRepository->create($input);
        Flash::success(__('messages.saved', ['model' => __('Models/SupplierInvoices.CraeteNewSupplierInvoice')]));
        return redirect(route('admin.supplier-invoice.index'));
    }

    /**
     * Display the specified SupplierInvoice.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $invoice = $this->supplierInvoiceRepository->find($id);
        return view('admin.suppliers.invoice.show', compact('invoice'));
    }

    public function edit($id)
    {
        $suppliers = $this->supplierInvoiceRepository->GetDataForSelect('suppliers', 'MarketplaceOwnerID');
        $payment_types = $this->supplierInvoiceRepository->GetDataForSelect('payment_types');
        $invoice = $this->supplierInvoiceRepository->find($id);
        return view('admin.suppliers.invoice.edit', compact('invoice', 'suppliers', 'payment_types'));

    }

    public function update(Request $request, int $id)
    {
        $supplierInvoice = $this->supplierInvoiceRepository->find($id);

        if(empty($supplierInvoice)) {
            Flash::error(__('messages.not_found', ['model' => __('models/suppliers.singular')]));
            return redirect(route('admin.suppliers.index'));
        }

        $supplierInvoice = $this->supplierInvoiceRepository->update($request->all(), $id);

        Flash::success(__('messages.saved', ['model' => __('Models/SupplierInvoices.CraeteNewSupplierInvoice')]));
        
        return redirect(route('admin.supplier-invoice.index'));
    }

    /**
     * Remove the specified SupplierInvoice from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $supplierInvoice = $this->supplierInvoiceRepository->find($id);

        if (empty($supplierInvoice)) {
            Flash::error(__('messages.not_found', ['model' => __('models/supplierInvoices.singular')]));

            return redirect(route('supplierInvoices.index'));
        }

        $this->supplierInvoiceRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/supplierInvoices.singular')]));

        return redirect(route('admin.supplier-invoice.index'));
    }
}
