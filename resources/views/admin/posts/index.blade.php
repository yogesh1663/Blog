<x-auth.admin-layouts>
    <main id="main" class="main">
        <x-admin.page-title />
        <div class="card">
            <div class="card-body">
                <x-msg />
                <h5 class="card-title">All Posts <a href="{{ route('post.create') }}"
                        class="float-end btn btn-primary btn-sm">Add Post</a>
                </h5>


                <!-- Table with stripped rows -->
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">slug</th>
                            <th scope="col">Title</th>
                            <th scope="col">Meta Title</th>
                            <th scope="col">Mega Description</th>
                            <th scope="col">Mega Keywords</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->title }}</td>
                                <td>{{ $category->slug }}</td>
                                <td>{{ $category->meta_title }}</td>
                                <td>{{ $category->meta_description }}</td>
                                <td>{{ $category->meta_keywords }}</td>
                                <td>{{ $category->status == 0 ? 'inactive' : 'active' }}</td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="{{ route('category.edit', $category->id) }}"
                                            class="btn btn-success btn-sm">Edit</a>
                                        <form action="{{ route('category.destroy', $category->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="float- btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <!-- End Table with stripped rows -->
                <div class="d-flex justify-content-center">
                    {{ $categories->links() }}
                </div>
            </div>
        </div>

    </main><!-- End #main -->


</x-auth.admin-layouts>
