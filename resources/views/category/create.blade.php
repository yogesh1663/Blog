<x-auth.admin-layouts>
    <main id="main" class="main">
        <x-admin.page-title />
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Add Category <a href="{{ route('category.index') }}"
                        class="float-end btn btn-primary btn-sm">Back</a>
                </h5>
                <!-- Horizontal Form -->
                <form action="{{ route('category.store') }}" method="POST">
                    @csrf
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Name*</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputText" name="name"
                                value="{{ old('name') }}">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="title" class="col-sm-2 col-form-label">Title*</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="title" name="title"
                                value="{{ old('title') }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="slug" class="col-sm-2 col-form-label">Slug</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="slug" name="slug"
                                value="{{ old('slug') }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="metaTitle" class="col-sm-2 col-form-label">Meta Title*</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="metaTitle" name="meta_title"
                                value="{{ old('meta_title') }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="metaDescription" class="col-sm-2 col-form-label">Meta Description</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="metaDescription" name="meta_description"
                                value="{{ old('meta_description') }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="metaKeywords" class="col-sm-2 col-form-label">Meta Keywords</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="metaKeywords" name="meta_keywords"
                                value="{{ old('meta_keywords') }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Status*</label>
                        <div class="col-sm-10">
                            <select id="inputState" class="form-select" name="status">
                                <option selected>Choose...</option>
                                <option value="0">Inactive</option>
                                <option value="1">Active</option>
                            </select>
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


</x-auth.admin-layouts>
