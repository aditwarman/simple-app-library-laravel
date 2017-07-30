<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;

class CustomerController extends Controller
{
	protected $customer;
	protected $paginate;

	function __construct(Customer $customer)
	{
		$this->customer = $customer;
		$this->paginate = $customer->paginate(5);
	}

	public function index()
	{
		return view('list.customer', ['customers' => $this->paginate]);
	}

	public function form()
	{
		return view('customer.form');
	}

	public function postCustomer(Request $request)
	{
		$validate = [
            'card_numb' => 'required|numeric|unique:customers',
            'name' => 'required',
            'gender' => 'required',
            'address' => 'required',
        ];

        $this->validate($request, $validate);

        if ($this->updateOrCreateCustomer($request)) {
            flash('Successfully added a Customer')->important();

            return redirect('list/customer');
        }

        return redirect()->back()
            ->withInput($request->all);
	}

	public function edit(Request $request)
    {
        $customer = Customer::findOrFail($request->id);

        return view('customer.edit', ['customer' => $customer]);
    }

	public function postEdit(Request $request)
    {
	$validate = [
            'card_numb' => 'required|numeric|unique:customers',
            'name' => 'required',
            'gender' => 'required',
            'address' => 'required',
        ];
	
	$this->validate($request, $validate);
		
        if ($this->updateOrCreateCustomer($request)) {
            flash('Data with <strong> ID '.$request->customer_id.'</strong> was changed')->important();
            return redirect('list/customer');
        }

        return redirect()->back()
            ->withInput($request->all);
    }

    public function delete(Request $request)
    {
        Customer::findOrFail($request->id)->delete();
        return back();
    }

    public function restore(Request $request)
    {
        $customer = Customer::withTrashed()
                ->restore();

        flash("Restore data was Successfully")->important();
        return redirect('/list/customer');
    }

	protected function updateOrCreateCustomer(Request $request)
    {
        return Customer::updateOrCreate(
            [
                'id' => $request->customer_id,
            ],
            [
                'id' => $request->customer_id,
                'name' => $request->name,
                'gender' => $request->gender,
                'address' => $request->address,
                'card_numb' => $request->card_numb,
            ]
        );
    }
}
