<div class="pagetitle">
    <h1>{{ Request::segment(1) }}</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">{{ Request::segment(1) }}</a></li>

            @if (Request::segment(3))
                <li class="breadcrumb-item active">{{ Request::segment(3, '') }}</li>
            @else
                <li class="breadcrumb-item"><a href="index.html">{{ Request::segment(2, 'index') }}</a></li>
            @endif
        </ol>
    </nav>
</div><!-- End Page Title -->
