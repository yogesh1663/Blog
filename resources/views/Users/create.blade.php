<x-auth.admin-layouts>
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Users</a></li>
                    <li class="breadcrumb-item active">Create</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Add user <a href="{{ route('users.index') }}"
                        class="float-end btn btn-primary btn-sm">Back</a>
                </h5>
                <!-- Horizontal Form -->
                <form action="{{ route('users.store') }}" method="POST">
                    @csrf
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputText">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="inputEmail">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="inputPassword">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Status</label>
                        <div class="col-sm-10">
                            <select id="inputState" class="form-select">
                                <option selected>Choose...</option>
                                <option value="0">Inactive</option>
                                <option value="1">Active</option>
                            </select>
                        </div>

                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Add user</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                    </div>
                </form><!-- End Horizontal Form -->
            </div>
        </div>

    </main><!-- End #main -->


</x-auth.admin-layouts>
