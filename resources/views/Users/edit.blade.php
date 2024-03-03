<x-auth.admin-layouts>
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Users</a></li>
                    <li class="breadcrumb-item active">Edit</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <div class="card">
            <div class="card-body">

                <h5 class="card-title">Edit user <a href="{{ route('users.index') }}"
                        class="float-end btn btn-primary btn-sm">Back</a>
                </h5>
                <!-- Horizontal Form -->
                <form action="{{ route('users.update', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputText" name="name"
                                value="{{ old('name') ?? $user->name }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="inputEmail" name="email"
                                value="{{ old('email') ?? $user->email }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="inputPassword" name="password">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Status</label>
                        <div class="col-sm-10">
                            <select id="inputState" class="form-select" name="status">
                                <option selected>Choose...</option>
                                <option value="0" {{ $user->status == 0 ? 'selected' : '' }}>Inactive</option>
                                <option value="1" {{ $user->status == 1 ? 'selected' : '' }}>Active</option>
                            </select>
                        </div>

                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Update user</button>
                    </div>
                </form><!-- End Horizontal Form -->
            </div>
        </div>

    </main><!-- End #main -->


</x-auth.admin-layouts>
