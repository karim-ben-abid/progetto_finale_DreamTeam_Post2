<x-layout title="Crea Articolo">
    <header class="header articleCont">
        <div class="container-fluid">
            <div class="row justify-content-center align-content-center h-100 mt-5">
                <div class="col-12 col-md-6 d-flex justify-content-center align-items-center">

                    <h1 class="text-center text-bg-light p-2 mt-5 textOmbre">NUOVO ARTICOLO</h1>

                </div>
            </div>
        </div>
    </header>

    {{-- Snippet per feedback positivo --}}

    <x-display-message />

    {{-- Snippet per verificare errori --}}

    <x-display-errors />

    <div class="container  newArt">
        <div class="row mt-2 justify-content-center py-5">
            <div class="col-12 col-md-6 justify-content-center ">
                <form class="rounded-4 shadow bg-secondary-subtle  p-3" action="{{ route('article.store') }}" method="POST" enctype="multipart/form-data">

                    {{-- ! enctype serve per inserire file nel form --}}

                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Titolo articolo</label>
                        <input name="title" type="text" class="form-control" id="title" value="{{old('title')}}">
                        @error('title')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="subtitle" class="form-label">Sottotitolo dell'articolo</label>
                        <input name="subtitle" class="form-control" id="subtitle" vlaue="{{old('subtitle')}}"></input>
                        @error('subtitle')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="body" class="form-label">Corpo dell'articolo</label>
                        <textarea name="body" class="form-control" id="body" cols="30" rows="10">{{old('body')}}</textarea>
                        @error('body')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class=" container mb-3">
                        <div class="row">
                            <div class="col-4">
                                <select name="category_id" class="form-select" aria-label="Default select example">
                                    <option selected>Seleziona categoria</option>

                                    @foreach ($categories as $category )
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 ">
                        <label for="img" class="form-label">Inserisci immagine</label>

                        <input name="img" type="file" class="form-control d-flex me-3" id="img" value="{{old('img')}}">

                    </div>
                    <div class="mb-3 ">
                        <label for="tags" class="form-label">Tags</label>
                        <input type="text" name="tags" class="form-control d-flex me-3" id="tags" value="{{old('tags')}}">
                        <span class="small fst-italic ">Dividi ogni tag con una virgola</span>
                        @error('tags')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn mybtn mt-3">Crea articolo</button>
                </form>
            </div>
        </div>
    </div>
</x-layout>