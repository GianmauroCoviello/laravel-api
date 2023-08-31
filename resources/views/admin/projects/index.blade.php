@extends('layouts.admin')

@section('content')

<div class="container p-4">
    <div class="row ">
        <div class="col ">
            <div class="card scroll-bar">
                <div class="card-header">
                    <div class="card-title">
                        <h3>My Projects</h3>
                    </div>
                </div>

                <div class="card-body p-0">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Titolo</th>
                                <th>Descrizione progetto</th>
                                <th>Slug</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($projects as $project)
                                <tr>
                                    <td>{{ $project->title}}</td>
                                    <td>{{ $project->content}}</td>
                                    <td>{{ $project->slug}}</td> 
                                    <td>
                                        <a href="{{route('admin.projects.show', $project->id)}}" class="btn btn-primary">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>
                                    </td> 
                                    <td>
                                        <a href="{{route('admin.projects.edit', $project->id)}}" class="btn btn-success">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                    </td>
                                    <td>
                                        {{-- inserita la form per l'eliminazione dei progetti tramite il metodo destroy --}}
                                        <form class="d-inline-block " action="{{route('admin.projects.destroy', $project->id)}}" onsubmit="return confirm('sei sicuro di voler cancellare questo progetto?')" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger">
                                                <i class="fa-solid fa-trash"></i>

                                            </button>
                                        </form>
                                    </td> 

                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>  
            </div>
            <a href="{{route('admin.projects.create', $project->id)}}" class="btn btn-danger mt-3">
                <span>Aggiungi un nuovo progetto</span>
                <i class="fa-solid fa-plus"></i>
            </a>
        </div>
    </div>

    
@endsection