@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-12 d-flex justify-content-center align-items-center mt-3">
        <div class="col-12 d-flex flex-column justify-content-center align-items-center">
            <h2 class="fw-bold">INSERISCI UN NUOVO PROGETTO</h2>
        </div>
    </div>
    <div>
        <div class="col-12 d-flex justify-content-center ">
            <form action="{{ route('admin.projects.store')}}" method="POST" class="col-6 justify-content-center" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-3">
                    <label class="control-label">Titolo: </label>
                    <input type="text" id="title" class="form-control" placeholder="Titolo del progetto" name="title" value="{{old('title')}}">
                    @error('title')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label class="control-label">Immagine:</label>
                    <input type="file" name="img" id="img" class="form-control" >
                    @error('img')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label class="control-label">Categoria:</label>
                    <select class="form-control" name="category_id" id="category_id">
                        <option value="">Seleziona categoria</option>
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label class="control-label">Descrizione:</label>
                    <input type="text" id="descrizione" class="form-control" placeholder="Descrizione" name="descrizione" value="{{old('descrizione')}}">
                    @error('descrizione')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label class="control-label">Applicazioni utilizzate:</label>
                    <input type="text" id="used_apps" class="form-control" placeholder="Inerisci le app separati da una virgola" name="used_apps" value="{{old('used_apps')}}">
                    @error('used_apps')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-12 d-flex justify-content-center align-items-center">
                    <button class="label align-self-center btn btn-sm btn-primary" type="submit"> CREA </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection