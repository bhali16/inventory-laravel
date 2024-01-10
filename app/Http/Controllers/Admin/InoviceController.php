<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyInoviceRequest;
use App\Http\Requests\StoreInoviceRequest;
use App\Http\Requests\UpdateInoviceRequest;
use App\Models\Inovice;
use App\Models\Product;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class InoviceController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('inovice_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $inovices = Inovice::with(['items_ordereds'])->get();

        return view('admin.inovices.index', compact('inovices'));
    }

    public function create()
    {
        abort_if(Gate::denies('inovice_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $items_ordereds = Product::pluck('product_code', 'id');

        return view('admin.inovices.create', compact('items_ordereds'));
    }

    public function store(StoreInoviceRequest $request)
    {
        $inovice = Inovice::create($request->all());
        $inovice->items_ordereds()->sync($request->input('items_ordereds', []));

        return redirect()->route('admin.inovices.index');
    }

    public function edit(Inovice $inovice)
    {
        abort_if(Gate::denies('inovice_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $items_ordereds = Product::pluck('product_code', 'id');

        $inovice->load('items_ordereds');

        return view('admin.inovices.edit', compact('inovice', 'items_ordereds'));
    }

    public function update(UpdateInoviceRequest $request, Inovice $inovice)
    {
        $inovice->update($request->all());
        $inovice->items_ordereds()->sync($request->input('items_ordereds', []));

        return redirect()->route('admin.inovices.index');
    }

    public function show(Inovice $inovice)
    {
        abort_if(Gate::denies('inovice_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $inovice->load('items_ordereds');

        return view('admin.inovices.show', compact('inovice'));
    }

    public function destroy(Inovice $inovice)
    {
        abort_if(Gate::denies('inovice_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $inovice->delete();

        return back();
    }

    public function massDestroy(MassDestroyInoviceRequest $request)
    {
        $inovices = Inovice::find(request('ids'));

        foreach ($inovices as $inovice) {
            $inovice->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
