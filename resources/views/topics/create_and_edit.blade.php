@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="col-md-12">
      <div class="card" style="width: 100%">
        <div class="card-body">
          <h2 class="">
            <i class="far fa-edit"></i>
            @if($topic->id)
              编辑话题
            @else
              新建话题
            @endif
          </h2>

          <hr>

          @if($topic->id)
            <form action="{{ route('topics.update', $topic->id) }}" method="POST" accept-charset="UTF-8">
              <input type="hidden" name="_method" value="PUT">
              @else
                <form action="{{ route('topics.store') }}" method="POST" accept-charset="UTF-8">
                  @endif
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  @include('shared._error')
                  <div class="form-group">
                    <input class="form-control" type="text" name="title" value="{{ old('title', $topic->title ) }}"
                           placeholder="请填写标题" required/>
                  </div>
                  <div class="form-group">
                    <select class="form-control" name="category_id" required>
                      <option value="" hidden disabled {{ $topic->id ? '' : 'selected' }}>请选择分类</option>
                      @foreach ($categories as $value)
                        <option value="{{ $value->id }}" {{ $topic->category_id == $value->id ? 'selected' : '' }}>
                          {{ $value->name }}
                        </option>
                      @endforeach
                    </select>
                  </div>

                  <div class="form-group" id="editorDiv">
                    <textarea name="body" style="width: 100%;height: 100%" class="form-control" id="editor" rows="6" placeholder="请填入至少三个字符的内容。"
                              required>{{ old('body', $topic->body ) }}</textarea>
                    <!-- html textarea 需要开启配置项 saveHTMLToTextarea == true -->
                    <textarea class="editormd-html-textarea" name="html"></textarea>
                  </div>

                  <div class="well well-sm">
                    <button type="submit" class="btn btn-primary"><i class="far fa-save mr-2" aria-hidden="true"></i> 保存
                    </button>
                  </div>
                </form>
        </div>
      </div>
    </div>
  </div>

@endsection

@section('styles')
  <link rel="stylesheet" type="text/css" href="{{ asset('css/editormd.min.css') }}">
@stop

@section('scripts')
  <script type="text/javascript" src="{{ asset('js/editormd.min.js') }}"></script>
  <script>
    $(document).ready(function() {
      var editor = editormd("editorDiv", {
        height: '750px',
        syncScrolling: "single",
        emoji: true,
        //启动本地图片上传功能
        imageUpload: true,
        watch: true,
        imageFormats: ["jpg", "jpeg", "gif", "png", "bmp", "webp", "zip", "rar"],
        path: "/js/lib/",
        imageUploadURL: '{{ route('topics.upload_image') }}', //文件提交请求路径
        saveHTMLToTextarea: true, //注意3：这个配置，方便post提交表单
      })
    });

    // var editor = editormd("editorDiv", {
    //   width  : "100%",
    //   height : "100%",
    //   path   : "/js/lib/"
    // });
  </script>
@stop
