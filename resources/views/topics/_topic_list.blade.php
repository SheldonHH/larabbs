@if (count($topics))

    <ul class="media-list">
        @foreach ($topics as $topic)
            .
            .
            .
            {{ $topic->user->name }}
            .
            .
            .
            {{ $topic->category->name }}
            .
            .
            .
        @endforeach
    </ul>

@else
    <div class="empty-block">暂无数据 ~_~ </div>
@endif