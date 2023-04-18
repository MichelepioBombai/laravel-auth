<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::orderBy('updated_at', 'DESC' )->paginate(10);
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|string|max:100|',
            'text' => 'required|string',
            'image' => 'nullable|url',

        ],
        [
            'title.required' => 'il titolo è obbligatorio',
            'title.string' => 'il titolo deve essere una stringa',
            'title.max' => 'il titolo può contenere al massimo 100 caratteri',
            'text.required' => 'il contenuto è obbligatorio',
            'text.string' => 'il contenuto deve essere una stringa',
            'image.url' => 'L\'immagine deve essere un URL',


        ]); 


        $data = $request->all();
        $project = new Project;
        $project->fill($data);
        $project->slug = $project->id . '-' . Str::of($project->title)->slug('-');
        $img_path = Storage::put('uploads', $data['image']);
        $project->save();


        return to_route('admin.projects.show', $project)
            ->with('messagge_content', 'Progetto creato con successo');
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
        return view('admin.projects.edit', compact('project'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $request->validate([
            'title' => 'required|string|max:100|',
            'text' => 'required|string',
            'image' => 'nullable|url',

        ],
        [
            'title.required' => 'il titolo è obbligatorio',
            'title.string' => 'il titolo deve essere una stringa',
            'title.max' => 'il titolo può contenere al massimo 100 caratteri',
            'text.required' => 'il contenuto è obbligatorio',
            'text.string' => 'il contenuto deve essere una stringa',
            'image.url' => 'L\'immagine deve essere un link valido',


        ]); 
        
        $data = $request->all();
        $project->update($data);
        return redirect()->route('admin.projects.show', $project)
        ->with('messagge_content', 'Progetto modificato con successo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $id_project = $project->id;
        $project->delete();
        
        return redirect()->route('admin.projects.index')
            ->with('messagge_type', "danger")
            ->with('messagge_content', "Progetto $id_project eliminato con successo");
    }
}