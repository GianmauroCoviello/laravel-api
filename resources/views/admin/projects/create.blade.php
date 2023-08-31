@extends('layouts.admin')

@section('content')

    <div class="container p-4">
        <div class="row ">
            <div class="col-12 ">
                <h1>Aggiungi un nuovo post nei project</h1>
                <hr>
            </div>
            <div class="col-12">
                @if ($errors->any())

                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $err)
                                    <li>{{$err}}</li>
                                @endforeach
                            </ul>
                        </div>
                        
                @endif
                <form action="{{route('admin.projects.store')}}" enctype="multipart/form-data" method="POST">
                    {{-- token obbligatorio --}}
                    @csrf
                    {{-- title --}}
                    <div class="form-group mb-3 mt-5">
                        <label class="control-table">Titolo</label>
                        <input type="text" name="title" id="title" class="form-control widht-550" required>
                    </div>
                    {{-- image --}}
                    <div class="form-group">
                        <label class="control-table pe-3">Immagine di copertina</label><br>
                        <input type="file" class="control-table widht-550" name="cover_image" id="cover_image" >
                    </div>
                    {{-- content --}}
                    <div class="form-group mb-3 mt-4">
                        <label class="control-table">Content</label>
                        <textarea name="content" id="content"  class="form-control" required></textarea>
                    </div>
                    {{-- type --}}
                    <div class="form-group mb-3 mt-4">
                        <label class="control-table">Tipo</label>
                        <select class="form-control" name="type_id" id="type_id">
                            
                            <option>Seleziona il tipo di progetto</option>
                            @foreach($types as $type)
                                <option value="{{$type->id}}" >{{$type->name}}</option>
                            @endforeach
                        </select>
                        
                        
                    </div>

                    {{-- technologies --}}
                    <div class="form-group mb-3 mt-4">
                        <p></p>
                       
                          {{-- lezione minuto 15:00 --}}
                        @foreach($technologies as $tech)
                            <input type="checkbox" name="technologies[]"  class="form-check-input" value="{{$tech->id}}" {{in_array($tech->id, old('technologies', [])) ? 'checked' :'' }}>
                            <label class="form-check-label">{{$tech->name}}</label>
                        @endforeach
                        
                        
                        
                    </div>


                    <button type="submit" class="btn btn-success mt-4">
                        Salva
                    </button>
                    {{-- messaggi di errore --}}
                
                </form>
            </div>
            <div class="col mt-3">
                <a href="{{route('admin.projects.index')}}" class="btn btn-primary">
                    ritorna alla pagina precedente
                </a>
            </div>
        </div>
    </div>

    
@endsection