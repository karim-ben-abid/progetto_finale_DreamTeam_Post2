<x-layout title="Admin">

    <header class="header articleCont">
        <div class="container-fluid">
            <div class="row justify-content-center align-content-center h-100 mt-5">
                <div class="col-12 col-md-6 d-flex justify-content-center align-items-center">
                    <h1 class="text-center text-bg-light p-2 mt-5">Bentornato Amministratore</h1>
                </div>
            </div>
        </div>
    </header>

    <x-display-message />

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class=" text-dark text-center">Richeste per ruolo di amministratore</h2>
                <x-requests-table :roleRequest="$adminRequest" role="amministratore" />
            </div>
        </div>
    </div>

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class=" text-dark text-center">Richeste per ruolo di Revisore</h2>
                <x-requests-table :roleRequest="$revisorRequest" role="revisore" />
            </div>
        </div>
    </div>

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class=" text-dark text-center">Richeste per ruolo di Redattore</h2>
                <x-requests-table :roleRequest="$writerRequest" role="redattore" />
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class="text-dark text-center">Tutti i tags</h2>
                <x-metainfo-table metaType="tags" :metaInfos="$tags" />
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="text-dark text-center">Crea una nuova categoria</h2>
                <div class="d-flex justify-content-center ">
                    <form action="{{ route('admin.storeCategory') }}" method="POST" class="w-50 d-flex m-3">
                        @csrf
                        <input type="text" name="name" class="form-control me-2" placeholder="Nuova categoria">
                        <button type="submit" class="btn mybtn">Inserisci</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class="text-dark text-center">Tutte le categorie</h2>
                <x-metainfo-table metaType="categories" :metaInfos="$categories" />
            </div>
        </div>
    </div>
</x-layout>
