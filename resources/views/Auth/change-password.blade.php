<x-auth.admin-layouts>
    <div class="container">

        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
                        <div class="card mb-3">

                            <div class="card-body ">
                                <div class="pt-4 pb-2">
                                    <x-msg />
                                    <h5 class="card-title text-center pb-0 fs-4">Change Password</h5>
                                    <p class="text-center small">Enter new password to change your password</p>
                                </div>

                                <form class="row g-3 needs-validation"
                                    action="{{ route('post.password.change', $token) }}" method="POST">
                                    @csrf

                                    <div class="col-12">
                                        <label for="password" class="form-label">Password</label>
                                        <div class="input-group has-validation">
                                            <input type="password" name="password" class="form-control"
                                                id="yourUsername" required name="email">
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <label for="confirmpassword" class="form-label">Confirm Password</label>
                                        <input type="password" name="cpassword" class="form-control"
                                            id="confirmpassword" required name="password">
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-primary w-100" type="submit">Change Password</button>
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
