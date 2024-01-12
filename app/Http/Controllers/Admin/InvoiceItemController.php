<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyInvoiceItemRequest;
use App\Http\Requests\StoreInvoiceItemRequest;
use App\Http\Requests\UpdateInvoiceItemRequest;
use App\Models\Invoice;
use App\Models\InvoiceItem;
use App\Models\Product;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class InvoiceItemController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('invoice_item_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $invoiceItems = InvoiceItem::with(['product', 'invoice'])->get();

        return view('admin.invoiceItems.index', compact('invoiceItems'));
    }

    public function create()
    {
        abort_if(Gate::denies('invoice_item_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $products = Product::pluck('product_code', 'id')->prepend(trans('global.pleaseSelect'), '');

        $invoices = Invoice::pluck('order_no', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.invoiceItems.create', compact('invoices', 'products'));
    }

    public function store(StoreInvoiceItemRequest $request)
    {
        $invoiceItem = InvoiceItem::create($request->all());

        return redirect()->route('admin.invoice-items.index');
    }

    public function edit(InvoiceItem $invoiceItem)
    {
        abort_if(Gate::denies('invoice_item_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $invoiceItem->load('product', 'invoice');

        return view('admin.invoiceItems.edit', compact('invoiceItem'));
    }

    public function update(UpdateInvoiceItemRequest $request, InvoiceItem $invoiceItem)
    {
        $invoiceItem->update($request->all());

        return redirect()->route('admin.invoice-items.index');
    }

    public function show(InvoiceItem $invoiceItem)
    {
        abort_if(Gate::denies('invoice_item_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $invoiceItem->load('product', 'invoice');

        return view('admin.invoiceItems.show', compact('invoiceItem'));
    }

    public function destroy(InvoiceItem $invoiceItem)
    {
        abort_if(Gate::denies('invoice_item_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $invoiceItem->delete();

        return back();
    }

    public function massDestroy(MassDestroyInvoiceItemRequest $request)
    {
        $invoiceItems = InvoiceItem::find(request('ids'));

        foreach ($invoiceItems as $invoiceItem) {
            $invoiceItem->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
