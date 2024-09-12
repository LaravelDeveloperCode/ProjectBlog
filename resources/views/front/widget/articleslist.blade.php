    @foreach($KeyArticlies as $Article)
        <div class="post-preview">
            <a href="{{ route('single', [$Article->getCategory->slug, $Article->slug]) }}">
                <h2 class="post-title">{{ $Article->title }}</h2>
                <img src="{{ $Article->image }}" width="500" height="300"/><br><br>
                <h3 class="post-subtitle">{!! Str::limit($Article->content, 75) !!}</h3>
            </a>
            <p class="post-meta">Kategoriya:
                <a href="#!">{{ $Article->getCategory->name }}</a><br>
                <span class="float-right">Tarix: <b>{{ $Article->created_at->diffForHumans() }}</b></span>
            </p>
        </div>
        @if(!$loop->last)
            <hr class="my-4" />  <!-- metinlerin altındaki arakesme hattı sonuncuda olmasın-->
        @endif
    @endforeach


<div class="pagination-wrapper">
    {{ $KeyArticlies->links('pagination.bootstrap-4') }}
</div>




