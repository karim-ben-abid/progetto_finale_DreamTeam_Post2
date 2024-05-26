<div class="container">
    <h1 class="d-flex justify-content-center text-black mt-3 titoloCategory textOmbre">{{__('ui.Allcategory')}}</h1>
    <div class="row text-center my-5 justify-content-center">
        @foreach ($categories as $category)
            <a class="text-decoration-none col-12 col-md-6" href="{{ route('article.byCategory', ['category' => $category]) }}">
                <div class="my-3 rounded-5  py-5 sectionCategory">
                    <h3 class="text-white">{{__('ui.'.$category->name) }}</h3>
                </div>
            </a>
        @endforeach
    </div>
</div>
