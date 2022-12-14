<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Startup;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreApplicationRequest;
// use App\Http\Controllers\ApplicationController;

class ApplicationController extends Controller
{
  
    public function index()
    {
        return Inertia::render('Application/Index',[
            'applications' => Application::where('status','pending')->paginate(10)
        ]);
    }
    public function create()
    {
        return Inertia::render('Application/Create');
    }
    public function store(StoreApplicationRequest $request)
    {
        Application::create(array_merge($request->validated()));
        return Inertia::location(route('applications.index'));
    }
    public function show(Application $application) 
    {
        return Inertia::render('Application/Show',['application' => $application] );
    }

    public function approve(Application $id) 
    {
        if(Auth::user()->id  == 1){
            $id->status = 'approved';
            $id->save();
            Startup::create($id->toArray());
            return Inertia::location(route('startups.index'));
        }   

        abort(403,'Unauthorized');
        
    }

    public function reject(Application $id) 
    {
        if(Auth::user()->id  == 1){
            $id->status = 'rejected';
            $id->save();
            return Inertia::location(route('applications.index'));
        }   

        abort(403,'Unauthorized');
        
    }

    public function edit(Application $application) 
    {
        return Inertia::render('Application/Edit',['application' => $application]);
    }
    public function update(UpdateApplicationRequest $request) 
    {
        $validated = $request->validated();
        Application::findOrFail($validated['id'])->update($validated);

        return redirect()->route('applications.index')
            ->withSuccess(__('applications updated successfully.'));
    }
    public function destroy(Application $application) 
    {
        $application->delete();

        return redirect()->route('applications.index')
            ->withSuccess(__('appplication  deleted successfully.'));
    }
}
