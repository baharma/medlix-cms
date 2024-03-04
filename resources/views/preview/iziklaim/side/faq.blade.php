@extends('landing-side')

@section('content')
<section id="faq" class="faq">
    <div class="container" data-aos="fade-down">
        <div class="section-title pb-0">
            <h2 class="mb-0">Frequently Asked Questions</h2>
        </div>
    </div>
</section>
<section  id="faq" class="faq section-bg">
    <div class="container">
        <div class="box-form">
            <div class="form-control mb-4">
                <input type="text" class="form-control" id="search" value="" placeholder="Search...">
            </div>
            <div class="faq-list">
                <ul>
                    <li class="content">
                        <i class="bx bx-help-circle icon-help"></i>
                        <a data-bs-toggle="collapse" class="collapsed" data-bs-target="#faq-list-1">Bagaimana jika ingin bekerjasama dengan iziklaim?<i class="bx bx-chevron-down icon-show"></i>
                            <i class="bx bx-chevron-up icon-close"></i>
                        </a>
                        <div id="faq-list-1" class="collapse" data-bs-parent=".faq-list">
                            <p> Untuk informasi kerjasama dapat menghubungi sales representatif iziklaim dengan cara email ke alamat email customercare@medlinx.co.id </p>
                        </div>
                    </li>
                    <li class="content">
                        <i class="bx bx-help-circle icon-help"></i>
                        <a data-bs-toggle="collapse" data-bs-target="#faq-list-2" class="collapsed">Bagaimana cara agar bisa menjadi provider iziklaim?<i class="bx bx-chevron-down icon-show"></i>
                            <i class="bx bx-chevron-up icon-close"></i>
                        </a>
                        <div id="faq-list-2" class="collapse" data-bs-parent=".faq-list">
                            <p> Untuk informasi kerjasama provider dapat menghubungi team Provider Relation iziklaim dengan cara email ke alamat email customercare@medlinx.co.id </p>
                        </div>
                    </li>
                    <li class="content">
                        <i class="bx bx-help-circle icon-help"></i>
                        <a data-bs-toggle="collapse" data-bs-target="#faq-list-3" class="collapsed">Bagaimana cara mengakses iziklaim?<i class="bx bx-chevron-down icon-show"></i>
                            <i class="bx bx-chevron-up icon-close"></i>
                        </a>
                        <div id="faq-list-3" class="collapse" data-bs-parent=".faq-list">
                            <p>Cara mengakses iziklaim yaitu dengan masuk ke website iziklaim di tautan iziklaim.com</p>
                        </div>
                    </li>
                    <li class="content">
                        <i class="bx bx-help-circle icon-help"></i>
                        <a data-bs-toggle="collapse" data-bs-target="#faq-list-4" class="collapsed">Ada berapa jenis User pada iziklaim di Rumah Sakit/Klinik?<i class="bx bx-chevron-down icon-show"></i>
                            <i class="bx bx-chevron-up icon-close"></i>
                        </a>
                        <div id="faq-list-4" class="collapse" data-bs-parent=".faq-list">
                            <p>Pada Rumah Sakit/Klinik terdapat 3 jenis User iziklaim yaitu,
                                <br>1. User Kasir-Administrasi.
                                <br>2. User Marketing-Reporting.
                                <br>3. User Finance
                            </p>
                        </div>
                    </li>
                    <li class="content">
                        <i class="bx bx-help-circle icon-help"></i>
                        <a data-bs-toggle="collapse" data-bs-target="#faq-list-5" class="collapsed">Apa perbedaan User Marketing, User Kasir-Administrasi dan User Finance pada iziklaim?<i class="bx bx-chevron-down icon-show"></i>
                            <i class="bx bx-chevron-up icon-close"></i>
                        </a>
                        <div id="faq-list-5" class="collapse" data-bs-parent=".faq-list">
                            <p>
                                Perbedaan antara User Marketing-Reporting dan User Kasir-Administrasi terletak pada masing-masing fungsi User tersebut.
                                <br>1. User Marketing-Reporting : Salah satu fungsi Marketing-Reporting adalah untuk Monitoring Transaksi User Kasir-Adminsitrasi di provider yang bersangkutan.
                                <br>2. User Kasir-Administrasi : Salah satu fungsi User Kasir-Administrasi adalah untuk melakukan transaksi klaim asuransi seperti: Pendaftaran, Pembayaran dan Pembatalan transaksi.
                                <br>3. User Finance : Salah satu fungsi User FInance adalah untuk melakukan pengelompokan invoice untuk dikirimkan ke Asuransi/TPA/ASO
                            </p>
                        </div>
                    </li>
                    <li class="content">
                        <i class="bx bx-help-circle icon-help"></i>
                        <a data-bs-toggle="collapse" class="collapsed" data-bs-target="#faq-list-6">Bagaimana jika User Marketing Lupa Password? <i class="bx bx-chevron-down icon-show"></i>
                            <i class="bx bx-chevron-up icon-close"></i>
                        </a>
                        <div id="faq-list-6" class="collapse" data-bs-parent=".faq-list">
                            <p>
                                Yang perlu dilakukan adalah: 
                                <br>1. Klik Lupa Password? pada Halaman Log In iziklaim
                                <br>2. Selanjutnya input username User Marketing
                                <br>3. Klik tombol Proses
                                <br>4. Maka akan muncul notifikasi : Password baru telah dikirim ke alamat e-mail Anda yang terdaftar di iziklaim. Jika alamat e-mail Anda berubah atau Anda belum menerima Password Baru Anda, hubungi Customer Care kami melalui:
                                <br>&emsp;a. Email : customercare@medlinx.co.id
                                <br>&emsp;b. Call only : (021) 7237982
                                <br>&emsp;c. Whatsapp : 0815-8454-8909
                                <br>5. Selanjutnya untuk mengetahui password baru silakan cek email anda atau jika alamat email anda berubah silakan menghubungi Customer Care kami
                            </p>
                        </div>
                    </li>
                    <li class="content">
                        <i class="bx bx-help-circle icon-help"></i>
                        <a data-bs-toggle="collapse" data-bs-target="#faq-list-7" class="collapsed">Selanjutnya Bagaimana prosedur User Marketing untuk mendapatkan informasi Password jika ada permintaan lupa password dari User Kasir-Administrasi?<i class="bx bx-chevron-down icon-show"></i>
                            <i class="bx bx-chevron-up icon-close"></i>
                        </a>
                        <div id="faq-list-7" class="collapse" data-bs-parent=".faq-list">
                            <p>
                                Yang perlu dilakukan User Marketing adalah:
                                <br>1. Password baru User Kasir-Administrasi akan terkirim ke alamat email marketing yang terdaftar di iziklaim.
                                <br>2. Silakan cek email anda dari sender email medlinx@medlinx.co.id
                                <br>3. Jika anda tidak mengetahui alamat email yang terdaftar atau ingin mengganti alamat email silakan hubungi Customer Care kami melalui:
                                <br>&emsp;a. Email : customercare@medlinx.co.id
                                <br>&emsp;b. Call only : (021) 7237982
                                <br>&emsp;c. Whatsapp : 0815-8454-8909
                            </p>
                        </div>
                    </li>
                    <li class="content">
                        <i class="bx bx-help-circle icon-help"></i>
                        <a data-bs-toggle="collapse" data-bs-target="#faq-list-8" class="collapsed">Bagaimana jika User Kasir-Administrasi Lupa Kata Sandi/Password?<i class="bx bx-chevron-down icon-show"></i>
                            <i class="bx bx-chevron-up icon-close"></i>
                        </a>
                        <div id="faq-list-8" class="collapse" data-bs-parent=".faq-list">
                            <p>
                                Pada halaman login iziklaim, klik Lupa Password.
                                <br>1. Selanjutnya input username User Kasir-Administrasi.
                                <br>2. Klik tombol Proses
                                <br>3. Maka akan muncul Notifikasi: "Password baru telah dikirim ke alamat email marketing. Hubungi marketing anda untuk mengetahui password baru anda".
                                <br>4. Selanjutnya silakan anda minta Password baru yang terkirim ke alamat email marketing anda.
                                <br>5. Lakukan login menggunakan Password baru yang terkirim ke alamat email marketing atau silakan menghubungi Customer Care kami melalui:
                                <br>&emsp;a. Email : customercare@medlinx.co.id
                                <br>&emsp;b. Call only : (021) 7237982
                                <br>&emsp;c. Whatsapp : 0815-8454-8909
                            </p>
                        </div>
                    </li>
                    <li class="content">
                        <i class="bx bx-help-circle icon-help"></i>
                        <a data-bs-toggle="collapse" data-bs-target="#faq-list-9" class="collapsed">Apakah peserta asuransi harus melakukan Registrasi?<i class="bx bx-chevron-down icon-show"></i>
                            <i class="bx bx-chevron-up icon-close"></i>
                        </a>
                        <div id="faq-list-9" class="collapse" data-bs-parent=".faq-list">
                            <p>Sebelum mendapatkan layanan, dianjurkan untuk melakukan Registrasi untuk mengetahui apakah peserta tersebut eligible/tidak serta untuk melihat benefit peserta.</p>
                        </div>
                    </li>
                    <li class="content">
                        <i class="bx bx-help-circle icon-help"></i>
                        <a data-bs-toggle="collapse" data-bs-target="#faq-list-10" class="collapsed">Berapa lama untuk penyimpanan data transaksi system iziklaim?<i class="bx bx-chevron-down icon-show"></i>
                            <i class="bx bx-chevron-up icon-close"></i>
                        </a>
                        <div id="faq-list-10" class="collapse" data-bs-parent=".faq-list">
                            <p>Untuk penyimpanan data transaksi iziklaim maksimal 3 bulan terakhir.</p>
                        </div>
                    </li>
                    <li class="content">
                        <i class="bx bx-help-circle icon-help"></i>
                        <a data-bs-toggle="collapse" data-bs-target="#faq-list-11" class="collapsed">Jika terjadi masalah saat melakukan transaksi kemudian menghubungi pihak asuransi, tetapi pihak asuransi melemparkan kembali ke system, bagaimana mengatasi kendala seperti itu?<i class="bx bx-chevron-down icon-show"></i>
                            <i class="bx bx-chevron-up icon-close"></i>
                        </a>
                        <div id="faq-list-11" class="collapse" data-bs-parent=".faq-list">
                            <p>
                                Dilihat kembali dari kategori kendala, apakah kendala dari benefit/kepesertaan atau terkait teknis/penggunaan iziklaim. Apabila terkait teknis/pengoperasian iziklaim, maka silakan menghubungi Customer Care Medlinx melalui: 
                                <br>1. Email : customercare@medlinx.co.id
                                <br>2. Call only : (021) 7237982
                                <br>3. Whatsapp : 0815-8454-8909
                                Jika terkait mengenai benefit/kepesertaan, dapat menghubungi pihak Asuransi/TPA/ASO dengan informasi kontak yang dapat dilihat pada menu Bantuan
                            </p>
                        </div>
                    </li>
                    <li class="content">
                        <i class="bx bx-help-circle icon-help"></i>
                        <a data-bs-toggle="collapse" data-bs-target="#faq-list-12" class="collapsed">Bagaimana jika ada transaksi pembayaran tapi Kode Rahasia-nya tidak sesuai pada kartu peserta asuransi?<i class="bx bx-chevron-down icon-show"></i>
                            <i class="bx bx-chevron-up icon-close"></i>
                        </a>
                        <div id="faq-list-12" class="collapse" data-bs-parent=".faq-list">
                            <p>
                                Kasir/admin bisa langsung menanyakan ke peserta asuransi untuk tanggal lahir, atau hubungi Customer Care 24 jam iziklaim melalui: 
                                <br>1. Email : customercare@medlinx.co.id
                                <br>2. Call only : (021) 7237982
                                <br>3. Whatsapp : 0815-8454-8909
                            </p>
                        </div>
                    </li>
                    <li class="content">
                        <i class="bx bx-help-circle icon-help"></i>
                        <a data-bs-toggle="collapse" data-bs-target="#faq-list-13" class="collapsed">Berapa jumlah RS/Klinik/Lab/Apotek rekanan iziklaim?<i class="bx bx-chevron-down icon-show"></i>
                            <i class="bx bx-chevron-up icon-close"></i>
                        </a>
                        <div id="faq-list-13" class="collapse" data-bs-parent=".faq-list">
                            <p>5.000+ yang tersebar di seluruh Indonesia</p>
                        </div>
                    </li>
                    <li class="content">
                        <i class="bx bx-help-circle icon-help"></i>
                        <a data-bs-toggle="collapse" data-bs-target="#faq-list-14" class="collapsed">Perubahan password iziklaim hanya 1x atau harus secara berkala?<i class="bx bx-chevron-down icon-show"></i>
                            <i class="bx bx-chevron-up icon-close"></i>
                        </a>
                        <div id="faq-list-14" class="collapse" data-bs-parent=".faq-list">
                            <p>Perubahan password di iziklaim hanya di lakukan 1x saat pertama kali login </p>
                        </div>
                    </li>
                    <li class="content">
                        <i class="bx bx-help-circle icon-help"></i>
                        <a data-bs-toggle="collapse" data-bs-target="#faq-list-15" class="collapsed">Apa itu kode rahasia yang terdapat pada transaksi pembayaran iziklaim?<i class="bx bx-chevron-down icon-show"></i>
                            <i class="bx bx-chevron-up icon-close"></i>
                        </a>
                        <div id="faq-list-15" class="collapse" data-bs-parent=".faq-list">
                            <p>Kode rahasia merupakan kombinasi dari tanggal lahir peserta dengan format DD/MM/YYYY. input kode rahasia diperlukan ketika melakukan transaksi pembayaran agar transaksi pembayaran di iziklaim lebih aman</p>
                        </div>
                    </li>
                    <li class="content">
                        <i class="bx bx-help-circle icon-help"></i>
                        <a data-bs-toggle="collapse" data-bs-target="#faq-list-16" class="collapsed">Apa kegunaan fitur Download pada struk transaksi<i class="bx bx-chevron-down icon-show"></i>
                            <i class="bx bx-chevron-up icon-close"></i>
                        </a>
                        <div id="faq-list-16" class="collapse" data-bs-parent=".faq-list">
                            <p>Fitur Download struk transaksi diigunakan untuk membantu provider mengirimkan bukti transaksi ke Whatsapp atau email peserta</p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
@endsection

@section('js')
<script>
    $.expr[':'].contains = function(a, i, m) {
        return jQuery(a).text().toUpperCase().indexOf(m[3].toUpperCase()) >= 0;
    };

    $('#search').keyup(function(){
        var text = $(this).val();
        $('.content').hide();
        $('.content:contains("'+text+'")').show();
    });
</script>
@endsection