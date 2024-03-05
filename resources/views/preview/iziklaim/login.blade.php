<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <title>{{ env('APP_NAME').' - '.$title }}</title>
        <meta content="" name="description">
        <meta content="" name="keywords">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="{{ asset('favicon.png') }}" rel="icon">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
        <link href="{{ asset('css/aos.css') }}" rel="stylesheet">
        <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
        <link href="{{ asset('css/bootstrap-icons.css') }}" rel="stylesheet">
        <link href="{{ asset('css/boxicons.css') }}" rel="stylesheet">
        <link href="{{ asset('css/glightbox.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/remixicon.css') }}" rel="stylesheet">
        <link href="{{ asset('css/swiper-bundle.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
        <script src="{{ asset('js/sweetalert.min.js') }}"></script>
        <style>
            body{
                font-size: 14px;
            }
            .logo-iziklaim-login{
                width: 200px;
            }
            .btn-login{
                background-color: #2487ce;
                border: 0px;
            }
            .btn-login:hover{
                background-color: #3194db;
            }
            .w-30px{
                width: 30px;
            }
            .mt-3rem{
                margin-top: 3rem;
            }
            .mb-2rem{
                margin-bottom: 2rem;
            }
            .info{
                color: #2474ac;
            }
            .info i{
                color: #2487ce;
            }
            .login{
                position: relative;
                overflow: hidden;
                background-color: rgb(255 255 255 / 1);
                padding-left: 2rem;
                padding-right: 2rem;
                height: 100vh;
            }
            .login:before {
                content: "";
                position: absolute;
                top: 0px;
                bottom: 0px;
                left: 0px;
                margin-top: -28%;
                margin-bottom: -15%;
                margin-left: -13%;
                width: 65%;
                --tw-rotate: -4deg;
                transform: translate(0,0) rotate(var(--tw-rotate)) skewX(0) skewY(0) scaleX(1) scaleY(1);
                border-radius: 100%;
                background-color: rgb(9 78 144 / 0.2);
                display: none;
            }
            .login:after {
                content: "";
                position: absolute;
                top: 0px;
                bottom: 0px;
                left: 0px;
                margin-top: -20%;
                margin-bottom: -12%;
                margin-left: -13%;
                width: 65%;
                --tw-rotate: -4deg;
                transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
                border-radius: 100%;
                background: linear-gradient(180deg, rgba(0,67,135,1) 0%, rgba(43,147,200,1) 100%);
                filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#004387",endColorstr="#2b93c8",GradientType=1);
                display: none;
            }
            .login-img {
                content: " ";
                position: absolute;
                height: 98%;
                width: 49%;
                bottom: 0;
                left: 0;
                background-image: url(img/img_login.png);
                background-size: cover;
                background-position: right;
                z-index: 50;
                display: none;
            }
            .field-icon {
                float: right;
                margin-right: 10px;
                margin-top: -29px;
                position: relative;
                z-index: 2;
                font-size: 18px;
                cursor: pointer;
            }
            .form-control{
                line-height: 1;
                font-size: 14px;
            }

            @media (min-width: 576px) {
                .mx-sm-4rem {
                    margin-left: 4rem !important;
                    margin-right: 4rem !important;
                }
            }
            @media (min-width: 992px) {
                .login-img {display: block;}
                .login:before {display: block;}
                .login:after {display: block;}
            }
        </style>
    </head>
    <body>
        <div id="overlay">
            <div id="text-overlay"><img src="{{ asset('img/loading-screen-iziklaim.gif') }}" class="img-fluid"></div>
        </div>
        <div class="login">
            <div class="container-fluid">
                <div class="row mb-4">
                    <div class="col-lg-6">
                        <div class="login-img"></div>
                    </div>
                    <div class="col-lg-6">
                        <form method="post" action="{{ route('login.process') }}" role="form" class="mt-3rem mb-2rem my-xl-4rem mx-sm-4rem" id="form-login">
                            <div class="text-center mb-5">
                                <img class="img-fluid logo-iziklaim-login" src="{{ asset('img/logo_iziklaim_tagline.png') }}" alt="iziklaim logo">
                            </div>
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group mb-3">
                                        <label class="form-label required">Username</label>
                                        <input type="text" class="form-control" placeholder="Username" name="username" id="username" value="{{ old('username') }}" required>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label class="form-label required">Password</label>
                                        <input type="password" class="form-control" placeholder="Password" name="password" id="password" value="{{ old('password') }}" required>
                                        <span toggle="#password" class="bi bi-eye-fill field-icon toggle-password"></span>
                                    </div>
                                </div>
                                <div class="col-12 mb-3">
                                    <i><a href="#" data-bs-toggle="modal" data-bs-target="#forgot-password-modal">Lupa Password? Klik disini</a></i>
                                </div>
                                <div class="col-12 mb-3">
                                    <button class="w-100 btn btn-sm btn-primary btn-login mb-2" type="submit">Login</button>
                                    <a href="{{ route('home') }}"><button class="w-100 btn btn-sm btn-secondary text-white" type="button">Kembali</button></a>
                                </div>
                            </div>
                        </form>
                        <div class="row mb-2">
                            <div class="col-12">
                                <div class="d-flex justify-content-center">
                                    <a class="mx-2" href="https://www.facebook.com/iziklaim/" target="_blank"><img src="{{ asset('img/icons/icon-facebook-white.png') }}" alt="icon facebook" class="w-30px my-auto sosmed-icon-facebook"></a>
                                    <a class="mx-2" href="https://www.youtube.com/@medlinxasiateknologi1699/" target="_blank"><img src="{{ asset('img/icons/icon-youtube-white.png') }}" alt="icon youtube" class="w-30px my-auto sosmed-icon-youtube"></a>
                                    <a class="mx-2" href="https://www.instagram.com/iziklaim/" target="_blank"><img src="{{ asset('img/icons/icon-instagram-white.png') }}" alt="icon instagram" class="w-30px my-auto sosmed-icon-instagram"></a>
                                    <a class="mx-2" href="https://twitter.com/iziklaim/" target="_blank"><img src="{{ asset('img/icons/icon-twitter-white.png') }}" alt="icon twitter" class="w-30px my-auto sosmed-icon-twitter"></a>
                                    <a class="mx-2" href="https://www.linkedin.com/company/iziklaim/" target="_blank"><img src="{{ asset('img/icons/icon-linkedin-white.png') }}" alt="icon linkedin" class="w-30px my-auto sosmed-icon-linkedin"></a>
                                    <a class="mx-2" href="https://iziklaim.co.id" target="_blank"><img src="{{ asset('img/icons/icon-web-white.png') }}" alt="icon web" class="w-30px my-auto sosmed-icon-web"></a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="text-center info">
                                    <div class="my-auto mb-2">Customer Care Medlinx</div>
                                    <div>
                                        <i class="bi bi-telephone"></i> (021) 80627982 |
                                        <i class="bi bi-whatsapp"></i> 0815 8454 8909 | <span class="whitespace-nowrap"><i class="bi bi-envelope"></i> customercare@medlinx.co.id</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="forgot-password-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form id="form-forgot-password">
                            <div class="modal-header">
                                <h5 class="col-11 modal-title text-center" id="exampleModalLabel">Lupa Password</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row g-3 align-items-center">
                                    <div class="col-auto">
                                        <label for="username" class="col-form-label">Username</label>
                                    </div>
                                    <div class="col">
                                        <input type="text" name="username_forgot" id="username_forgot" class="form-control" placeholder="Username">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary">Proses</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div style="display:none;">
            <form id="form-hidden" action="" method="post">
                <input type="text" name="txtusername" id="username-hide" value="">
                <input type="password" name="txtpassword" id="password-hide" value="">
                <button type="submit" class="btn btn-primary">test login</button>
            </form>
        </div>
        <script src="{{ asset('js/jquery-3.5.1.js') }}"></script>
        <script src="{{ asset('js/purecounter_vanilla.js') }}"></script>
        <script src="{{ asset('js/aos.js') }}"></script>
        <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('js/glightbox.min.js') }}"></script>
        <script src="{{ asset('js/isotope.pkgd.min.js') }}"></script>
        <script src="{{ asset('js/swiper-bundle.min.js') }}"></script>
        <script src="{{ asset('js/jquery.validate.js') }}"></script>
        <script src="{{ asset('js/main.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
        <script>
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        </script>
        <script src="{{ asset('js/contact-form.js') }}"></script>
        <script>
            $('#form-login').validate({
                rules: {
                    username: 'required',
                    password: 'required',
                },
                messages: {
                    username: {
                        required: 'Username harus diisi'
                    },
                    password: {
                        required: 'Password harus diisi'
                    }
                },
                errorPlacement: function(error, element) {
                    var placement = $(element).data('errorPlacement');
                    if(placement) {
                        $(placement).append(error);
                    }
                    else {
                        error.insertAfter(element);
                    }
                }
            });

            $(".toggle-password").click(function() {
                $(this).toggleClass("bi-eye-fill bi-eye-slash-fill");
                var input = $($(this).attr("toggle"));
                if (input.attr("type") == "password") {
                    input.attr("type", "text");
                } else {
                    input.attr("type", "password");
                }
            });

            if ("{{ Session::get('error') }}") {
                Swal.fire({
                    title: 'Oops!',
                    html: "{!! Session::get('error') !!}",
                    icon: 'warning'
                })
            }

            if ("{{ Session::get('redirect') }}") {
                let sess = "{{ Session::get('redirect') }}".split('|');
                let url_v3 = "{{ env('APP_URL_CLAIM_V3') }}"
                console.log(sess)
                $('#form-hidden #username-hide').val(sess[0])
                $('#form-hidden #password-hide').val(sess[1])
                $('#form-hidden').attr('action',url_v3)
                $('#form-hidden').submit()
            }

            $('#form-forgot-password').validate({
                rules: {
                    username_forgot: {
                        required: true
                    }
                },
                messages: {
                    username_forgot: {
                        required: 'Username harus diisi',
                    },
                },
                errorPlacement: function(error, element) {
                    var placement = $(element).data('errorPlacement');
                    if(placement) {
                        $(placement).append(error);
                    }
                    else {
                        error.insertAfter(element);
                    }
                },
                submitHandler: function() {
                    $('#overlay').show()
                    $.ajax({
                        url: "{{ route('forgot-password') }}",
                        method: 'POST',
                        data: {
                            username: $('#username_forgot').val(),
                        },
                        success: function(res) {
                            $('#overlay').hide()
                            if(!res.status) {
                                Swal.fire({
                                    title: 'Oops!',
                                    html: res.message,
                                    icon: 'warning'
                                })
                            } else {
                                let emails = res.email.join(', ')
                                Swal.fire({
                                    title: 'Sukses',
                                    html: `Password baru telah dikirim ke alamat email marketing di alamat email ${emails}<br><br>Hubungi Marketing Anda untuk Mengetahui Password Baru Anda.`,
                                    icon: 'success'
                                }).then(function() {
                                    $('#username_forgot').val('');
                                    $('#forgot-password-modal').modal('toggle');
                                });
                            }
                        }
                    })
                }
            });
        </script>
    </body>
</html>