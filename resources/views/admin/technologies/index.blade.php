@extends('layouts.admin')

@section('content')

<div class="container p-4">
    <div class="row ">
        <div class="col ">
            <div class="card scroll-bar">
                <div class="card-header">
                    <div class="card-title">
                        <h3>My Technoligies</h3>
                    </div>
                </div>

                <div class="card-body p-0">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                
                                <th>Nome</th>
                                <th>Slug</th>
                                <th>show</th>
                                <th>update</th>
                                <th>delete</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($technologies as $tech)
                                <tr>
                                    
                                    <td>{{ $tech->name}}</td>
                                    <td>{{ $tech->slug}}</td> 
                                    <td>
                                        <a href="{{route('admin.technologies.show', $tech->id)}}" class="btn btn-primary">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>
                                    </td> 
                                    <td>
                                        <a href="{{route('admin.technologies.edit', $tech->id)}}" class="btn btn-success">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                    </td>
                                    <td>
                                        {{-- inserita la form per l'eliminazione dei progetti tramite il metodo destroy --}}
                                        <form class="d-inline-block " action="{{route('admin.technologies.destroy', $tech->id)}}" onsubmit="return confirm('sei sicuro di voler cancellare questo progetto?')" method="POST">
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
            <a href="{{route('admin.technologies.create', $tech->id)}}" class="btn btn-success mt-3">
                <span>Aggiungi una nuova technology</span>
                <i class="fa-solid fa-plus"></i>
            </a>
        </div>
    </div>

    
@endsection