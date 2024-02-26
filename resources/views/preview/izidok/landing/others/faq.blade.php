@extends('landing.app')

@section('content')
@include('landing.header-page')
<section  id="faq" class="faq section-bg">
    <div class="container">
        <div class="box-form">
            <div class="form-control mb-4">
                <input type="text" class="form-control" id="search" value="" placeholder="Search...">
            </div>
            <div class="faq-list">
                <ul>
                    <li class="content" data-aos="fade-up">
                        <i class="bx bx-help-circle icon-help"></i>
                        <a data-bs-toggle="collapse" class="collapsed" data-bs-target="#faq-list-1">Apa itu izidok?<i class="bx bx-chevron-down icon-show"></i>
                            <i class="bx bx-chevron-up icon-close"></i>
                        </a>
                        <div id="faq-list-1" class="collapse" data-bs-parent=".faq-list">
                            <p>Izidok adalah website SaaS (Software as a Service) untuk membantu Dokter Praktik Mandiri dan Klinik secara mudah mengelola kegiatan operasional sehari-hari. Mulai dari mengatur antrean pasien, memasukkan identitas pasien, menulis dan menyimpan data rekam medis secara digital, mengatur tarif & layanan, serta membuat tagihan pembayaran</p>
                        </div>
                    </li>
                    <li class="content" data-aos="fade-up" data-aos-delay="100">
                        <i class="bx bx-help-circle icon-help"></i>
                        <a data-bs-toggle="collapse" data-bs-target="#faq-list-2" class="collapsed">Siapa pengguna/target utama pengguna izidok?<i class="bx bx-chevron-down icon-show"></i>
                            <i class="bx bx-chevron-up icon-close"></i>
                        </a>
                        <div id="faq-list-2" class="collapse" data-bs-parent=".faq-list">
                            <p>Pengguna izidok merupakan Dokter Praktik Mandiri dan Klinik</p>
                        </div>
                    </li>
                    <li class="content" data-aos="fade-up" data-aos-delay="200">
                        <i class="bx bx-help-circle icon-help"></i>
                        <a data-bs-toggle="collapse" data-bs-target="#faq-list-3" class="collapsed">Apa keuntungan menggunakan izidok bagi klinik/tempat praktik pribadi saya?<i class="bx bx-chevron-down icon-show"></i>
                            <i class="bx bx-chevron-up icon-close"></i>
                        </a>
                        <div id="faq-list-3" class="collapse" data-bs-parent=".faq-list">
                            <p>Izidok dapat membantu dokter praktek mandiri dan klinik untuk menyimpan data pasien lebih aman dikarenakan rekam medis izidok telah tersertifikasi ISO 27001:2013. Selain rekam medis elektronik yang aman, izidok juga menyediakan fitur untuk mengatur kegiatan operasional tempat praktik/klinik dengan penggunaan yang mudah.</p>
                        </div>
                    </li>
                    <li class="content" data-aos="fade-up" data-aos-delay="300">
                        <i class="bx bx-help-circle icon-help"></i>
                        <a data-bs-toggle="collapse" data-bs-target="#faq-list-4" class="collapsed">Apa yang diperlukan untuk mulai menggunakan izidok?<i class="bx bx-chevron-down icon-show"></i>
                            <i class="bx bx-chevron-up icon-close"></i>
                        </a>
                        <div id="faq-list-4" class="collapse" data-bs-parent=".faq-list">
                            <p>Izidok dapat diakses dengan menggunakan perangkat PC, laptop, tablet, dan smartphone. Namun akses terbaik adalah dengan menggunakan PC, laptop, atau tablet. Koneksi internet yang stabil dan aman juga dibutuhkan. Dan kecepatan internet yang dapat disarankan adalah minimal 500kb/s</p>
                        </div>
                    </li>
                    <li class="content" data-aos="fade-up" data-aos-delay="400">
                        <i class="bx bx-help-circle icon-help"></i>
                        <a data-bs-toggle="collapse" data-bs-target="#faq-list-5" class="collapsed">Bagaimana jika masa berlangganan saya habis?<i class="bx bx-chevron-down icon-show"></i>
                            <i class="bx bx-chevron-up icon-close"></i>
                        </a>
                        <div id="faq-list-5" class="collapse" data-bs-parent=".faq-list">
                            <p>Jika masa berlangganan habis, pengguna tidak dapat melakukan registrasi antrean baru dan tulis rekam medis. Pengguna dapat melakukan pembelian paket berlangganan melalui menu Subskripsi.</p>
                        </div>
                    </li>
                    <li class="content" data-aos="fade-up" data-aos-delay="500">
                        <i class="bx bx-help-circle icon-help"></i>
                        <a data-bs-toggle="collapse" class="collapsed" data-bs-target="#faq-list-6">Apakah data-data saya aman dengan menggunakan izidok? <i class="bx bx-chevron-down icon-show"></i>
                            <i class="bx bx-chevron-up icon-close"></i>
                        </a>
                        <div id="faq-list-6" class="collapse" data-bs-parent=".faq-list">
                            <p>Ya. Sistem keamanan data yang digunakan pada izidok ada 4, yaitu dengan:</p>
                            <ol>
                                <li>SSL (Secure Sockets Layer) : Merupakan metode keamanan digital yang melakukan enkripsi komunikasi antara website dengan end-user sehingga komunikasi selama penggunaan izidok terjaga dari upaya penyadapan.</li>
                                <li>Storage Encryption: Mendukung enkripsi AES256, SSE-KMS BYOK, SSE-KMS, yang akan melindungi data Anda dari pencurian data.</li>
                                <li>High Availability Services : End-point izidok ditempatkan pada region Indonesia dengan mode aktif-aktif dan file over, sehingga meminimalisir dampak dari kegagalan hardware (kerusakan fungsi hardware, hang, mati/shutdown).</li>
                                <li>WAF (Web Application Firewall) : izidok dilindungi oleh lapisan keamanan WAF yang dapat mencegah dari upaya manipulasi data dan transaksi oleh pihak yang tidak bertanggungjawab.</li>
                            </ol>
                        </div>
                    </li>
                    <li class="content" data-aos="fade-up" data-aos-delay="600">
                        <i class="bx bx-help-circle icon-help"></i>
                        <a data-bs-toggle="collapse" data-bs-target="#faq-list-7" class="collapsed">Apakah izidok memiliki Customer Support? Bagaimana caranya mendapatkan bantuan saat terjadi kendala?<i class="bx bx-chevron-down icon-show"></i>
                            <i class="bx bx-chevron-up icon-close"></i>
                        </a>
                        <div id="faq-list-7" class="collapse" data-bs-parent=".faq-list">
                            <p>Saat ini bantuan bisa Anda dapatkan melalui :<br />
                                Whatsapp izidok = 0822 1797 9782<br />
                                Telepon = 021 723 7982<br />
                                Email = customercare@izidok.id / dokterhebat@izidok.id<br />
                                Pada jam kerja senin-jumat : 08.00 &ndash; 17.00, di luar jam kerja pesan akan dibalas maksimal 1x24jam
                            </p>
                        </div>
                    </li>
                    <li class="content" data-aos="fade-up" data-aos-delay="700">
                        <i class="bx bx-help-circle icon-help"></i>
                        <a data-bs-toggle="collapse" data-bs-target="#faq-list-8" class="collapsed">Apakah saya bisa mendaftarkan beberapa tempat praktek/klinik yang saya kelola dengan 1 email saja?<i class="bx bx-chevron-down icon-show"></i>
                            <i class="bx bx-chevron-up icon-close"></i>
                        </a>
                        <div id="faq-list-8" class="collapse" data-bs-parent=".faq-list">
                            <p>Untuk Dokter Praktik Mandiri, 1 email hanya bisa digunakan untuk 1 tempat praktik.<br />
                                Untuk izidok Klinik, Pemilik Klinik dapat mendaftarkan lebih dari 1 klinik dengan 1 email. Lalu dengan izidok klinik, Pemilik Klinik juga dapat menambahkan role lain seperti PIC Klinik, Dokter, Perawat, dan Frontdesk.</p>
                        </div>
                    </li>
                    <li class="content" data-aos="fade-up" data-aos-delay="800">
                        <i class="bx bx-help-circle icon-help"></i>
                        <a data-bs-toggle="collapse" data-bs-target="#faq-list-9" class="collapsed">Apakah izidok sudah terkoneksi dengan BPJS?<i class="bx bx-chevron-down icon-show"></i>
                            <i class="bx bx-chevron-up icon-close"></i>
                        </a>
                        <div id="faq-list-9" class="collapse" data-bs-parent=".faq-list">
                            <p>Izidok sudah terintegrasi dengan BPJS P-Care.</p>
                        </div>
                    </li>
                    <li class="content" data-aos="fade-up" data-aos-delay="900">
                        <i class="bx bx-help-circle icon-help"></i>
                        <a data-bs-toggle="collapse" data-bs-target="#faq-list-10" class="collapsed">Paket-paket berlangganan apa saja yang tersedia di izidok? Dan berapa biayanya?<i class="bx bx-chevron-down icon-show"></i>
                            <i class="bx bx-chevron-up icon-close"></i>
                        </a>
                        <div id="faq-list-10" class="collapse" data-bs-parent=".faq-list">
                            <p>Izidok memiliki 3 jenis paket dengan ketentuan sebagai berikut:<br />
                                - 300 visit pasien dengan masa berlaku 12 bulan seharga Rp549.000<br />
                                - 500 visit pasien dengan masa berlaku 24 bulan seharga Rp749.000<br />
                                - 1000 visit pasien dengan masa berlaku 24 bulan seharga Rp1.299.000
                            </p>
                        </div>
                    </li>
                    <li class="content" data-aos="fade-up" data-aos-delay="1000">
                        <i class="bx bx-help-circle icon-help"></i>
                        <a data-bs-toggle="collapse" data-bs-target="#faq-list-11" class="collapsed">Bagaimana sistem pembayaran di izidok jika akan berlangganan?<i class="bx bx-chevron-down icon-show"></i>
                            <i class="bx bx-chevron-up icon-close"></i>
                        </a>
                        <div id="faq-list-11" class="collapse" data-bs-parent=".faq-list">
                            <p>Cara pembayaran untuk berlangganan izidok Dokter Praktik Mandiri dan Klinik adalah dengan cara transfer melalui Payment Gateway BCA Virtual Account, Permata Bank Virtual Account, dan Bayarind Web.</p>
                        </div>
                    </li>
                    <li class="content" data-aos="fade-up" data-aos-delay="1100">
                        <i class="bx bx-help-circle icon-help"></i>
                        <a data-bs-toggle="collapse" data-bs-target="#faq-list-12" class="collapsed">Apakah saya bisa tetap mengakses atau mendapatkan data saya jika saya berhenti berlangganan izidok?<i class="bx bx-chevron-down icon-show"></i>
                            <i class="bx bx-chevron-up icon-close"></i>
                        </a>
                        <div id="faq-list-12" class="collapse" data-bs-parent=".faq-list">
                            <p>Anda tetap bisa login/masuk ke dalam akun izidok untuk melihat dan mengakses data. Namun, jika Anda ingin melakukan penambahan data (menulis rekam medis, menambahkan data pasien baru, menambahkan antrean) maupun penarikan data, maka Anda harus melanjutkan berlangganan dengan membeli paket.</p>
                        </div>
                    </li>
                    <li class="content" data-aos="fade-up" data-aos-delay="1200">
                        <i class="bx bx-help-circle icon-help"></i>
                        <a data-bs-toggle="collapse" data-bs-target="#faq-list-13" class="collapsed">Pasien saya semakin banyak akhir-akhir ini, bisakah saya upgrade ke paket dengan jumlah kunjungan pasien yang lebih banyak pada bulan berikutnya? (berlaku sebaliknya)<i class="bx bx-chevron-down icon-show"></i>
                            <i class="bx bx-chevron-up icon-close"></i>
                        </a>
                        <div id="faq-list-13" class="collapse" data-bs-parent=".faq-list">
                            <p>Anda dapat upgrade ke paket dengan jumlah kuota kunjungan pasien yang lebih besar kapan saja. Namun, jika paket berlangganan Anda yang lama masih aktif, maka sistem akan otomatis menggunakan kuota paket yang lama. Setelah paket yang lama selesai masa berlakunya atau kuotanya sudah habis, maka sistem akan secara otomatis memakai paket yang baru.</p>
                        </div>
                    </li>
                    <li class="content" data-aos="fade-up" data-aos-delay="1300">
                        <i class="bx bx-help-circle icon-help"></i>
                        <a data-bs-toggle="collapse" data-bs-target="#faq-list-14" class="collapsed">Bagaimana jika saat pemakaian ternyata jumlah kunjungan pasien saya sudah habis di tengah bulan dan saya tidak bisa lagi menambahkan data pasien?<i class="bx bx-chevron-down icon-show"></i>
                            <i class="bx bx-chevron-up icon-close"></i>
                        </a>
                        <div id="faq-list-14" class="collapse" data-bs-parent=".faq-list">
                            <p>Jika kuota habis, user dapat membeli paket kembali untuk dapat terus memakai izidok. Setelah berhasil membeli paket, user dapat langsung menambah data pasien.</p>
                        </div>
                    </li>
                    <li class="content" data-aos="fade-up" data-aos-delay="1400">
                        <i class="bx bx-help-circle icon-help"></i>
                        <a data-bs-toggle="collapse" data-bs-target="#faq-list-15" class="collapsed">Bagaimana jika saya belum yakin dan ingin mencoba free trial terlebih dahulu?<i class="bx bx-chevron-down icon-show"></i>
                            <i class="bx bx-chevron-up icon-close"></i>
                        </a>
                        <div id="faq-list-15" class="collapse" data-bs-parent=".faq-list">
                            <p>Silakan hubungi tim kami melalui:<br />
                                Whatsapp izidok = 0822 1797 9782<br />
                                Telepon = 021 723 7982<br />
                                Email = customercare@izidok.id / dokterhebat@izidok.id
                            </p>
                        </div>
                    </li>
                    <li class="content" data-aos="fade-up" data-aos-delay="1500">
                        <i class="bx bx-help-circle icon-help"></i>
                        <a data-bs-toggle="collapse" data-bs-target="#faq-list-16" class="collapsed">Apakah pembayaran harus dilakukan di depan?<i class="bx bx-chevron-down icon-show"></i>
                            <i class="bx bx-chevron-up icon-close"></i>
                        </a>
                        <div id="faq-list-16" class="collapse" data-bs-parent=".faq-list">
                            <p>Skema pembayaran di izidok adalah pembayaran di depan, user dapat menikmati layanan selama periode yang dipilih sesuai dengan paket yang dibeli.</p>
                        </div>
                    </li>
                    <li class="content" data-aos="fade-up" data-aos-delay="1700">
                        <i class="bx bx-help-circle icon-help"></i>
                        <a data-bs-toggle="collapse" data-bs-target="#faq-list-18" class="collapsed">Untuk izidok klinik, Apakah terdapat pembatasan jumlah tenaga medis/operator untuk 1 akunnya?<i class="bx bx-chevron-down icon-show"></i>
                            <i class="bx bx-chevron-up icon-close"></i>
                        </a>
                        <div id="faq-list-18" class="collapse" data-bs-parent=".faq-list">
                            <p>Tidak, untuk jumlah tenaga medis dan operator di izidok klinik tidak dibatasi untuk semua jenis paket.</p>
                        </div>
                    </li>
                    <li class="content" data-aos="fade-up" data-aos-delay="1800">
                        <i class="bx bx-help-circle icon-help"></i>
                        <a data-bs-toggle="collapse" data-bs-target="#faq-list-19" class="collapsed">Mengapa kuota patient engagement saya berkurang sedangkan saya tidak mengaktifkan fitur pengingat melalui SMS/WA?<i class="bx bx-chevron-down icon-show"></i>
                            <i class="bx bx-chevron-up icon-close"></i>
                        </a>
                        <div id="faq-list-19" class="collapse" data-bs-parent=".faq-list">
                            <p>Anda dapat cek di menu Add Ons dan pilih Patient Engagement, pada halaman tersebut dapat Anda lihat bagian pesan ulang tahun apabila aktif, maka kuota anda berkurang karena Anda mengaktifkan fitur tersebut dan apabila tidak aktif dan masih berkurang, Anda dapat menghubungi tim Customer Support kami. Anda dapat menonaktifkan fitur pesan ulang tahun ini kapanpun sesuai kebutuhan Anda.</p>
                        </div>
                    </li>
                    <li class="content" data-aos="fade-up" data-aos-delay="1900">
                        <i class="bx bx-help-circle icon-help"></i>
                        <a data-bs-toggle="collapse" data-bs-target="#faq-list-20" class="collapsed">Apakah data pasien saya tersimpan dengan aman pada izidok?<i class="bx bx-chevron-down icon-show"></i>
                            <i class="bx bx-chevron-up icon-close"></i>
                        </a>
                        <div id="faq-list-20" class="collapse" data-bs-parent=".faq-list">
                            <p>Data anda tersimpan dengan aman karena izidok melakukan enkripsi/penguncian data sehingga data tidak dapat dicuri maupun dilihat/dibaca oleh orang lain, selain itu izidok juga tersertifikasi ISO 27001:2013, yang dapat mengantisipasi cyber attack dan melindungi segala Informasi yang terdapat di dalam sistem.</p>
                        </div>
                    </li>
                    <li class="content" data-aos="fade-up" data-aos-delay="2000">
                        <i class="bx bx-help-circle icon-help"></i>
                        <a data-bs-toggle="collapse" data-bs-target="#faq-list-21" class="collapsed">Bagaimana jika data-data yang telah tersimpan hilang? Apakah tim izidok dapat membantu untuk melakukan backup data?<i class="bx bx-chevron-down icon-show"></i>
                            <i class="bx bx-chevron-up icon-close"></i>
                        </a>
                        <div id="faq-list-21" class="collapse" data-bs-parent=".faq-list">
                            <p>Data yang di simpan sudah secara otomatis di backup sehingga proses restore data yang hilang memungkinkan untuk dilakukan sesuai dengan ketentuan yang berlaku di aplikasi.</p>
                        </div>
                    </li>
                    <li class="content" data-aos="fade-up" data-aos-delay="2100">
                        <i class="bx bx-help-circle icon-help"></i>
                        <a data-bs-toggle="collapse" data-bs-target="#faq-list-22" class="collapsed">Berapa lama Rekam Medis pasien saya dapat tersimpan pada izidok?<i class="bx bx-chevron-down icon-show"></i>
                            <i class="bx bx-chevron-up icon-close"></i>
                        </a>
                        <div id="faq-list-22" class="collapse" data-bs-parent=".faq-list">
                            <p>izidok menyimpan rekam medis elektronik pasien selama 25 tahun sesuai dengan Permenkes no. 24 Tahun 2022.</p>
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