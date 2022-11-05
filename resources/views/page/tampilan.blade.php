@include('layouts.navbar');

    <div class="container-fluid">
        <div class="row">
           @include('layouts.sidebar');

            <main class="col-md-9 ms-sm-auto col-lg-10">
                <div class="d-flex justify-content-center">
                    @yield('main')
                </div>
            </main>
        </div>
    </div>

   @include('layouts.footer')