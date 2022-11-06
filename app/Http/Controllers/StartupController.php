<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Startup;
use App\Models\Donation;
use Illuminate\Http\Request;
use App\Http\Requests\StoreStartupRequest;
use App\Http\Requests\UpdateStartupRequest;

class StartupController extends Controller
{
    /**
     * Display a listing of the startup.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('Startup/Index',[
            'startups' => Startup::paginate(10)
        ]);
    }
    /**
     * Show the form for creating a new startup.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Startup/Create');
    }
     /**
     * Store a newly created startup in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(StoreStartupRequest $request)
    {
        Startup::create(array_merge($request->validated()));
        return Inertia::location(route('startups.index'));
    }
    /**
     * Display the specified startup.
     *
     * @param  \App\Models\Startup  $startup
     * @return \Illuminate\Http\Response
     */
    public function show(Startup $startup) 
    {
        return Inertia::render('Startup/Show',['startup' => $startup , 'donations' => Donation::where('startup_id', $startup->id)->paginate(10)]);
    }
    /**
     * Show the form for editing the specified startup.
     *
     * @param  \App\Models\Startup  $startup
     * @return \Illuminate\Http\Response
     */

    public function edit(Startup $startup) 
    {
        return Inertia::render('Startup/Edit',['startup' => $startup]);
    }
    /**
     * Update the specified storage in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Startup $startup
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStartupRequest $request) 
    {
        $validated = $request->validated();
        // dd($validated);
        Startup::findOrFail($validated['id'])->update($validated);

        return redirect()->route('startups.index')
            ->withSuccess(__('startup updated successfully.'));
    }
     /**
     * Remove the specified startup from storage.
     *
     * @param  \App\Models\Startup $startup
     * @return \Illuminate\Http\Response
     */
    public function destroy(Startup $startup) 
    {
        $startup->delete();

        return redirect()->route('startups.index')
            ->withSuccess(__('Startup deleted successfully.'));
    }
}
