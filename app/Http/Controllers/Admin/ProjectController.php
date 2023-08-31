<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;


// use App\Http\Controllers\Admin\TechnologyController;

use App\Models\Project;
use App\Models\Type;
use App\Models\Technology;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;


class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $types = Type::all();
        $technologies = Technology::all();
        
        return view('admin.projects.create', compact('types', 'technologies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectRequest $request)
    {
        $form_data = $request->all();
        // dd($form_data);
        $project = new Project();

        if ($request->hasFile('cover_image')) {
            # code...
            $path = Storage::put('cover_image', $form_data['cover_image']);

            $form_data['cover_image']=$path;
            
        }

        $form_data['slug']= $project->generateSlug($form_data['title']);
        
        $project->fill($form_data);

        $project->save();

        if ($request->has('technologies')){

            $project->technologies()->sync($request->technologies);
           
        }

        return Redirect()->route('admin.projects.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $types = Type::all();
        $technologies = Technology::all();
       
        return view('admin.projects.edit', compact('project', 'types','technologies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProjectRequest  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $form_data = $request->all();

        if ($request->hasFile('cover_image')) {
            
            if ($project->cover_image) {
                
                Storage::delete($project->cover_image);


            }

            $path = Storage::put('cover_image', $request->cover_image);

            $form_data['cover_image'] = $path;


        }

        $form_data['slug']= $project->generateSlug($form_data['title']);

        $project->update($form_data);
        if ($request->has('technologies')){

            $project->technologies()->sync($request->technologies);
           
        }

        $project->save();

        return Redirect()->route('admin.projects.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->technologies()->detach();
        Storage::delete($project->cover_image);
        $project->delete();

        // return Redirect()->route('admin.projects.destroy', compact('project'));
        return Redirect()->route('admin.projects.index');
    }
}
