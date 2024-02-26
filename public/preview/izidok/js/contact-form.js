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
          phone: {
              required: true,
          },
          pilihan: {
              required: true,
          },
          profesi: {
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
          phone: {
              required: "No HP harus diisi",
          },
          pilihan: {
              required: "Minimal pilih salah 1",
          },
          profesi: {
              required: "Profesi harus diisi",
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
          $('#overlay').show()
          $.ajax({
              url: '/send-mail',
              method: 'POST',
              data: {
                  name: $('#contact-form #name').val(),
                  phone: $('#contact-form #phone').val(),
                  email: $('#contact-form #email').val(),
                  pilihan: $("#contact-form #pilihan").val(),
                  profesi: $('#contact-form #profesi').val(),
                  pesan: $('#contact-form #pesan').val(),
              },
              success: function(res) {
                  $('#overlay').hide()
                  if(res.status) {
                      Swal.fire({
                          title: "Pesan Terkirim",
                          html: "Terima kasih sudah menghubungi Izidok.<br>Pesan Anda akan kami proses dan tim kami akan menghubungi Anda dalam waktu 1x24 jam",
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
  