<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Customer;
use App\Transaction;

class TransactionController extends Controller
{
    public function index()
    {
    	$data = (new Customer)->all();

    	$transaction = [];

    	foreach ($data as $key => $value) {
    		if ($value->getTransaction->all()) {
    			$transaction[]['data'] = $value;
    		}
    	}

		return view('transaction.index', ['transaction' => $transaction]);
    }

    public function detail(Request $request)
    {
    	$customer = Customer::findOrFail($request->id);
    	$all = $customer->getTransaction;

    	return view('transaction.detail', ['transaction' => $all, 'customer' => $customer]);
    }

    public function form ()
    {
    	$customers = Customer::all();
    	$books = Book::all();

    	return view('transaction.form', [
    			'customers' => $customers,
    			'books' => $books
    		]);
    }

    public function order(Request $request)
    {
    	$validate = [
    		'customer_id' => 'required',
    		'book_id' => 'required',
    		'duration' => 'required'
    	];

    	$this->validate($request, $validate);

    	if ($this->postOrder($request)) {
    		flash('Transaction was created')->important();

    		return redirect('/transaction');
    	}
    }

    protected function postOrder(Request $request)
    {
    	return Transaction::create([
    		'customer_id' => $request->customer_id,
    		'book_id' => $request->book_id,
    		'duration' => $request->duration.' day`s',
    		'etc' => json_encode(['status' => 'on progress'])
    	]);
    }
}
