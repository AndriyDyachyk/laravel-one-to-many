@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 mt-5 " >
            <div class="d-flex justify-content-between align-items-center">
                <h1>{{$project->title}}</h1>
                <a href="{{ Route('admin.projects.index') }}" class="btn btn-dark">Torna indietro</a>
            </div>
            <div class="col-12 mt-5">
                <div class="card my-4">
                    <!-- CARD HEADER -->
                    <h5 class="card-header d-flex justify-content-between align-items-center">
                        <div>
                            {{$project->id}}
                        </div>
                        <div class="d-flex">
                            <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-sm btn-warning mx-2">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form class="d-line-block" action="{{ route('admin.projects.destroy', $project->id) }}" onsubmit="return confirm('Sei sicuro di voler cancellare questo projetto?')" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger mx-2">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </h5>

                    <!-- CARD BODY -->
                    <div class="card-body">
                        <h5 class="card-title"></h5>
                        <img src="{{ asset('storage/'.$project->img)}}" width="500px">
                        <p class="card-text">{{$project->category->name}}</p>
                        <p class="card-text">{{$project->description}}</p>
                        <p class="card-text">App utilizzate: {{$project->used_apps}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection