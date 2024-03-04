<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width">
  <meta name="format-detection" content="telephone=no">
  <!--[if !mso]>
      <!-->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800,300&subset=latin" rel="stylesheet" type="text/css">
  <!--<![endif]-->
  <style type="text/css">
    *{
        margin:0;
        padding:0;
        font-family:Calibri;
        font-size:14px;
        line-height:1.6;
    }
    img{
        max-width:100%;
    }
    body{
        -webkit-font-smoothing:antialiased;
        -webkit-text-size-adjust:none;
        width:100%!important;
        height:100%;
        font-family:Calibri;
    }
    a{
        color:#348eda;
    }
    .last{
        margin-bottom:0;
    }
    .first{
        margin-top:0;
    }
    .padding{
        padding:10px 0;
    }
    table.body-wrap{
        width:100%;
        padding:0px;
        padding-top:20px;
        margin:0px;
    }
    table.body-wrap .container{
        border:1px solid #f0f0f0;
    }
    table.footer-wrap{
        width:100%;
        clear:both!important;
    }
    .footer-wrap .container p{
        font-size:12px;
        color:#666;
    }
    table.footer-wrap a{
        color:#999;
    }
    .footer-content{
        margin:0px;
        padding:0px;
    }
    h1,h2,h3{
        color:#660099;
        font-family:'OpenSans-Light', 'Helvetica Neue', Helvetica, Arial, 'Lucida Grande', sans-serif;
        line-height:1.2;
        margin-bottom:15px;
        margin:40px 0 10px;
        font-weight:200;
    }
    h1{
        font-family:'Open Sans Light';
        font-size:45px;
    }
    h2{
        font-size:28px;
    }
    h3{
        font-size:22px;
    }
    p,ul,ol{
        margin-bottom:10px;
        font-weight:normal;
        font-size:14px;
    }
    ul li,ol li{
        margin-left:5px;
        list-style-position:inside;
    }
    .container{
        display:block!important;
        max-width:600px!important;
        margin:0 auto!important;
        clear:both!important;
    }
    .body-wrap .container{
        padding:0px;
    }
    .content,.footer-wrapper{
        max-width:600px;
        margin:0 auto;
        padding:20px 33px 10px 37px;
        display:block;
    }
    .content table{
        width:100%;
    }
    .content-message p{
        margin:20px 0px 20px 0px;
        padding:0px;
        font-size:20px;
        line-height:38px;
        font-family:'OpenSans-Light',Calibri, Arial, sans-serif;
    }
    .preheader{
        display:none !important;
        visibility:hidden;
        opacity:0;
        color:transparent;
        height:0;
        width:0;
    }
  </style>
</head>

