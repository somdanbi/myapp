@extends('layouts.app')

@section('content')

        <div class="">
            <h1>Birdboad</h1>
            <a href="/projects/create" class="btn btn-secondary">Create</a>
        </div>




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





@endsection
