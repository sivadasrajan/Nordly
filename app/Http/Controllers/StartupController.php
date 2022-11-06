<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Startup;
use App\Models\Category;
use App\Models\Donation;
use Illuminate\Http\Request;
use App\Http\Requests\StoreStartupRequest;
use App\Http\Requests\UpdateStartupRequest;

class StartupController extends Controller
{
    //
    public function index()
    {
        return Inertia::render('Startup/Index',[
            'startups' => Startup::paginate(10)
        ]);
    }

    public function search(Request $request)
    {
        return Inertia::render('Welcome',[
            'startups' => Startup::where('name','like','%'.($request['search']).'%')->paginate(10)
        ]);
    }
    public function create()
    {
        return Inertia::render('Startup/Create',['categories' => Category::all()]);
    }
    public function store(StoreStartupRequest $request)
    {
        Startup::create(array_merge($request->validated()));
        return Inertia::location(route('startups.index'));
    }
    public function show(Startup $startup) 
    {
        return Inertia::render('Startup/Show',['startup' => $startup , 'donations' => Donation::where('startup_id', $startup->id)->paginate(10)]);
    }

    public function edit(Startup $startup) 
    {
        return Inertia::render('Startup/Edit',['startup' => $startup]);
    }
    public function update(UpdateStartupRequest $request) 
    {
        $validated = $request->validated();
        // dd($validated);
        Startup::findOrFail($validated['id'])->update($validated);

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
