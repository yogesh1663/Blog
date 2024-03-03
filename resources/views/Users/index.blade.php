<x-auth.admin-layouts>
    <main id="main" class="main">

        <x-admin.page-title />
        <div class="card">
            <div class="card-body">
                <x-msg />
                <h5 class="card-title">All users <a href="{{ route('users.create') }}"
                        class="float-end btn btn-primary btn-sm">Add User</a>
                </h5>


                <!-- Table with stripped rows -->
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Email Verified</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->email_verified_at ? 'Yes' : 'No' }}</td>
                                <td>{{ $user->status == '0' ? 'Inactive' : 'Active' }}</td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-success">Edit</a>
                                        <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="float- btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <!-- End Table with stripped rows -->
                <div class="d-flex justify-content-center">
                    {{ $users->links() }}
                </div>
            </div>
        </div>

    </main><!-- End #main -->


</x-auth.admin-layouts>
