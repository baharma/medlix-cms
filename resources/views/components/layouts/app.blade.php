<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--favicon-->
    <link rel="icon" href="{{ asset('assets/images/favico.png') }} " type="image/png" />
    <!--plugins-->
    <link rel="stylesheet" href="{{ asset('assets/scss/main-scss.css') }}">
    <link href="{{ asset('assets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet" />
    <!-- loader-->
    <link href="{{ asset('assets/css/pace.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('assets/js/pace.min.js') }}"></script>
    <!-- Bootstrap CSS -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/bootstrap-extended.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="{{ asset('assets/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet">
    <!-- Theme Style CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/dark-theme.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/semi-dark.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/header-colors.css') }}" />

    <title> {{ $title ?? '' }} - {{ ActiveApp('name') }} CMS</title>

    <script src="{{ asset('/assets/sweetalert2') }}/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="{{ asset('/assets/sweetalert2') }}/sweetalert2.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/dropify/css/dropify.min.css') }}">
    <script src="{{ asset('assets/js/ckeditor.js') }}"></script>
    @stack('style')
</head>

<body>
    <!--wrapper-->
    <div class="wrapper">
        <!--sidebar wrapper -->
        <div class="sidebar-wrapper" data-simplebar="true">
            <div class="sidebar-header">
                <a href="{{ url('set-cms') }}">
                    <div>
                        {!! appLogo() !!}
                    </div>
                </a>

                <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
                </div>
            </div>
            <!--navigation-->
            <ul class="metismenu" id="menu">
                {{-- <li>
                    <a href="{{ url('/dashboard') }}" wire:navigate>
                        <div class="parent-icon"><i class="bx bx-home-circle"></i>
                        </div>
                        <div class="menu-title">Dashboard</div>
                    </a>
                </li> --}}
                <li class="menu-label">{{ auth()->user()->is_admin ? 'Admin' : '' }} Section</li>
                @if (auth()->user()->is_admin)
                    <livewire:components.admin-sidebar />
                @else
                    <livewire:components.sidebar />
                @endif
                @if (ActiveApp('id') == 1 && checkPreviewMedlinx())
                    <li class="menu-label">Preview</li>
                    <li>
                        <a href="{{ route('preview', strtolower(ActiveApp('name'))) }}" id="logout" type="submit">
                            <div class="parent-icon"><i class="bx bx-window"></i>
                            </div>
                            <div class="menu-title">Preview</div>
                        </a>
                    </li>
                @elseif (ActiveApp('id') == 2 && checkPreviewIzidok())
                    <li class="menu-label">Preview</li>
                    <li>
                        <a href="{{ route('preview', strtolower(ActiveApp('name'))) }}" id="logout" type="submit">
                            <div class="parent-icon"><i class="bx bx-window"></i>
                            </div>
                            <div class="menu-title">Preview</div>
                        </a>
                    </li>
                @elseif (ActiveApp('id') == 3 && checkPreviewIziklaim())
                    <li class="menu-label">Preview</li>
                    <li>
                        <a href="{{ route('preview', strtolower(ActiveApp('name'))) }}" id="logout" type="submit">
                            <div class="parent-icon"><i class="bx bx-window"></i>
                            </div>
                            <div class="menu-title">Preview</div>
                        </a>
                    </li>
                @endif

                <li class="menu-label">End Section</li>
                <form action="{{ route('logout') }}" method="post" id="formLogout">
                    @csrf
                    <li>
                        <a href="#" id="logout" type="submit">
                            <div class="parent-icon"><i class="bx bx-log-out"></i>
                            </div>
                            <div class="menu-title">Logout</div>
                        </a>
                    </li>
                </form>
            </ul>
            <!--end navigation-->
        </div>

        <!--end sidebar wrapper -->
        <!--start header -->
        <livewire:components.navbar />
        <!--end header -->
        <!--start page wrapper -->
        <div class="page-wrapper">
            <div class="page-content">
                <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                    <div class="breadcrumb-title pe-3">{{ $title ?? '' }}</div>
                    <div class="ps-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">{{ $title ?? '' }}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                {{ $slot }}
            </div>
        </div>
        <!--end page wrapper -->
        <!--start overlay-->
        <div class="overlay toggle-icon"></div>
        <!--end overlay-->
        <!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i
                class='bx bxs-up-arrow-alt'></i></a>
        <!--End Back To Top Button-->
        <livewire:components.footer />
    </div>
    <!--end wrapper-->

    <!-- Bootstrap JS -->
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <!--plugins-->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('assets/plugins/dropify/js/dropify.min.js') }}"></script>

    <script>
        $('.dropify').dropify({
            messages: {
                'default': 'Minimum image size 1 MB',
                'replace': 'Drag and drop or click to replace',
                'remove': 'Remove',
                'error': 'Oops! Something wrong happened.'
            }

        });
    </script>

    <!--app JS-->
    <script src="{{ asset('assets/js/app.js') }}"></script>

    @include('layouts.component.sweet-alert')
    @stack('script')
</body>

</html>
