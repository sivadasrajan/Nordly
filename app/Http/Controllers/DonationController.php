<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Startup;
use App\Models\Donation;
use Tzsk\Payu\Facades\Payu;
use Illuminate\Http\Request;
use Tzsk\Payu\Concerns\Customer;
use Tzsk\Payu\Concerns\Transaction;
use App\Http\Requests\DonationCreateRequest;

class DonationController extends Controller
{
    /**
     * Display a listing of the donations.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new donations.
     *
     * @return \Illuminate\Http\Response
     */
    public function donateGet(Startup $id)
    {
        return Inertia::render('Donation/Donate',['startup' => $id , 'csrf_token' => csrf_token()]);
    }

    /**
     * Store a newly created donations in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function donate(DonationCreateRequest $request)
    {
        $validated = $request->validated();
        $startup = Startup::findOrFail($validated['startup_id']);
        
        $customer = Customer::make()->firstname('name')->email($validated['email']) 
        ->phone($validated['mobile']);


        $transaction = Transaction::make()
        ->charge(100)
        ->for($startup->name())// Only when using any custom attributes
        ->to($customer);
    
    return Payu::initiate($transaction)->redirect(route('status'));
        // Donation::create(array_merge($validated));
        // return   Inertia::location(route('startups.show',$request->validated()['startup_id']));
    }
    /**
     * Display the specified donations.
     *
     * @param  \App\Models\Donation  $donation
     * @return \Illuminate\Http\Response
     */
    public function show(Donation $donation)
    {
        //
    }

    public function status(Request $req)
    {
        $transaction = Payu::capture();
    }

    /**
     * Show the form for editing the specified donations.
     *
     * @param  \App\Models\Donation  $donation
     * @return \Illuminate\Http\Response
     */
    public function edit(Donation $donation)
    {
        //
    }

    /**
     * Update the specified donations in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Donation  $donation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Donation $donation)
    {
        //
    }

    /**
     * Remove the specified donations from storage.
     *
     * @param  \App\Models\Donation  $donation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Donation $donation)
    {
        //
    }
}
