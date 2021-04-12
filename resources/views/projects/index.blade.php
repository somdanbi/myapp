@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h1>Birdboad</h1></div>

                    <div class="card-body">
                        <a href="/projects/create" class="btn btn-secondary">Create</a>

                        <ul>
                            @forelse($projects as $project)


                                <li>
                                    <a href="{{$project->path()}}">
                                        {{$project->title}}
                                    </a>
                                </li>
                            @empty
                                <li>No projects yet</li>
                            @endforelse

                        </ul>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
