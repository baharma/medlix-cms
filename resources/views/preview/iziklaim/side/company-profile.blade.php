@extends('landing-side')

@section('css')
    <script src="{{ asset('preview/iziklaim/js/sweetalert.min.js') }}"></script>
    {!! htmlScriptTagJsApi() !!}
@endsection

@section('content')
    <section id="download-profile" class="download-profile">
        <div class="container" data-aos="fade-up">
            <div class="section-title pb-0">
                <h2>Silakan isi data dibawah ini dengan benar.</h2>
                <p>Company Profile akan dikirim melalui email. Jika terjadi kendala, segera hubungi kami.</p>
            </div>
        </div>
    </section>
    <section id="download-form" class="download-form section-bg">
        <div class="container" data-aos="fade-up">
            <div class="box-form">
                <form id="profile-form" action="#" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="" class="form-label required">Nama Lengkap</label>
                                <input type="text" class="form-control" name="fullname" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="" class="form-label required">No. Handphone / WhatsApp</label>
                                <input type="text" class="form-control number" name="handphone" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="" class="form-label required">Email</label>
                                <input type="email" class="form-control" name="email" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="" class="form-label">Nama Perusahaan</label>
                                <input type="text" class="form-control" name="company_name">
                            </div>
                            <div class="form-group mb-3">
                                <label for="" class="form-label">Posisi Anda di Perusahaan</label>
                                <input type="text" class="form-control" name="position">
                            </div>
                            <div class="form-group mb-3">
                                {!! htmlFormSnippet() !!}
                                @if ($errors->has('g-recaptcha-response'))
                                    <div>
                                        <small class="text-danger">{{ $errors->first('g-recaptcha-response') }}</small>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <button type="submit" class="btn-download">Kirim</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script>
        $('#profile-form').validate({
            rules: {
                fullname: {
                    required: true,
                },
                email: {
                    required: true,
                    email: true,
                },
                handphone: {
                    required: true,
                }
            },
            messages: {
                fullname: {
                    required: "Nama Lengkap harus diisi",
                },
                email: {
                    required: "Email harus diisi",
                    email: "Format email salah",
                },
                handphone: {
                    required: "No Handphone harus diisi",
                }
            },
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            },
            submitHandler: function() {
                if (!grecaptcha.getResponse()) {
                    $('#recaptcha-error').css({
                        display: 'block'
                    }).html('Captcha harus dipilih');
                    Swal.fire({
                        title: "Oops",
                        html: "Invalid recaptcha",
                        icon: "error"
                    })
                    return false;
                }

                $('#overlay').show()
                $.ajax({
                    url: '/send-mail/download-profile',
                    method: 'POST',
                    data: {
                        fullname: $('input[name=fullname]').val(),
                        handphone: $('input[name=handphone]').val(),
                        email: $('input[name=email]').val(),
                        company_name: $('input[name=company_name]').val(),
                        position: $('input[name=position]').val(),
                    },
                    success: function(res) {
                        $('#overlay').hide()
                        if (res.status) {
                            Swal.fire({
                                title: "Pesan Terkirim",
                                html: "Terima Kasih atas ketertarikan Anda terhadap iziklaim. <br> Permintaan Anda akan kami proses dan tim kami akan segera menghubungi Anda.",
                                icon: "success"
                            }).then(function() {
                                window.location = "/";
                            });
                        } else {
                            Swal.fire({
                                title: "Oops",
                                html: res.message,
                                icon: "error"
                            })
                        }
                    }
                })
            }
        });

        $(".number").on("keypress keyup blur", function(event) {
            $(this).val($(this).val().replace(/[^\d].+/, ""));
            if ((event.which < 48 || event.which > 57)) {
                event.preventDefault();
            }
        });
    </script>
@endsection
