@extends('auth.partials.app-auth')
@section('content')
    <style>
        img {
            height: auto;
            display: block;
            margin-left: auto;
            margin-right: auto;
            max-width: 50%;
        }
    </style>
    <div class="row row-cols-1 row-cols-md-1 row-cols-lg-3 row-cols-xl-3 p-5 d-flex justify-content-center">
        @foreach ($cms as $item)
            <div class="col p-4 ">
                <div class="card" style="height: 300px; border-radius: 15px;">
                    <div class="card-body d-flex justify-center">
                        <img src="{{ asset($item->logo) }}" class="img-responsive card-img-top" alt="..." style=" ">
                    </div>
                    <div class="card-body ">
                        <p class="card-text"></p>
                    </div>

                    <div class="card-footer">
                        <div class="btn-group  d-flex justify-center
                            btn-group-toggle"
                            data-toggle="buttons">
                            <a href="{!! $item->app_url !!}" target="_blank" class="btn btn-success"><i
                                    class="bx bx-globe"></i> Go To
                                Website</a>
                            <a href="{{ route('cms.set', $item->id) }}" class="btn btn-primary btn-block"><i
                                    class="bx bx-home-smile"></i> Go To CMS</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
