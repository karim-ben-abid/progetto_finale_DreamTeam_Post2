<x-layout title="Revisor">


    <header class="header articleCont">
        <div class="container-fluid">
            <div class="row justify-content-center align-content-center h-100 mt-5">
                <div class="col-12 col-md-6 d-flex justify-content-center align-items-center">

                    <h1 class="text-center text-bg-light p-2 mt-5 textOmbre">Bentornato Redattore</h1>

                </div>
            </div>
        </div>
    </header>

  <x-display-message/>

  <div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-12">
            <h2 class=" text-dark textOmbre">Articolo in fase di revisione</h2>
            <x-writer-articles-table :articles="$unrevisionedArticles"/>
        </div>
    </div>
  </div>

  <div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-12">
            <h2 class=" text-dark ">Articoli pubblicati</h2>
            <x-writer-articles-table :articles="$acceptedArticles"/>
        </div>
    </div>
  </div>

  <div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-12">
            <h2 class=" text-dark ">Articoli respinti</h2>
            <x-writer-articles-table :articles="$rejectedArticle"/>
        </div>
    </div>
  </div>

</x-layout>