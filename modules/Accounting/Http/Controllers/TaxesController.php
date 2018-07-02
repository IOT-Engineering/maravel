<?php

namespace Modules\Accounting\Http\Controllers;

use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Modules\Accounting\Entities\Tax;

class TaxesController extends Controller
{
    use ValidatesRequests;

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
            $taxes = Tax::where('value', 'LIKE', "%$keyword%")
                ->paginate($perPage);
        } else {
            $taxes = Tax::paginate($perPage);
        }

        return view('accounting::taxes.index', compact('taxes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('accounting::taxes.create');
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
			'value' => 'required|max:32'
		]);
        $requestData = $request->all();
        
        Tax::create($requestData);

        return redirect('accounting/config/taxes')->with('flash_message', 'Tax added!');
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
        $tax = Tax::findOrFail($id);

        return view('accounting::taxes.show', compact('tax'));
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
        $tax = Tax::findOrFail($id);

        return view('accounting::taxes.edit', compact('tax'));
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
			'value' => 'required|max:32'
		]);

        $requestData = $request->all();
        
        $category = Tax::findOrFail($id);
        $category->update($requestData);

        return redirect('accounting/config/taxes')->with('flash_message', 'Tax updated!');
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
        Tax::destroy($id);

        return redirect('accounting/config/taxes')->with('flash_message', 'Tax deleted!');
    }
}
