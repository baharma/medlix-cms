<div class="mb-20" id="home">
    <div class="bgi-no-repeat bgi-size-contain bgi-position-x-center bgi-position-y-bottom bg-hero">
        <div class="landing-header" data-kt-sticky="true" data-kt-sticky-name="landing-header"
            data-kt-sticky-offset="{default: '200px', lg: '300px'}">
            <div class="container">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center">
                        <button class="btn btn-icon btn-active-color-primary me-3 d-flex d-lg-none"
                            id="kt_landing_menu_toggle">
                            <i class="ki-duotone ki-abstract-14 fs-2hx">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                        </button>
                        <a href="{{ url('/') }}">
                            <img alt="Logo" src="{{ asset('preview/izidok/images/logos/logo_izidok-white.png') }}"
                                class="logo-default h-25px h-lg-25px" />
                            <img alt="Logo" src="{{ asset('preview/izidok/images/logos/logo_izidok-white.png') }}"
                                class="logo-sticky h-20px h-lg-25px" />
                        </a>
                    </div>
                    <div class="d-lg-block" id="kt_header_nav_wrapper">
                        <div class="d-lg-block p-5 p-lg-0" data-kt-drawer="true" data-kt-drawer-name="landing-menu"
                            data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
                            data-kt-drawer-width="200px" data-kt-drawer-direction="start"
                            data-kt-drawer-toggle="#kt_landing_menu_toggle" data-kt-swapper="true"
                            data-kt-swapper-mode="prepend"
                            data-kt-swapper-parent="{default: '#kt_body', lg: '#kt_header_nav_wrapper'}">
                            <div class="menu menu-column flex-nowrap menu-rounded menu-lg-row menu-title-gray-600 menu-state-title-primary nav nav-flush fs-5 fw-semibold"
                                id="kt_landing_menu">
                                <div class="menu-item">
                                    <a class="menu-link nav-link py-3 px-4 px-xxl-6 text-center" href="#about"
                                        data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">Tentang Kami</a>
                                </div>
                                {{-- <div class="menu-item">
                                    <a class="menu-link nav-link py-3 px-4 px-xxl-6 text-center" href="#team" data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">Tim</a>
                                </div> --}}
                                <div class="menu-item">
                                    <a class="menu-link nav-link py-3 px-4 px-xxl-6 text-center" href="#keunggulan"
                                        data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">Keunggulan</a>
                                </div>
                                <div class="menu-item">
                                    <a class="menu-link nav-link py-3 px-4 px-xxl-6 text-center" href="#news"
                                        data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">News & Update</a>
                                </div>
                                <div class="menu-item">
                                    <a class="menu-link nav-link py-3 px-4 px-xxl-6 text-center" href="#pricing"
                                        data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">Harga</a>
                                </div>
                                <div class="menu-item">
                                    <a class="menu-link nav-link py-3 px-4 px-xxl-6 text-center" href="#testimoni"
                                        data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">Testimoni</a>
                                </div>
                                <div class="menu-item">
                                    <a class="menu-link nav-link py-3 px-4 px-xxl-6 text-center" href="#event"
                                        data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">Event</a>
                                </div>
                                <div class="menu-item">
                                    <a class="menu-link nav-link py-3 px-4 px-xxl-6 text-center" href="#contact"
                                        data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">Hubungi Kami</a>
                                </div>
                                <div class="menu-item d-block d-sm-none">
                                    <a href="https://faskes.izidok.id/register" target="_blank"
                                        class="btn btn-sm w-100 mb-3 btn-primary me-3">Registrasi</a>
                                </div>
                                <div class="menu-item d-block d-sm-none">
                                    <a href="https://faskes.izidok.id/login" target="_blank"
                                        class="btn btn-sm w-100 mb-3 btn-success">Masuk</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex text-end ms-1 d-none d-sm-block">
                        {{-- <a href="https://faskes.izidok.id/register" target="_blank"
                            class="btn btn-sm btn-primary me-3">Registrasi</a> --}}
                        {{-- <a href="https://faskes.izidok.id/login" target="_blank"
                            class="btn btn-sm btn-success">Masuk</a> --}}
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex flex-column w-100 min-h-350px min-h-lg-500px px-9">
            <div class="row justify-content-center">
                <div class="col-xxl-6 col-sm-8 col-12">
                    <div class="text-center mb-25 mb-lg-10 py-10 py-lg-20">
                        <h4 class="text-white fw-bold fs-md-2x mb-10">{{ $hero['title'] }}</h4>
                        <h5 class="text-white">{{ $hero['subtitle'] }}</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex flex-center flex-wrap position-relative px-5">
        <div class="row justify-content-center">
            <div class="col-xxl-6 col-md-8 col-12">
                <div class="d-flex flex-center m-3 m-md-6">
                    <img src="{{ asset('preview/izidok/images/play.png') }}" class="position-absolute play-image" />
                </div>
                <div class="d-flex flex-center m-3 m-md-6">
                    <img src="{{ asset('preview/izidok/images/hero/hero-image.png') }}"
                        class="position-absolute hero-image" />
                </div>
                <div class="d-flex flex-center m-3 m-md-6">
                    <img src="{{ asset('preview/izidok/images/hero/float-left-top.png') }}"
                        class="position-absolute hero-float-left-top" />
                </div>
                <div class="d-flex flex-center m-3 m-md-6">
                    <img src="{{ asset('preview/izidok/images/hero/float-left-bottom.png') }}"
                        class="position-absolute hero-float-left-bottom" />
                </div>
                <div class="d-flex flex-center m-3 m-md-6">
                    <img src="{{ asset('preview/izidok/images/hero/float-right-top.png') }}"
                        class="position-absolute hero-float-right-top" />
                </div>
                <div class="d-flex flex-center m-3 m-md-6">
                    <img src="{{ asset('preview/izidok/images/hero/float-right-bottom.png') }}"
                        class="position-absolute hero-float-right-bottom" />
                </div>
            </div>
        </div>
    </div>
</div>
@push('script')
    <script>
        $('.play-image').click(function() {
            const url = "{{ $hero['button_url'] }}"
            window.open(url, '_blank');
        });
    </script>
@endpush
