<x-layout title="Articolo - {{ $article->category->name}}">
    <header class="header pt-1 articleCont">
        <div class="container-fluid mt-5 py-5 px-lg-5 mb-lg-5 rounded-3">
            <div class="row justify-content-center align-content-center">
                <div class="col-12 d-flex justify-content-center align-items-center">
                    <h1 class="text-center textOmbre mt-5 ">{{ $article->category->name}}</h1>
                </div>
            </div>
        </div>
    </header>

    {{-- Snippet per feedback positivo --}}
    <x-display-message />

    {{-- Snippet per verificare errori --}}
    <x-display-errors />

    <div class="container my-lg-5 pt-lg-5 pb-5 ">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6">
                <div class=" justify-content-center fotoShow ">
                    <img src="{{ Storage::url($article->img) }}" class="img-fluid rounded-3 mt-lg-5 shadow " alt="...">
                    <div class="justify-content-center text-black mt-4 text-center">
                        <h1 class="card-title">{{ $article->title }}</h1>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-4 order-md-last text-black mt-4">
                <h4 class="card-title p-2">{{ $article->subtitle }}</h4>
                <p class="card-text mt-4">{{ $article->body }}</p>
                @if ($tags)
                <p class="small fst-italic text-capitalize text-center  ">
                    @foreach ($article->tags as $tag)
                    <span>#</span>{{$tag->name}}
                    @endforeach
                </p>
                @endif
                @if ($article->category)
                <div class="d-flex justify-content-center ">
                    <span class="badge text-bg-primary">{{ $article->category->name }}</span>
                </div>
                @endif
                <div class=" d-flex justify-content-center">
                    @if (Auth::user() && Auth::user()->is_writer)
                    <a href="{{ route('article.edit', compact('article')) }}" class="btn mybtn mt-3 ">Modifica</a>
                    <form action="{{ route('article.destroy', compact('article')) }}" method="POST" class="mx-3">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger  mt-3 ">Elimina</button>
                    </form>
                    @endif
                </div>

                @if (Auth::user() && Auth::user()->is_revisor)
                <div class="container">
                    <div class="row">
                        <div class="col-12 d-flex mt-4 justify-content-center">
                            <form action="{{route('revisor.acceptArticle',$article)}}" method="POST">
                                @csrf
                                <button type="submit" class="btn mybtn mx-5 ">Accetta articolo</button>
                            </form>

                            <form action="{{route('revisor.rejectArticle', $article)}}" method="POST">
                                @csrf
                                <button type="submit" class="btn mybtn mx-5 ">Rifiuta articolo</button>
                            </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
</x-layout>