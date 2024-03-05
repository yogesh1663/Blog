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
                            <th scope="col">Title</th>
                            <th scope="col">Slug</th>
                            <th scope="col">Category</th>
                            <th scope="col">Tags</th>
                            <th scope="col">Image</th>
                            <th scope="col">Description</th>
                            <th scope="col">Mega Description</th>
                            <th scope="col">Mega Keywords</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->slug }}</td>
                                <td>{{ $post->category->name }}</td>
                                <td>tags</td>
                                <td><img src="{{ asset('storage/post/' . $post->image) }}" alt="image" height="100"
                                        width="100">
                                </td>
                                <td>{{ $post->description }}</td>
                                <td>{{ $post->meta_description }}</td>
                                <td>{{ $post->meta_keywords }}</td>
                                <td>{{ $post->status == 0 ? 'inactive' : 'active' }}</td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="{{ route('post.edit', $post->id) }}"
                                            class="btn btn-success btn-sm">Edit</a>
                                        <form action="{{ route('post.destroy', $post->id) }}" method="POST">
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
                    {{ $posts->links() }}
                </div>
            </div>
        </div>

    </main><!-- End #main -->


</x-auth.admin-layouts>
