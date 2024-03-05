

<style>
    .image {
        text-align: center;
    }

    img {
        max-width: 750px;
    }
</style>

    <div id="kt_app_content" class="app-content flex-column-fluid" style="margin-top: 200px">
        <div id="kt_app_content_container" class="app-container container-fluid">
            <div class="container">
                <div class="d-flex flex-column flex-xl-row">
                    <div class="flex-lg-row-fluid me-xl-15">
                        <div class="mb-10">
                            <div class="mb-8">
                                <h1 href="#" class="text-dark text-center fw-bold">{{ $article->title }}</h1>
                            </div>
                            <div class="fs-5 text-justify">
                                {!! $article->description !!}
                            </div>
                        </div>


                    @if (isset($type) && $type == 'prev')
                    <a href="{{ route('medlinx.home') }}" class="fs-6 fw-semibold link-primary">Kembali</a>
                    @else
                    <a href="{{ route('preview', 'medlinx') }}" class="fs-6 fw-semibold link-primary">Kembali</a>

                    @endif

                    </div>
                </div>
            </div>
        </div>
    </div>

