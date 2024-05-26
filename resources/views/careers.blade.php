<x-layout title="Lavora con noi">
    <header class="header pt-5 articleCont">
        <div class="container-fluid mt-5">
            <div class="row justify-content-center align-content-center h-100">
                <div class="col-12 col-md-6 d-flex justify-content-center align-items-center">
                    <h1 class="text-center text-bg-light p-2 textOmbre mt-5">Lavora con noi</h1>
                </div>
            </div>
        </div>
    </header>

    <div class="container mt-5">
        <div class="row text-center justify-content-center text-black">
            <div class="col-12 col-md-6 mb-5">
                <h2>Lavora come amministratore</h2>
                <p>Lavorare come amministratore di un giornale rappresenta un ruolo di grande responsabilità e
                    importanza all'interno di una testata giornalistica. L'amministratore gestisce gli aspetti
                    amministrativi, contabili e organizzativi del giornale, garantendone il corretto funzionamento e la
                    sua sostenibilità economica.</p>
                <h2>Lavora come revisore</h2>
                <p>La figura del revisore di un giornale, o correttore di bozze, svolge un ruolo fondamentale nel
                    garantire la qualità e l'accuratezza dei contenuti editoriali. Il suo lavoro meticoloso contribuisce
                    a dare ai lettori un'informazione affidabile e fruibile.</p>
                <h2>Lavora come redattore</h2>
                <p>Diventare un redattore può essere una scelta professionale gratificante e ricca di stimoli. I
                    redattori svolgono un ruolo fondamentale nella creazione di contenuti informativi e coinvolgenti per
                    una varietà di media, tra cui giornali, riviste, siti web, blog e social media.
                </p>
            </div>
            <x-display-errors />
            <form action="{{ route('careers.submit') }}" method="POST" class="p-3 shadow rounded-3 bg-body-secondary mb-4 text-white">
                @csrf
                <div class="mb-3">
                    <label for="role" class="form-label">
                        <h4>Per quale ruolo ti stai candidando?</h4>
                    </label>
                    <select name="role" id="role" class="form-label">
                        <option value="">scegli qui</option>
                        <option value="admin">amministratore</option>
                        <option value="revisor">revisore</option>
                        <option value="writer">redattore</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control text-center " id="email"
                        value="{{ old('email') ?? Auth::user()->email }}">
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label">Parlaci di te</label>
                    <textarea name="message" id="message" cols="30" rows="10" class="form-control">{{ old('message') }}</textarea>
                </div>
                <div class="mt-2">
                    <button class="btn mybtn">Invia la tua candidatura</button>
                </div>
            </form>
        </div>
    </div>
</x-layout>
