@push('style')
    <style>
        .image {
            text-align: center;
        }
    </style>
@endpush
<div>
    <div class="card p-3">
        <div class="card-header">
            <div class="d-flex justify-content-start">
                <a href="{{ route('news') }}" class="h5">
                    <i class='bx bx-arrow-back'></i> Back
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="d-flex justify-content-center">
                <h5>{{ $news->title }}</h5>
            </div>
            <div class="d-flex justify-content-center">
                <div class="container-fluid">
                    {!! $news->description !!}
                </div>
            </div>
        </div>
    </div>
</div>
