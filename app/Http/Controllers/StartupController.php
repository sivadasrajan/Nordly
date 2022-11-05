<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class StartupController extends Controller
{
    //
    public function index()
    {
        return Inertia::render('Startup/Index',[
            'startups' => Startup::paginate(10)
        ]);
    }
    public function create()
    {
        return Inertia::render('Startup/Create');
    }
    public function store(Startup $startup, StoreStartupRequest $request)
    {
        $startup->create(array_merge($request->validated(), [
            'password' => 'test' 
        ]));
    }
    public function show(Startup $startup) 
    {
        return Inertia::render('Startup/Show',['startup' => $startup]);
    }

    public function edit(Startup $startup) 
    {
        return Inertia::render('Startup/Edit',['startup' => $startup]);
    }
    public function update(Startup $startup, UpdateStartupRequest $request) 
    {
        $startup->update($request->validated());

        return redirect()->route('startups.index')
            ->withSuccess(__('startup updated successfully.'));
    }
    public function destroy(Startup $startup) 
    {
        $startup->delete();

        return redirect()->route('startups.index')
            ->withSuccess(__('Startup deleted successfully.'));
    }
}
