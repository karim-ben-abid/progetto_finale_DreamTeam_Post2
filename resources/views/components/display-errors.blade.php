@if ($errors->any())
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 d-flex  justify-content-center">
                <div class="alert my_alert-danger d-flex align-items-center justify-content-center flex-column  mt-5  ">
                    @foreach ($errors->all() as $error)
                        <p><i class="bi bi-exclamation-triangle-fill px-2"></i>{{ $error }}</p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endif
