<x-auth.admin-layouts>
    <div class="container">

        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                        <div class="d-flex justify-content-center py-4">
                            <a href="index.html" class="logo d-flex align-items-center w-auto">
                                <img src="{{ asset('') }}assets/img/logo.png" alt="">
                                <span class="d-none d-lg-block">Forgot Password</span>
                            </a>
                        </div><!-- End Logo -->

                        <div class="card mb-3">

                            <div class="card-body">

                                <div class="pt-4 pb-2">
                                    <x-msg />
                                    <h5 class="card-title text-center pb-0 fs-4">Forgot Password</h5>
                                    <p class="text-center small">Enter your Email to Recover it.</p>
                                </div>

                                <form class="row g-3 needs-validation" action="{{ route('reset.password') }}"
                                    method="POST">
                                    @csrf
                                    <div class="col-12">
                                        <label for="Email" class="form-label">Email</label>
                                        <div class="input-group has-validation">
                                            <input type="email" name="email" class="form-control" id="Email"
                                                required>

                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <button class="btn btn-primary w-100" type="submit">Recover</button>
                                    </div>
                                    <div class="col-12">
                                        <p class="small mb-0 "><a href="{{ route('login') }}">login</a></p>
                                    </div>
                                </form>

                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </section>

    </div>
</x-auth.admin-layouts>
