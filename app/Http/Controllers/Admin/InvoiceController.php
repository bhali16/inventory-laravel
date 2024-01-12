<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyInvoiceRequest;
use App\Http\Requests\StoreInvoiceRequest;
use App\Http\Requests\UpdateInvoiceRequest;
use App\Models\Invoice;
use App\Models\InvoiceItem;
use App\Models\Product;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class InvoiceController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('invoice_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $invoices = Invoice::all();

        return view('admin.invoices.index', compact('invoices'));
    }

    public function create()
    {
        abort_if(Gate::denies('invoice_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $products = Product::select('id', 'product_name', 'product_code','product_price')->get();

        return view('admin.invoices.create', compact('products'));
    }

    public function store(StoreInvoiceRequest $request)
    {
//        $invoice = Invoice::create($request->all());
        $order_data = $request->except('product');
        $products = $request->only('product')['product'];

        $order = Invoice::create($order_data);
        $order_id = $order->id;
        foreach($products as $key=>&$product){
            $product['invoice_id'] = $order_id;
        }
        InvoiceItem::insert($products);


        return redirect()->route('admin.invoices.index');
    }

    public function edit(Invoice $invoice)
    {
        abort_if(Gate::denies('invoice_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.invoices.edit', compact('invoice'));
    }

    public function update(UpdateInvoiceRequest $request, Invoice $invoice)
    {
        $invoice->update($request->all());

        return redirect()->route('admin.invoices.index');
    }

    public function show(Invoice $invoice)
    {
        abort_if(Gate::denies('invoice_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.invoices.show', compact('invoice'));
    }

    public function destroy(Invoice $invoice)
    {
        abort_if(Gate::denies('invoice_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $invoice->delete();

        return back();
    }

    public function massDestroy(MassDestroyInvoiceRequest $request)
    {
        $invoices = Invoice::find(request('ids'));

        foreach ($invoices as $invoice) {
            $invoice->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }


    public function invoice($id)
    {
//        abort_if(Gate::denies('order_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $invoice = Invoice::find($id);
        $products = Product::select('id', 'product_code','product_price')->get();

        $invoice->load('products');

        foreach($invoice->products as &$product){
            $pd = Product::select('id','product_code')->where('id',$product->product_id)->first();
            $product->name = $pd->product_code;
        }

        return view('admin.invoices.invoice', compact('invoice', 'products'));
    }
}
