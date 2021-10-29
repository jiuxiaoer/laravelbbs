@extends('layouts.app')

@section('content')

<div class="container">
  <div class="col-md-10 offset-md-1">
    <div class="card ">

      <div class="card-header">
        <h1>
          Project /
          @if($project->id)
            Edit #{{ $project->id }}
          @else
            Create
          @endif
        </h1>
      </div>

      <div class="card-body">
        @if($project->id)
          <form action="{{ route('projects.update', $project->id) }}" method="POST" accept-charset="UTF-8">
          <input type="hidden" name="_method" value="PUT">
        @else
          <form action="{{ route('projects.store') }}" method="POST" accept-charset="UTF-8">
        @endif

          @include('common.error')

          <input type="hidden" name="_token" value="{{ csrf_token() }}">

          
                <div class="form-group">
                	<label for="name-field">Name</label>
                	<input class="form-control" type="text" name="name" id="name-field" value="{{ old('name', $project->name ) }}" />
                </div> 
                <div class="form-group">
                	<label for="description-field">Description</label>
                	<textarea name="description" id="description-field" class="form-control" rows="3">{{ old('description', $project->description ) }}</textarea>
                </div> 
                <div class="form-group">
                    <label for="subscriber_count-field">Subscriber_count</label>
                    <input class="form-control" type="text" name="subscriber_count" id="subscriber_count-field" value="{{ old('subscriber_count', $project->subscriber_count ) }}" />
                </div>

          <div class="well well-sm">
            <button type="submit" class="btn btn-primary">Save</button>
            <a class="btn btn-link float-xs-right" href="{{ route('projects.index') }}"> <- Back</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
