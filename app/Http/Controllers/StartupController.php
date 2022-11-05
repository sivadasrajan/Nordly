<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StartupController extends Controller
{
    //
    public function index()
    {
        $startups =statrtups::latest()->paginate(10);
        return view('startups.index',compact('startups'));
    }
    public function create()
    {
        return view('startups.create');
    }
    public function store(Startup $startup, StoreStartupRequest $request)
    {
        $startup->create(array_merge($request->validated(), [
            'password' => 'test' 
        ]));
    }
    public function show(Startup $startup) 
    {
        return view('startups.show', [
            'startup' => $startup
        ]);
    }

    public function edit(Startup $startup) 
    {
        return view('startups.edit', [
            'startup' => $startup
        ]);
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
