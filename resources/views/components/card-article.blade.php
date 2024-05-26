<div class="card cardCustom my-5" data-aos="fade-up">
    <img src="{{ Storage::url($article->img) }}" class="card-img-top imgCastom" alt="...">
    <div class="card-body d-flex flex-column justify-content-between ">
        <div>
            <h4 class="card-title text-center ">{{ $article->title }}</h4>
            <p class="card-text">{{ $article->subtitle }}</p>
            <span class="text-muted small fst-italic">Tempo di lettura {{$article->readDuration()}} minuti</span>
            @if ($tags)
                <p class="small fst-italic text-capitalize">
                    @foreach ($article->tags as $tag)
                       <span>#</span>{{$tag->name}}
                    @endforeach
                </p>
            @endif
        </div>

        <div class="d-flex justify-content-between align-items-center">
            <a class="btn mybtn1" href="{{ route('article.byCategory', ['category' => $article->category->id]) }}">{{ $article->category->name }}</a>
            <a href="{{ route('article.show', compact('article')) }}"><button class="btn mybtn">Dettaglio</button></a>
        </div>

    </div>
    <div class="card-footer text-muted d-flex align-items-center justify-content-center mt-2 ">
        <p>Articolo creato il {{ $article->created_at->format('d/m/Y') }}</p>
    </div>
    <div class="card-footer text-muted d-flex align-items-center justify-content-center ">
        <p>Scrittore: <a href="{{ route('article.byUser', ['user' => $article->user->id]) }}">{{ $article->user->name }}</a>
        </p>
    </div>
</div>