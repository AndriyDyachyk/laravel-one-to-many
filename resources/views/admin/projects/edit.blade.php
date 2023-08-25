@extends('layouts.admin')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-12 text-center">
            <div class="d-flex justify-content-between align-items-center">
                <h2 class="fw-bold">Modifica "{{ $project->title }}"</h2>
                <a href="{{ Route('admin.projects.index') }}" class="btn btn-dark">Torna indietro</a>
            </div>
        </div>
        <div class="col-12 mb-5">
            <form action=" {{ Route('admin.projects.update', $project->id) }} " method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group border p-4">
                    <div class="row">
                        <!-- Name -->
                        <div class="col-12 my-3">
                            <label class="control-label my-3">Nome</label>
                            <input type="text" name="title" id="title" placeholder="Modifica il Titolo" class="form-control" value="{{ old('title') ?? $project->title }}" required>
                            @error('title')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <!-- img -->
                        <div class="form-group mb-3">
                            <div>
                                <img src="{{ asset('storage/'.$project->img)}}" width="500px">
                            </div>
                            <label class="control-label">Immagine:</label>
                            <input type="file" name="img" id="img" class="form-control" >
                            @error('img')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <!-- Categoria -->
                        <div class="form-group mb-3">
                            <label class="control-label">Categoria:</label>
                            <select class="form-control" name="category_id" id="category_id">
                                <option value="">Seleziona categoria</option>
                                @foreach ($categories as $category)
                                <option {{ $category->id == old('category_id', $project->category_id) ? 'selected' : ''}} value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12 my-3">
                            <!-- Descrizione -->
                            <label class="control-label my-3">Descrizione</label>
                            <input type="text" name="description" id="description" placeholder="Modifica la descrizione" class="form-control" value="{{ old('description') ?? $project->description }}">
                            @error('description')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12 my-3">
                            <!-- App utilizzate -->
                            <label class="control-label my-3">App utilizzate</label>
                            <input type="text" name="used_apps" id="used_apps" placeholder="Modifica le app utilizzate" class="form-control" value="{{ old('used_apps') ?? $project->used_apps }}">
                            @error('used_apps')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12 text-center my-5">
                            <!-- Submit Button -->
                            <button type="submit" class="btn btn-warning">Modifica</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection