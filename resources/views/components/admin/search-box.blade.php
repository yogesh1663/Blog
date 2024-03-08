<hr>
<form class="row g-3" accept="get">
    <div class="col-1">
        <input type="text" class="form-control" placeholder="Id" value = "{{ Request::get('id') }}">
    </div>
    <div class="col-2">
        <input type="text" class="form-control" placeholder="Title" value = "{{ Request::get('title') }}">
    </div>
    <div class="col-2">
        <input type="text" class="form-control" placeholder="Category" value = "{{ Request::get('category') }}">
    </div>
    <div class="col-2">
        <input type="text" class="form-control" placeholder="Tags" value = "{{ Request::get('tags') }}">
    </div>
    <div class="col-2">
        <select class="form-select">
            <option selected>Published</option>
            <option {{ Request::get('status') }} value = "">One</option>
            <option {{ Request::get('status') }} value = "">Two</option>
        </select>
    </div>
    <div class="col-2">
        <select class="form-select">
            <option selected>Status</option>
            <option {{ Request::get('id') }} value = "">One</option>
            <option {{ Request::get('id') }} value = "">Two</option>
        </select>
    </div>
    <div class="col-auto">
        <button type="submit" class="btn btn-primary">Search</button>
        <button type="reset" class="btn btn-primary">Reset</button>
    </div>
</form>

<hr>
