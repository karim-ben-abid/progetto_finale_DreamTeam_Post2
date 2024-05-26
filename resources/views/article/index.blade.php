<x-layout title="Lista Articoli">
    <header class="header pt-5 articleCont mt-5">
        <div class="container-fluid">
            <div class="row justify-content-center align-content-center h-100 mt-5">
                <div class="col-12 col-md-6 d-flex justify-content-center align-items-center">
                    <h1 class="text-center p-2 textOmbre">Lista Articoli</h1>
                </div>
            </div>
        </div>
    </header>

    {{-- Snippet per feedback positivo --}}
    <x-display-message />

    {{-- Snippet per verificare errori --}}
    <x-display-errors />

            <div class="container">
                <div class="row justify-content-center p-2 ">
                    @foreach ($articles as $article)
                        <div class="col-12 col-md-4">
                            <x-card-article :article="$article" :tags="$article->tags" readDuration="{{$article->readDuration()}}"/>
                        </div>
                    @endforeach
                </div>
            </div>
</x-layout>
