<x-layout title="Accedi">
    <header class="header pt-5 articleCont mt-5">
        <div class="container-fluid">
            <div class="row justify-content-center align-content-center h-100 mt-5">
                <div class="col-12 col-md-6 d-flex justify-content-center align-items-center">
                    <h1 class="text-center text-bg-light p-2 textOmbre">Accedi al tuo Account</h1>
                </div>
            </div>
        </div>
    </header>

    <x-display-errors />


    <div class="container-fluid mt-5 form-log1 py-5 ">
        <div class="row justify-content-center align-content-center h-100 ">
            <div class="col-12  d-flex justify-content-center align-items-center">
                <form class="sign-in p-5 shadow rounded-3 d-flex flex-column bg-body-secondary"
                    action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="container-fluid">
                        <div class="row">
                            <div class="mb-3 col-12 col-md-6 ">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" id="email"
                                    aria-describedby="emailHelp">
                            </div>

                            <div class="mb-3 col-12 col-md-6">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>

                            <div class="col-12 d-flex justify-content-center">
                                <button type="submit" class="btn mybtn mt-3 ">Accedi</button>
                            </div>
                            <div class="mt-3 col-12 d-flex justify-content-center ">
                                <p>se non sei ancora registrato allora fallo subito:</p>
                            </div>
                                <div class="d-flex justify-content-center">
                                    <a href="{{ route('register') }}" class="btn mybtn"> Registrati </a>
                                </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>
