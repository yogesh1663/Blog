@if (session('error'))
    <div class="alert alert-danger mt-2 mb-2">{{ session('error') }}</div>
@endif
@if (session('success'))
    <div class="alert alert-success mt-2 mb-2">{{ session('success') }}</div>
@endif
