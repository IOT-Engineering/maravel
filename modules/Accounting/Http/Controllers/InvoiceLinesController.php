<?php

namespace App\Http\Controllers\Accounting;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\InvoiceLine;
use Illuminate\Http\Request;

class InvoiceLinesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $invoicelines = InvoiceLine::where('invoice_id', 'LIKE', "%$keyword%")
                ->orWhere('name', 'LIKE', "%$keyword%")
                ->orWhere('description', 'LIKE', "%$keyword%")
                ->orWhere('quantity', 'LIKE', "%$keyword%")
                ->orWhere('price', 'LIKE', "%$keyword%")
                ->orWhere('tax', 'LIKE', "%$keyword%")
                ->paginate($perPage);
        } else {
            $invoicelines = InvoiceLine::paginate($perPage);
        }

        return view('dashboard/Accounting.invoice-lines.index', compact('invoicelines'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('dashboard/Accounting.invoice-lines.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->validate($request, [
			'name' => 'required|max:64',
			'price' => 'required',
			'tax' => 'required'
		]);
        $requestData = $request->all();
        
        InvoiceLine::create($requestData);

        return redirect('invoice-lines')->with('flash_message', 'InvoiceLine added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $invoiceline = InvoiceLine::findOrFail($id);

        return view('dashboard/Accounting.invoice-lines.show', compact('invoiceline'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $invoiceline = InvoiceLine::findOrFail($id);

        return view('dashboard/Accounting.invoice-lines.edit', compact('invoiceline'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
			'name' => 'required|max:64',
			'price' => 'required',
			'tax' => 'required'
		]);
        $requestData = $request->all();
        
        $invoiceline = InvoiceLine::findOrFail($id);
        $invoiceline->update($requestData);

        return redirect('invoice-lines')->with('flash_message', 'InvoiceLine updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        InvoiceLine::destroy($id);

        return redirect('invoice-lines')->with('flash_message', 'InvoiceLine deleted!');
    }
}
