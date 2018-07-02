<?php

namespace Modules\Accounting\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use App\Http\Requests;

use Modules\Accounting\Entities\Invoice;

class InvoicesController extends Controller
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
            $invoices = Invoice::where('invoice_number', 'LIKE', "%$keyword%")
                ->orWhere('company_name', 'LIKE', "%$keyword%")
                ->orWhere('company_nif', 'LIKE', "%$keyword%")
                ->orWhere('company_address', 'LIKE', "%$keyword%")
                ->orWhere('client_name', 'LIKE', "%$keyword%")
                ->orWhere('client_nif', 'LIKE', "%$keyword%")
                ->orWhere('client_country', 'LIKE', "%$keyword%")
                ->orWhere('client_city', 'LIKE', "%$keyword%")
                ->orWhere('client_cp', 'LIKE', "%$keyword%")
                ->orWhere('client_address', 'LIKE', "%$keyword%")
                ->orWhere('date', 'LIKE', "%$keyword%")
                ->orWhere('due_date', 'LIKE', "%$keyword%")
                ->orWhere('draft', 'LIKE', "%$keyword%")
                ->orWhere('paid', 'LIKE', "%$keyword%")
                ->orWhere('category_id', 'LIKE', "%$keyword%")
                ->paginate($perPage);
        } else {
            $invoices = Invoice::paginate($perPage);
        }


		foreach ($invoices AS $item)
		{
			InvoiceLine::whereInvoiceId($item->id)->get();

			$item['total'] = 0;
			$item['state'] = "Borrador";

			$item->invoice_number;
		}


        return view('accounting::invoices.index', compact('invoices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
		$customers = [];
		$currencies = [];
		$taxes = [];
		$categories = [];


		return view('accounting::invoices.create', compact('customers', 'currencies', 'taxes', 'categories'));
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
			'company_name' => 'required|max:32',
			'company_nif' => 'required|max:32',
			'company_address' => 'required|max:32',
			'client_nif' => 'required|max:32',
			'client_country' => 'required|max:32',
			'client_city' => 'required|max:32',
			'client_address' => 'required|max:255'
		]);
        $requestData = $request->all();
        
        Invoice::create($requestData);

        return redirect('invoices')->with('flash_message', 'Invoice added!');
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
        $invoice = Invoice::findOrFail($id);

        return view('accounting::invoices.show', compact('invoice'));
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
        $invoice = Invoice::findOrFail($id);

        return view('accounting::invoices.edit', compact('invoice'));
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
			'company_name' => 'required|max:32',
			'company_nif' => 'required|max:32',
			'company_address' => 'required|max:32',
			'client_nif' => 'required|max:32',
			'client_country' => 'required|max:32',
			'client_city' => 'required|max:32',
			'client_address' => 'required|max:255'
		]);
        $requestData = $request->all();
        
        $invoice = Invoice::findOrFail($id);
        $invoice->update($requestData);

        return redirect('invoices')->with('flash_message', 'Invoice updated!');
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
        Invoice::destroy($id);

        return redirect('invoices')->with('flash_message', 'Invoice deleted!');
    }
}
