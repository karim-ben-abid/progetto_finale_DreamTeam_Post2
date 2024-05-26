@if (session('message'))
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 d-flex  justify-content-center">
                <div class="alert my-alert-success d-flex align-items-center justify-content-center  mt-5 ">
                    <p><i class="bi bi-check-square-fill px-2"></i>{{ session('message') }}</p>
                </div>
            </div>
        </div>
    </div>
@endif
