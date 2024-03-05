<x-auth.admin-layouts>
    @section('style')
        <!-- Load the stylesheet -->
        <link rel="stylesheet" href="{{ asset('admin-assets/tagsinput/dist/bootstrap-tagsinput.css') }}" />
    @endsection
    <main id="main" class="main">
        <x-admin.page-title />
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ Request::segment(3) }} {{ Request::segment(1) }} <a
                        href="{{ route('post.index') }}" class="float-end btn btn-primary btn-sm">Back</a>
                </h5>
                <!-- Horizontal Form -->
                <form action="{{ route('post.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <label for="title" class="col-sm-2 col-form-label">Title*</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="title" name="title"
                                value="{{ old('title') ?? $post->title }}">
                            @error('title')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>

                    <div class="row mb-3">
                        <label for="slug" class="col-sm-2 col-form-label">Slug</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="slug" name="slug"
                                value="{{ old('slug') ?? $post->slug }}">
                        </div>
                        @error('slug')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="row mb-3">
                        <label for="category" class="col-sm-2 col-form-label">Category*</label>
                        <div class="col-sm-10">
                            <select class="form-select" name="category">

                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ $post->category_id == $category->id ? 'selected' : '' }}>
                                        {{ $category->title }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                    <div class="row mb-3">
                        <label for="tags" class="col-sm-2 col-form-label">Tags</label>
                        <div class="col-sm-10">
                            @php
                                $arr = '';
                                foreach ($post->tags as $tag) {
                                    $arr .= $tag->name . ', ';
                                }
                            @endphp
                            <input type="text" data-role="tagsinput" id="tags" name="tags"
                                value="{{ $arr }} " />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="image" class="col-sm-2 col-form-label">File Upload</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="file" id="fimage" name="image">
                            @error('image')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                            <img src="{{ asset('storage/post/' . $post->image) }}" alt="">
                        </div>

                    </div>
                    <div class="row mb-3">
                        <label for="metaTitle" class="col-sm-2 col-form-label">Description</label>
                        <div class="col-sm-10">
                            <!-- TinyMCE Editor -->
                            <textarea class="tinymce-editor" name="description">
                                {{ $post->description }}
                            </textarea>
                            <!-- End TinyMCE Editor -->
                            @error('description')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>
                    <div class="row mb-3">
                        <label for="metaDescription" class="col-sm-2 col-form-label">Meta Description</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="metaDescription" name="meta_description"
                                value="{{ old('meta_description') ?? $post->meta_description }}">
                        </div>
                        @error('meta_description')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="row mb-3">
                        <label for="metaKeywords" class="col-sm-2 col-form-label">Meta Keywords</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="metaKeywords" name="meta_keywords"
                                value="{{ old('meta_keywords') ?? $post->meta_keywords }}">
                            @error('meta_keywords')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Status*</label>
                        <div class="col-sm-10">
                            <select id="inputState" class="form-select" name="status">
                                <option value="">Choose...</option>
                                <option value="0" {{ $post->status == 0 ? 'selected' : '' }}>Inactive</option>
                                <option value="1" {{ $post->status == 1 ? 'selected' : '' }}>Active</option>
                            </select>
                            @error('status')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Edit post</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                    </div>
                </form><!-- End Horizontal Form -->
            </div>
        </div>

    </main><!-- End #main -->
    @section('script')
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="{{ asset('admin-assets/tagsinput/dist/bootstrap-tagsinput.js') }}"></script>
        <script>
            $("#tags").tagsinput();
        </script>
    @endsection
</x-auth.admin-layouts>
