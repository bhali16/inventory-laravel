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
        $products = Product::select('id', 'product_name', 'product_code', 'product_price')->get();

        return view('admin.invoices.create', compact('products'));
    }

    public function store(StoreInvoiceRequest $request)
    {
        //        $invoice = Invoice::create($request->all());
        $order_data = $request->except('product');
        $products = $request->only('product')['product'];

        $order = Invoice::create($order_data);
        $order_id = $order->id;
        foreach ($products as $key => &$product) {
            $product['invoice_id'] = $order_id;
        }
        InvoiceItem::insert($products);


        return redirect()->route('admin.invoices.index');
    }

    public function edit(Invoice $invoice)
    {
        abort_if(Gate::denies('invoice_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $products = Product::all();
        $invoice->load('products');

        foreach ($invoice->products as &$product) {
            $pd = Product::select('id', 'product_name', 'product_code')->where('id', $product->id)->first();
            $product->name = $pd->product_name;
            $product->code = $pd->product_code;
        }


        return view('admin.invoices.edit', compact('invoice', 'products'));
    }

    // public function update(UpdateInvoiceRequest $request, Invoice $invoice)
    // {
    //     $invoice->update($request->all());

    //     $invoice_data = $request->except('product');
    //     $products = $request->only('product')['product'];
    //     $allProducts = $invoice->products->pluck('id')->toArray();
    //     $submittedIds = array_filter(collect($products)->pluck('id')->toArray());


    //     $idsToDel = array_diff($allProducts, $submittedIds);
    //     $invoice->products()->whereIn('id', $idsToDel)->delete();
    //     foreach ($products as $key => $product) {
    //         if (isset($product['id'])) {
    //             InvoiceItem::where('id', $product['id'])->update($product);
    //         } else {
    //             $product['invoice_id'] = $invoice->id;
    //             InvoiceItem::create($product);
    //         }
    //     }

    //     $invoice->update($invoice_data);

    //     return redirect()->route('admin.invoices.index');
    // }

    public function update(UpdateInvoiceRequest $request, Invoice $invoice)
    {
        dd($request->all());
        // Update the invoice data except for products
        $invoice->update($request->except('product'));

        // Process products
        if ($request->has('product')) {
            $products = $request->input('product');

            // Get all product IDs associated with the invoice
            $allProducts = $invoice->products->pluck('id')->toArray();

            // Extract submitted product IDs
            $submittedIds = array_filter(collect($products)->pluck('id')->toArray());

            // Identify products to delete (those not submitted)
            $idsToDel = array_diff($allProducts, $submittedIds);

            // Delete products that are not submitted in the request
            if (!empty($idsToDel)) {
                InvoiceItem::whereIn('id', $idsToDel)->delete();
            }

            // Update or create invoice items
            foreach ($products as $product) {
                // If the product has an ID, update it; otherwise, create a new one
                if (isset($product['id'])) {
                    InvoiceItem::findOrFail($product['id'])->update($product);
                } else {
                    $product['invoice_id'] = $invoice->id;
                    InvoiceItem::create($product);
                }
            }
        }

        // Redirect to the index route after successful update
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
        $products = Product::select('id', 'product_name', 'product_code', 'product_price')->get();

        $invoice->load('products');

        foreach ($invoice->products as &$product) {
            $pd = Product::select('id', 'product_code', 'product_name')->where('id', $product->product_id)->first();
            $product->code = $pd->product_code;
            $product->product_name = $pd->product_name;
        }

        return view('admin.invoices.invoice', compact('invoice', 'products'));
    }
}
