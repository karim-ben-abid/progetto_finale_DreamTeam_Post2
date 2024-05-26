<x-layout title="Homepage">
    <header class="hero">
        <div class="container-fluid my-5 ">
            <div class="row">
                <div class="col-12 colHome d-flex justify-content-center align-content-center flex-column">
                    @guest
                        <h1 class="text-dark align-content-center text-center textOmbre">HOMEPAGE</h1>
                        <h5 class="text-dark align-content-center text-center textOmbre">{{__('ui.allAnnouncements')}}</h5>
                    @endguest
                    @auth
                        <h1 class="text-dark align-content-center text-center textOmbre">{{__('ui.welcome')}} {{ Auth::user()->name }}</h1>
                        {{-- <h5 class="text-dark align-content-center text-center textOmbre">{{__('ui.allAnnouncements')}}</h5> --}}
                    @endauth
                    
                </div>
            </div>
        </div>
    </header>

    <!-- sezione articoli recenti -->
    <section class=" container-fluid ">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 ">
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">
                        @foreach ($articles as $article)
                        <div class="swiper-slide">
                            <x-card-article :article="$article" :tags="$article->tags" readDuration="{{$article->readDuration()}}"/>
                        </div>
                        @endforeach
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
    </section>


    <!-- sezione  categorie -->
    <x-category-section/>

    <!-- staff -->
    <section>

    </section>

<x-lostaff></x-lostaff>
</x-layout>
