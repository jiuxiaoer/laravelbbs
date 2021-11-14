@extends('layouts.app')

@section('title', $topic->title)
@section('description', $topic->excerpt)

@section('content')
  <div class="row">
    <div class="col-lg-3 col-md-3 hidden-sm hidden-xs author-info">
      <div class="card ">
        <div class="card-body">
          <div class="text-center">
            作者：{{ $topic->user->name }}
          </div>
          <hr>
          <div class="media">
            <div align="center">
              <a href="{{ route('users.show', $topic->user->id) }}">
                <img class="thumbnail img-fluid" src="{{ $topic->user->avatar }}" width="300px" height="300px">
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 topic-content">
      <div class="card">
        <div class="card-body">
          <h1 class="text-center mt-3 mb-3">
            {{ $topic->title }}
          </h1>

          <div class="article-meta text-center text-secondary">
            {{ $topic->created_at->diffForHumans() }}
            ⋅
            <i class="far fa-comment"></i>
            {{ $topic->reply_count }}
          </div>

          <div class="topic-body mt-4 mb-4">
            {!! $topic->body !!}
          </div>

          @can('update', $topic)
            <div class="operate">
              <hr>
              <a href="{{ route('topics.edit', $topic->id) }}" target="_blank" class="btn btn-outline-secondary btn-sm" role="button">
                <i class="far fa-edit"></i> 编辑
              </a>
              <form action="{{ route('topics.destroy', $topic->id) }}" method="post"
                    style="display: inline-block;"
                    onsubmit="return confirm('您确定要删除吗？');">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <button type="submit" class="btn btn-outline-secondary btn-sm">
                  <i class="far fa-trash-alt"></i> 删除
                </button>
              </form>
            </div>
          @endcan

        </div>
      </div>

      {{-- 用户回复列表 --}}

        <div class="card-body">
          @include('topics._reply_list', ['replies' => $topic->sumAll()])
          @includeWhen(Auth::check(), 'topics._reply_box', ['topic' => $topic])
        </div>


    </div>

  </div>
@stop

@section('styles')
  <link href="{{ asset('css/jquery.atwho.min.css') }}" rel="stylesheet">
  <style>
    .textarea {
      width: 100%;
      min-height: 100px;
      max-height: 300px;
      margin-left: auto;
      margin-right: auto;
      padding: 3px;
      outline: 0;
      border: 1px solid #a0b3d6;
      font-size: 14px;
      line-height: 24px;
      word-wrap: break-word;
      overflow-x: hidden;
      overflow-y: auto;
      border-color: rgba(82, 168, 236, 0.8);
      box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1), 0 0 8px rgba(82, 168, 236, 0.6);
    }

  </style>
@stop

@section('scripts')
  <script src="{{ asset('js/jquery.caret.min.js') }}"></script>
  <script src="{{ asset('js/jquery.atwho.min.js') }}"></script>
  <script>

  </script>
@stop
