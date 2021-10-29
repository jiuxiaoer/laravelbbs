@extends('layouts.app')

@section('content')
<div class="container">
  <div class="col-md-10 offset-md-1">
    <div class="card ">
      <div class="card-header">
        <h1>
          Project
          <a class="btn btn-success float-xs-right" href="{{ route('projects.create') }}">Create</a>
        </h1>
      </div>

      <div class="card-body">
        @if($projects->count())
          <table class="table table-sm table-striped">
            <thead>
              <tr>
                <th class="text-xs-center">#</th>
                <th>Name</th> <th>Description</th> <th>Subscriber_count</th>
                <th class="text-xs-right">OPTIONS</th>
              </tr>
            </thead>

            <tbody>
              @foreach($projects as $project)
              <tr>
                <td class="text-xs-center"><strong>{{$project->id}}</strong></td>

                <td>{{$project->name}}</td> <td>{{$project->description}}</td> <td>{{$project->subscriber_count}}</td>

                <td class="text-xs-right">
                  <a class="btn btn-sm btn-primary" href="{{ route('projects.show', $project->id) }}">
                    V
                  </a>

                  <a class="btn btn-sm btn-warning" href="{{ route('projects.edit', $project->id) }}">
                    E
                  </a>

                  <form action="{{ route('projects.destroy', $project->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Delete? Are you sure?');">
                    {{csrf_field()}}
                    <input type="hidden" name="_method" value="DELETE">

                    <button type="submit" class="btn btn-sm btn-danger">D </button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          {!! $projects->render() !!}
        @else
          <h3 class="text-xs-center alert alert-info">Empty!</h3>
        @endif
      </div>
    </div>
  </div>
</div>

@endsection
