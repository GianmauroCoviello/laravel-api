@extends('layouts.admin')

@section('content')

    <div class="container p-4">
        <div class="row ">
            <div class="col-12 ">
            
                <h1>{{$project->title}}</h1>
                <div class="content-image my-3">
                    <img src="{{asset('storage/' . $project->cover_image)}}" alt="">
                </div>
                <h6>Contenuto:</h6>
                <p>{{$project->content}}</p>

                <h6>Tipo di progetto:</h6>
                <p>{{$project->type->name}}</p>

                {{-- <p>{{$project->technologies}}</p> --}}
                <h6>Tecnologie utilizzate:</h6>
                <div class="d-flex">
                     @foreach ($project->technologies as $tech)
                        <p class="pe-3">{{$tech->name}}</p>
                    @endforeach

                </div>
               
                
            </div>
            <div class="col">
                <a href="{{route('admin.projects.index')}}" class="btn btn-primary">
                    ritorna alla pagina precedente
                </a>
            </div>
        </div>
    </div>

    
@endsection