<ul class="list-unstyled">
  @foreach ($replies as $index => $reply)
    <div class="card topic-reply mt-4">
    <li class="media" name="reply{{ $reply->id }}" id="reply{{ $reply->id }}">
      <div class="media-left">
        <a href="{{ route('users.show', [$reply->user_id]) }}">
          <img class="media-object img-thumbnail mr-3" alt="{{ $reply->user->name }}" src="{{ $reply->user->avatar }}" style="width:48px;height:48px;" />
        </a>
      </div>
      <div class="media-body">
        <div class="media-heading mt-0 mb-1 text-secondary">
          <a href="{{ route('users.show', [$reply->user_id]) }}" title="{{ $reply->user->name }}">
            <strong>{{ $reply->user->name }}</strong>
          </a>
          <span class="text-secondary"> • </span>
          <span class="meta text-secondary" title="{{ $reply->created_at }}">{{ $reply->created_at->diffForHumans() }}</span>
          {{-- 回复--}}
          @if (Auth::check())
          <span class="meta float-right">
                <button type="submit" user_id="{{ $reply->user_id }}" id="{{ $reply->id }}" class="btn btn-default btn-xs pull-left text-secondary huifu">
                 回复
                </button>
            </span>
          @endif
          {{-- 回复删除按钮 --}}
          @can('destroy', $reply)
            <span class="meta float-right">
              <form action="{{ route('replies.destroy', $reply->id) }}"
                    onsubmit="return confirm('确定要删除此评论？');"
                    method="post">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <button type="submit" class="btn btn-default btn-xs pull-left text-secondary">
                  <i class="far fa-trash-alt"></i>
                </button>
              </form>
            </span>
          @endcan
        </div>
        <div class="reply-content text-secondary">
          {!! $reply->content !!}
        </div>
      </div>
    </li>
      @isset($reply->children)
        @foreach ($reply->children as $indexc => $childrenReply)
        <li class="media" name="reply{{ $childrenReply->id }}" id="reply{{ $childrenReply->id }}">
       &nbsp; &nbsp; &nbsp;<div class="media-left">
          <a href="{{ route('users.show', [$childrenReply->user_id]) }}">
            <img class="media-object img-thumbnail mr-3" alt="{{ $childrenReply->user->name }}" src="{{ $childrenReply->user->avatar }}" style="width:48px;height:48px;" />
          </a>
        </div>
        <div class="media-body">
          <div class="media-heading mt-0 mb-1 text-secondary">
            <a href="{{ route('users.show', [$childrenReply->user_id]) }}" title="{{ $childrenReply->user->name }}">
              <strong>{{ $childrenReply->user->name }}</strong>
            </a>
            <span class="text-secondary"> • </span>
            <span class="meta text-secondary" title="{{ $childrenReply->created_at }}">{{ $childrenReply->created_at->diffForHumans() }}</span>
            {{-- 回复--}}
            @if (Auth::check())
              <span class="meta float-right">
                <button type="submit" name="{{ $childrenReply->user->name }}" user_id="{{ $childrenReply->user_id }}" id="{{ $reply->id }}" class="btn btn-default btn-xs pull-left text-secondary huifu">
                 回复
                </button>
            </span>
            @endif
            {{-- 回复删除按钮 --}}
            @can('destroy', $childrenReply)
              <span class="meta float-right">
              <form action="{{ route('replies.destroy', $childrenReply->id) }}"
                    onsubmit="return confirm('确定要删除此评论？');"
                    method="post">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <button type="submit" class="btn btn-default btn-xs pull-left text-secondary">
                  <i class="far fa-trash-alt"></i>
                </button>
              </form>
            </span>
            @endcan
          </div>
          <div class="reply-content text-secondary">
            {!! $childrenReply->content !!}
          </div>
        </div>
      </li>
        @endforeach
      @endisset
    <form id="reply_{{ $reply->id }}"  action="{{ route('replies.store') }}" method="POST" style="display:none">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <input type="hidden" name="topic_id" value="{{ $topic->id }}">
      <input type="hidden" name="pid" value="{{ $reply->id }}">
      <div class="form-group">
        <div class="textarea form-control" id="reply_{{ $reply->id }}_content"  contenteditable="true">

        </div>
        <textarea id="reply_{{ $reply->id }}_textarea" style="display: none"  name="content"  class="form-control"   placeholder="回复~~~~~"></textarea>
      </div>
      <button type="submit" onclick="return check(this.form)" class="btn btn-success">回复</button>
    </form>
    </div>
    @if ( ! $loop->last)
      <hr>
    @endif

  @endforeach
</ul>
