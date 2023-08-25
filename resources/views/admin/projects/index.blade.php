@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 mt-5 " >
                <div class="d-flex justify-content-between">
                    <h1>I miei progetti</h1>
                    <a href="{{ route('admin.projects.create') }}" class="btn btn-sm btn-primary d-flex justify-content-center align-items-center" style="height: 50px; width:50px;">
                        <i class="fas fa-plus"></i>
                    </a>
                </div>
                <div class="col-12 mt-5">
                    @foreach ($projects as $project)
                    <div class="card my-4">
                        <!-- CARD HEADER -->
                        <h5 class="card-header d-flex justify-content-between">
                            <div>
                                {{$project->id}}
                            </div>
                            <div class="d-flex">
                                <a href="{{ route('admin.projects.show', $project->id) }}" class="btn btn-sm btn-primary mx-2" data-toggle="tooltip" data-placement="bottom" title="Aggiungi un nuovo progetto">
                                <i class="fas fa-eye"></i>
                                </a>
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
                            <h5 class="card-title">{{$project->title}}</h5>
                            <p class="card-text">{{$project->description}}</p>
                            <p class="card-text">App utilizzate: {{$project->used_apps}}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection