<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\Customer\StoreCustomerRequest;
use App\Http\Requests\Customer\UpdateCustomerRequest;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();

        return view('Pages.Customer.index', compact('customers'));
    }

    public function create()
    {
        return view('Pages.Customer.create-edit');
    }

    public function store(StoreCustomerRequest $request)
    {   
        Customer::create($request->validated());

        return redirect()
            ->route('customers.index')
            ->with(['success', 'Cliente cadastrado!']);
    }

    public function edit(Customer $customer)
    {
        return view('Pages.Customer.create-edit', compact('customer'));
    }

    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        $customer->update($request->validated());

        return redirect()
            ->route('customers.index')
            ->with(['success', 'Cliente atualizado!']);
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();

        return redirect()
            ->route('customers.index')
            ->with(['success', 'Cliente excluído!']);
    }
}