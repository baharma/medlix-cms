(function () {
  "use strict";

  $('#contact-form').validate({
    rules: {
        name: {
            required: true,
        },
        email: {
            required: true,
            email: true,
        },
        institusi: {
            required: true,
        },
        subjek: {
            required: true,
        },
        pesan: {
            required: true,
        }
    },
    messages: {
        name: {
            required: "Nama harus diisi",
        },
        email: {
            required: "Email harus diisi",
            email: "Format email salah",
        },
        institusi: {
            required: "Institusi harus dipilih",
        },
        subjek: {
            required: "Subjek harus diisi",
        },
        pesan: {
            required: "Pesan harus diisi",
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
        if(!grecaptcha.getResponse()) {
            Swal.fire({
                title: "Oops",
                html: "Invalid recaptcha",
                icon: "error"
            })
            return false;
        }

        $('#overlay').show()
        $.ajax({
            url: '/send-mail/hubungi-kami',
            method: 'POST',
            data: {
                name: $('#contact-form #name').val(),
                email: $('#contact-form #email').val(),
                institusi: $('#contact-form #institusi').val(),
                subjek: $('#contact-form #subjek').val(),
                pesan: $('#contact-form #pesan').val(),
            },
            success: function(res) {
                $('#overlay').hide()
                if(res.status) {
                    Swal.fire({
                        title: "Pesan Terkirim",
                        html: "Terima kasih sudah menghubungi iziklaim.<br>Tim kami akan menghubungi Anda dalam waktu 1x24 jam",
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
})();