<body bgcolor="#f6f6f6">
  <!-- body -->
  <table class="body-wrap" width="600">
    <tr>
      <td class="container" bgcolor="#FAFAFA">
        <!-- content -->
        <table border="0" cellpadding="0" cellspacing="0" class="contentwrapper" width="600">
          <tr>
            <td style="height:25px;">
              <img width="600" src="{{url('img/header-emailmarketing.png')}}">
            </td>
          </tr>
          <tr>
            <td>
              <div class="content">
                <table class="content-message">
                  <tr>
                    <td align="left" style="text-align: center;">
                      <b>Yth Bapak/Ibu Marketing {{$data['provider']}}</b><br><br>
                        Permohonan permintaan reset Password iziklaim {{$data['provider']}} telah berhasil kami proses. Berikut Password Baru iziklaim Anda:<br><br>
                    </td>
                  </tr>
                  <tr>
                    <td class="content-message" style="text-align: justify;">
                      <center>
                        <table border=0 style="width:70%">
                          <tr>
                              <td width="100">Username</td>
                              <td> : </td>
                              <td align="right"><b>{{$data['username']}}</b></td>
                            </tr>
                            <tr>
                              <td>Lokasi</td>
                              <td> : </td>
                              <td align="right"><b>{{$data['lokasi']}}</b></td>
                            </tr>
                            <tr>
                              <td>Password</td>
                              <td> : </td>
                              <td align="right"><b>{{$data['tmpPass']}}</b></td>
                          </tr>
                        </table>
                      </center>
                    </td>
                  </tr>
                  <tr>
                    <td class="content-message" style="text-align: center;">
                        <br>
                        Password baru ini hanya berlaku selama 3 x 24 jam sampai tanggal {{substr($data['expired_date'],8,2).'/'.substr($data['expired_date'],5,2).'/'.substr($data['expired_date'],0,4)}} dan pukul {{substr($data['expired_date'],11,5)}}. Segera Login menggunakan Password Baru Anda dan lakukan Ubah Password untuk menjaga kerahasiaan Password iziklaim Anda di sini:
                    </td>
                  </tr>
                  <tr>
                    <td class="content-message" style="text-align: justify;">
                        <br>
                        <a href="{{env('APP_URL')}}/login" align="center" style="
                          color:white;
                          display: block;
                          text-decoration:none;
                          color:#FFF;
                          background-color:#0880AE;
                          border:solid #0880AE;
                          border-width:5px 10px;
                          line-height:2;
                          font-weight:bold;
                          margin-right:10px;
                          text-align:center;
                          cursor:pointer;
                          border-radius: 5px;
                        ">Login ke iziklaim</a>
                        <br><br>
                    </td>
                  </tr>
                </table>
              </div>
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
  <table class="body-wrap" width="600">
    <tr>
      <td class="container" bgcolor="#FAFAFA">
        <table border="0" cellpadding="0" cellspacing="0" class="contentwrapper" width="600">
          <tr>
            <td class="content-message" style="text-align: center;padding-top:20px;">
                Jika Anda tidak melakukan permintaan reset password, silakan abaikan e-mail ini dan Login dengan menggunakan Password Lama Anda. Jika Anda sudah Login menggunakan Password Lama Anda, maka Password Baru yang tertulis di e-mail ini akan di non-aktifkan.
                <br><br>
                <b>Admin iziklaim.</b>
            </td>
          </tr>
          <tr>
            <td style="margin:0 auto; display:block;margin-top:10px;" valign="middle">
              <table width="100%">
                <tr align="center">
                    <td colspan="3" valign="middle">
                      <center>
                          <a style="text-decoration: none; margin-right: 10px;" href="https://www.facebook.com/medlinxasia" title="iziklaim on Facebook" target="new">
                            <img src="{{url('img/icon-facebook.png')}}" width="35" height="35" border="0" alt="iziklaim on Facebook">
                          </a>&nbsp;&nbsp;&nbsp;
                          <a style="text-decoration: none; margin-right: 10px;" href="https://www.instagram.com/medlinxasia" title="iziklaim on Instagram" target="new">
                            <img src="{{url('img/icon-instagram.png')}}" width="35" height="35" border="0" alt="iziklaim on Instagram">
                          </a>&nbsp;&nbsp;&nbsp;
                          <a style="text-decoration: none; margin-right: 10px;" href="https://www.linkedin.com/company/medlinxasia/" title="iziklaim on LinkedIn" target="new">
                            <img src="{{url('img/icon-linkedin.png')}}" width="35" height="35" border="0" alt="iziklaim on LinkedIn">
                          </a>&nbsp;&nbsp;&nbsp;
                          <a style="text-decoration: none; margin-right: 10px;" href="https://www.youtube.com/channel/UC3q5IZggPK5EuPjIOvxKvUQ" title="iziklaim on Youtube" target="new">
                            <img src="{{url('img/icon-youtube.png')}}" width="35" height="35" border="0" alt="iziklaim on Youtube">
                          </a>
                      </center>
                  </td>
                </tr>
                <tr>
                  <td colspan="3" height="18" style="font-size:1px; line-height:1px;">&nbsp;</td>
                </tr>
                <tr>
                  <td valign="bottom" style="padding-left: 10px; font-weight:normal; font-family: Calibri; color: #414141; text-align:left;" align="left">
                    <img style="width: 150px !important;" border="0" src="{{url('img/medlinx.png')}}" width="150">
                  </td>
                  <td valign="bottom" colspan="2" style="padding-right: 10px; font-size:14px; font-weight:normal; font-family: 'OpenSans', helvetica, sans-serif; text-align:right;" align="right"><b>PT. Medlinx Asia Teknologi</b><br>Jl. Raya Fatmawati No. 7 - Jakarta Selatan<br>Phone: (021) 723 7982 - Email: customercare@medlinx.co.id</td>
                </tr>
              </table>
            </td>
          </tr>
          <tr>
            <td style="height:25px;">
              <br><br>
              <img width="600" src="{{url('img/footer-emailmarketing.png')}}">
            </td>
          </tr>
        </table>
        <!-- /content -->
      </td>
      <td></td>
    </tr>
  </table>
  <!-- /body -->
</body>

</html>