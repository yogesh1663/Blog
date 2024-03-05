<x-auth.admin-layouts>
    @section('style')
        <!-- Load the stylesheet -->
        <link rel="stylesheet" href="{{ asset('admin-assets/inputtag/simple-tag-input.css') }}" />
        <style>
            #tagsList,
            #tagsInput {
                margin: 1rem auto;
            }
        </style>
    @endsection
    <main id="main" class="main">
        <x-admin.page-title />
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Add Post <a href="{{ route('post.index') }}"
                        class="float-end btn btn-primary btn-sm">Back</a>
                </h5>
                <!-- Horizontal Form -->
                <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <label for="title" class="col-sm-2 col-form-label">Title*</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="title" name="title"
                                value="{{ old('title') }}">
                            @error('title')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>

                    <div class="row mb-3">
                        <label for="slug" class="col-sm-2 col-form-label">Slug</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="slug" name="slug"
                                value="{{ old('slug') }}">
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
                                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                    <div class="row mb-3">
                        <label for="tags" class="col-sm-2 col-form-label">Tags</label>
                        <div class="col-sm-10">
                            {{-- <input class="input-tags" type="text" id="tags" data-role="tagsinput"> --}}
                            {{-- <input type="text" class="form-control" id="tags" name="tags"
                                data-role="tagsinput" value="{{ old('tags') }}"> --}}
                            <label for="tagsList">Tags:</label>
                            <!-- Create an empty list to hold the tags -->
                            <ul id="tagsList"></ul>
                            <!-- Create a text field for the tags input -->
                            <input type="text" class="form-control" id="tagsInput" spellcheck="false" />
                            <span>Type Something and Hit ENTER or SPACE</span>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="image" class="col-sm-2 col-form-label">File Upload</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="file" id="fimage" name="image">
                            @error('image')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>
                    <div class="row mb-3">
                        <label for="metaTitle" class="col-sm-2 col-form-label">Description</label>
                        <div class="col-sm-10">
                            <!-- TinyMCE Editor -->
                            <textarea class="tinymce-editor" name="description">
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
                                value="{{ old('meta_description') }}">
                        </div>
                        @error('meta_description')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="row mb-3">
                        <label for="metaKeywords" class="col-sm-2 col-form-label">Meta Keywords</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="metaKeywords" name="meta_keywords"
                                value="{{ old('meta_keywords') }}">
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
                                <option value="0">Inactive</option>
                                <option value="1">Active</option>
                            </select>
                            @error('status')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Add Category</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                    </div>
                </form><!-- End Horizontal Form -->
            </div>
        </div>

    </main><!-- End #main -->

    @section('script')
        <!-- Load the main JavaScript -->
        <script src="{{ asset('admin-assets/inputtag/simple-tag-input.js') }}"></script>
        <script>
            // options
            let options = {
                inputEl: "tagsInput",
                listEl: "tagsList",
                // enable the autocomplete
                autocompleteSearchList: [
                    "Abarth",
                    "Alfa Romeo",
                    "Aston Martin",
                    "Audi",
                    "Bentley",
                    "BMW",
                    "Bugatti",
                    "Cadillac",
                    "Chevrolet",
                    "Chrysler",
                    "Citroën",
                    "Dacia",
                    "Daewoo",
                    "Daihatsu",
                    "Dodge",
                    "Donkervoort",
                    "DS",
                    "Ferrari",
                    "Fiat",
                    "Fisker",
                    "Ford",
                    "Honda",
                    "Hummer",
                    "Hyundai",
                    "Infiniti",
                    "Iveco",
                    "Jaguar",
                    "Jeep",
                    "Kia",
                    "KTM",
                    "Lada",
                    "Lamborghini",
                    "Lancia",
                    "Land Rover",
                    "Landwind",
                    "Lexus",
                    "Lotus",
                    "Maserati",
                    "Maybach",
                    "Mazda",
                    "McLaren",
                    "Mercedes-Benz",
                    "MG",
                    "Mini",
                    "Mitsubishi",
                    "Morgan",
                    "Nissan",
                    "Opel",
                    "Peugeot",
                    "Porsche",
                    "Renault",
                    "Rolls-Royce",
                    "Rover",
                    "Saab",
                    "Seat",
                    "Skoda",
                    "Smart",
                    "SsangYong",
                    "Subaru",
                    "Suzuki",
                    "Tesla",
                    "Toyota",
                    "Volkswagen",
                    "Volvo"
                ]
            };

            // initialize the tags input, DONE!
            var tagsInputWithSearch = new simpleTagsInput(options);
        </script>
    @endsection
</x-auth.admin-layouts>
