<x-layout title="Homepage">
<header class="header pt-5 articleCont">
        <div class="container-fluid">
            <div class="row justify-content-center align-content-center h-100 mt-5">
                <div class="col-12 col-md-6 d-flex justify-content-center align-items-center">
                    <h1 class="text-center p-2 textOmbre">Tutti gli articoli per: {{ $query }}</h1>
                </div>
            </div>
        </div>
    </header>

    <!-- sezione articoli recenti -->
    <section class="container">
        <div class="row justify-content-center">
            @foreach ($articles as $article)
                <div class="col-12 col-md-3">
                    <x-card-article :article="$article" />
                </div>
            @endforeach
        </div>
    </section>


</x-layout>
