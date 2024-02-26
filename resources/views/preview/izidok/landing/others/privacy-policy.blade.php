@extends('landing.app')

@section('content')
    @include('landing.header-page')
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-fluid">
            <div class="container">
                <div class="d-flex flex-column flex-xl-row">
                    <div class="flex-lg-row-fluid me-xl-15">
                        <div class="mb-10">
                            <div class="fs-5 fw-semibold text-justify">
                                <h2>Disclaimer</h2>
                                <p>Data atau informasi yang didapat dari fasilitas izidok ini hanya untuk diketahui oleh pihak yang berhak saja, dengan demikian jika Anda bukan pemilik sah user ID dan password yang disediakan oleh PT Medlinx Asia Teknologi atau bukan orang yang berhak untuk memperoleh/mengetahui data serta informasi yang terdapat dalam atau diperoleh melalui fasilitas izidok Web ini, Anda dilarang untuk meneruskan atau mengakses fasilitas izidok ini.</p>
                                <h2>SYARAT DAN KETENTUAN PENGGUNA LAYANAN :</h2>
                                <p>Dengan menggunakan fasilitas izidok ini, Anda selaku pengguna telah menyetujui syarat dan ketentuan berikut di bawah. Silakan baca syarat dan ketentuan di bawah ini dengan seksama sebelum mengakses fasilitas izidok. Syarat dan ketentuan ini dapat diubah atau diperbaharui setiap saat dan pengguna terikat oleh setiap perubahan atau pembaharuan tersebut.</p>
                                <h2>KETENTUAN PRIVASI</h2>
                                <p>Ketentuan Privasi berikut merupakan perjanjian hukum (&ldquo;Perjanjian&rdquo;) antara pengguna izidok dengan pemilik, pengembang dan pengelola izidok yaitu PT Medlinx Asia Teknologi (&ldquo;Medlinx&rdquo;).</p>
                                <h2>PASAL 1 &ndash; DEFINISI</h2>
                                <p>1.1 izidok adalah aplikasi SaaS berbasis web yang dapat diakses melalui computer, tablet dan ponsel pintar dengan menggunakan koneksi internet yang dapat digunakan Pengguna.</p>
                                <p>1.2 PT. Medlinx Asia Teknologi, &ldquo;Kami&rdquo;, &ldquo;Kita&rdquo; adalah sebuah perseroan terbatas yang didirikan dan beroperasi secara sah berdasarkan hukum Republik Indonesia dan berdomisili di Jakarta Selatan, Indonesia yang memfasilitasi penyediaan solusi teknologi untuk pelayanan bisnis Asuransi dan Kesehatan.</p>
                                <p>1.3 Pengguna, &ldquo;Anda&rdquo; adalah :</p>
                                <ol style="list-style-type:lower-roman">
                                    <li>Dokter Praktik Mandiri yang secara sah memiliki SIP (surat izin praktik) dan terdaftar dalam keanggotaan IDI, untuk menyimpan dan mengelola data rekam medis, data pasien, data tarif &amp; layanan, pengaturan antrean pasien, pembayaran, serta kegiatan operasional medis lain yang sesuai dengan peraturan perundang-undangan dan ketentuan hukum Republik Indonesia.</li>
                                    <li>Klinik yang secara sah memiliki no. izin klinik/izin operasional yang masih berlaku. Lebih rinci pengguna dapat merupakan Pemilik Klinik, Penanggung Jawab Klinik, Dokter Praktik yang bekerja di klinik, tenaga medis yang bekerja di klinik, dan Operator lainnya yang diberikan izin oleh Klinik untuk menggunakan izidok.</li>
                                </ol>
                                <p>1.4 Operator adalah setiap orang atau badan, yang ikut memakai layanan dari izidok atas izin klinik / dokter praktik mandiri yang mempunyai akses utama izidok.</p>
                                <p>1.5 Rekam Medis adalah berkas yang berisi catatan dan dokumen tentang identitas pasien, pemeriksaan, pengobatan, tindakan dan pelayanan lain yang telah diberikan kepada pasien.</p>
                                <p>1.6 Layanan pada izidok adalah layanan yang tersedia di website izidok termasuk namun tidak terbatas pada:</p>
                                <ul>
                                    <li>Penyimpanan dan pengelolaan rekam medis pasien.</li>
                                    <li>Penyimpanan dan pengelolaan data pasien.</li>
                                    <li>Manajemen tarif untuk layanan, obat dan bahan habis pakai.</li>
                                    <li>Manajemen asisten dokter/operator</li>
                                    <li>Pengaturan antrean</li>
                                    <li>Pembayaran/pengelolaan transaksi.</li>
                                    <li>Dashboard Monitoring</li>
                                </ul>
                                <p>Beserta Layanan lainnya yang dapat kami tambahkan dari waktu ke waktu sebagaimana disetujui oleh pihak berwenang terkait.</p>

                                <h2>PASAL 2 - PENDAFTARAN AKUN</h2>

                                <p>2.1 Sebelum anda menggunakan layanan izidok, Anda wajib untuk melakukan pendaftaran melalui website izidok (<a href="https://app.izidok.id/">https://app.izidok.id</a>&nbsp;dan&nbsp;<a href="https://beta.izidok.id/">https://beta.izidok.id</a>&nbsp;). Anda wajib untuk menyampaikan informasi yang benar, tepat dan terbaru dari diri Anda. Dengan melakukan pendaftaran, Anda menyetujui dan menerima Layanan dari izidok. Penerimaan tersebut berarti bahwa anda telah menerima seluruh Ketentuan dengan tanpa syarat dan tanpa adanya pengecualian dan oleh karenanya sepakat untuk terikat oleh Ketentuan termasuk setiap amandemen atau perubahan yang mungkin dibuat oleh izidok atas Ketentuan ini dikemudian hari.</p>

                                <p>2.2 Dengan mendaftarkan diri Anda ke izidok, Anda menyetujui bahwa izidok berhak untuk menyimpan segala jenis data namun tidak terbatas pada rekam medis, data pasien, dan data Anda sebagai pengguna izidok sebagai kebutuhan untuk perlindungan data dari kehilangan dan kerusakan, serta semata-mata untuk keperluan legal dan peningkatan kualitas pelayanan medis izidok.</p>

                                <p>2.3 Anda bertanggung jawab atas akurasi dan kebaharuan informasi yang Anda sediakan kepada Kami. Data yang Anda sediakan akan disimpan di izidok dan hanya dapat diakses oleh Anda selaku Dokter Praktik Mandiri dan Pihak Klinik (yaitu pengguna yang dirincikan pada poin 1.3) sebagai pemilik akun sah akun izidok. Kami tidak bertanggung jawab atas setiap kerugian yang diderita oleh Anda yang disebabkan oleh kegagalan Anda untuk memperbaharui informasi Anda melalui sistem kami.</p>

                                <p>2.4 Untuk pendaftaran akun melalui website izidok (<a href="https://app.izidok.id/">https://app.izidok.id</a>&nbsp;dan&nbsp;<a href="https://beta.izidok.id/">https://beta.izidok.id</a>&nbsp;), Anda akan memilih kata sandi dan detil informasi login lainnya untuk identifikasi diri Anda. Anda dilarang untuk mengungkapkan informasi login Anda kepada pihak ketiga manapun, kecuali apabila diperlukan berdasarkan hukum dan peraturan perundang-undangan yang berlaku (yang mana hal tersebut harus disampaikan kepada kami secara tertulis dengan segera). Anda setuju untuk menanggung setiap resiko terkait pengungkapan informasi login Anda kepada pihak ketiga manapun dan bertanggung jawab secara penuh atas setiap konsekuensi yang berkaitan dengan itu.</p>

                                <p>2.5 Dalam menggunakan izidok, Anda menyatakan dan menjamin bahwa Anda adalah seorang Dokter Praktik Mandiri yang telah memiliki SIP (Surat Izin Praktik) yang sah dan masih berlaku sampai dengan jangka waktu yang ditentukan, dan terdaftar dalam daftar keanggotaan IDI (Ikatan Dokter Indonesia). Serta untuk Klinik merupakan Klinik yang secara sah memiliki no. izin klinik/izin operasional yang masih berlaku. Apabila Anda tidak memenuhi ketentuan tersebut namun tetap menggunakan izidok, dan menyalahgunakan izidok untuk melakukan tindakan di luar hukum, maka hal tersebut merupakan pelanggaran atas salah satu ketentuan penggunaan atau peraturan perundang-undangan yang berlaku, dimana Anda wajib untuk bertanggung jawab dengan melakukan pembelaan (untuk nama dan reputasi izidok), memberikan ganti rugi serta secara penuh melepaskan Kami dan petugas Kami dari kerugian atau konsekuensi yang timbul sehubungan dengan hal tersebut.</p>

                                <h2>PASAL 3 - KETENTUAN PENGGUNAAN</h2>

                                <p>3.1 Anda hanya dapat menggunakan akun izidok ketika Anda telah mendaftar pada website izidok&nbsp;<a href="https://app.izidok.id/">https://app.izidok.id</a>&nbsp;dan&nbsp;<a href="https://beta.izidok.id/">https://beta.izidok.id</a>&nbsp;Setelah Anda berhasil mendaftarkan diri, izidok akan memberikan Anda suatu akun yang dapat diakses dengan kata sandi yang Anda pilih, yang berisi seluruh layanan-layanan izidok untuk pengelolaan operasional Dokter Praktik Mandiri dan Klinik.</p>

                                <p>3.2 Untuk dapat mengakses seluruh layanan izidok dalam jangka waktu berkelanjutan, Anda akan diwajibkan untuk melakukan pembayaran biaya berlangganan/subskripsi sesuai dengan ketentuan yang telah dibuat oleh pihak izidok dan dicantumkan dalam website&nbsp;<a href="https://izidok.id/">https://izidok.id</a>.</p>

                                <p>3.3 Biaya berlangganan/subskripsi setelah dibayarkan, memiliki makna bahwa Anda telah bersedia untuk menggunakan izidok sesuai dengan syarat &amp; ketentuan, serta kebijakan privasi yang berlaku.</p>

                                <p>3.4 Biaya subskripsi yang tercantum pada detail pembelian/billing merupakan jumlah pasti atau nett, sehingga Anda akan melakukan pembayaran sesuai dengan jumlah yang telah ditetapkan dan tidak adanya sistem refund apabila terjadi kesalahan yang dilakukan dari pihak Anda.</p>

                                <p>3.5 Anda memahami dan setuju bahwa apabila tidak melanjutkan berlangganan/ membayar biaya subskripsi maka akan terdapat pembatasan akses, penghentian akses, bagi sebagian maupun seluruh fitur layanan yang diberikan oleh izidok. Untuk mendapatkan kembali akses menyeluruh, Anda harus kembali melanjutkan berlangganan izidok.</p>

                                <p>3.6 Seluruh layanan yang diberikan oleh izidok tersebut dapat berubah dari waktu ke waktu sebagaimana kami memperbaiki, memodifikasi dan menambahkan fitur tambahan lainnya. Kami dapat menghentikan, menangguhkan, merubah, atau menghilangkan Layanan pada setiap waktu tanpa adanya pemberitahuan kepada Anda. Penggunaan Anda secara berkelanjutan atas izidok setelah modifikasi, variasi dan/atau perubahan atas Ketentuan Penggunaan merupakan persetujuan dan penerimaan Anda atas modifikasi, variasi dan/atau perubahan tersebut.</p>

                                <p>3.7 Anda memahami dan setuju bahwa penggunaan akun izidok oleh Anda, menunjukkan bahwa Anda akan tunduk pula pada Kebijakan Privasi kami, sebagaimana dapat dirubah dari waktu ke waktu. Dengan menggunakan akun izidok, Anda juga memberikan persetujuan sebagaimana dipersyaratkan berdasarkan Kebijakan Privasi kami.</p>

                                <p>3.8 Mohon menginformasikan kepada kami jika Anda tidak lagi memiliki kontrol atas akun Anda, sebagai contoh akun Anda dengan cara bagaimanapun diretas (hack) atau telepon Anda dicuri, sehingga kami dapat membatalkan akun Anda dengan sebagaimana mestinya. Mohon diperhatikan bahwa Anda bertanggung jawab atas penggunaan akun Anda dan Anda mungkin dapat dimintakan tanggung jawabnya meskipun jika akun Anda tersebut disalahgunakan oleh orang lain.</p>

                                <p>3.9 izidok berhak untuk membatasi atau menghentikan penggunaan akun izidok jika izidok memiliki alasan untuk mencurigai bahwa Anda sebagai pengguna telah melanggar ketentuan dalam Perjanjian ini, Syarat dan Ketentuan izidok, atau peraturan perundang-undangan yang berlaku.</p>

                                <p>3.10 Segala bentuk pemberitahuan, permintaan informasi atau komunikasi kepada atau tentang Anda akan dianggap telah diterima oleh Anda jika: izidok telah mengirimkan e-mail atau surat elektronik atau surat tertulis kepada Anda melalui alamat yang dicantumkan oleh Anda dalam akun Pengguna izidok; atau Jika dianggap diperlukan oleh izidok, izidok memasang pengumuman baik yang bisa diakses secara umum ataupun terbatas pada akun izidok.</p>

                                <p>3.11 Untuk Pihak Klinik/Dokter Praktik Mandiri, Anda mengakui dan menyetujui bahwa :</p>

                                <ol>
                                    <li>Adalah tanggung jawab Pihak Klinik/Dokter Praktik Mandiri untuk menentukan siapa yang mendapat akses sebagai Operator dan jenis peran dan hak yang mereka punya untuk mengakses jenis data yang Anda miliki;</li>
                                    <li>Adalah tanggung jawab Pihak Klinik/Dokter Praktik Mandiri atas semua penggunaan Layanan oleh Operator.</li>
                                    <li>Adalah tanggung jawab Pihak Klinik/Dokter Praktik Mandiri untuk mengendalikan setiap tingkat akses untuk Operator kepada organisasi dan Layanan yang relevan setiap saat, dan bisa menarik atau mengubah akses atau tingkat akses Operator kapanpun, untuk alasan apapun di dalam permasalahan manapun;</li>
                                </ol>

                                <h2>PASAL 4 - DATA</h2>

                                <p>4.1 Anda memberikan hak kepada izidok untuk merekam atau menyimpan segala bentuk interaksi atau komunikasi antara pengguna dengan pasien secara otomatis. Anda dapat memberikan atau mengunggah deskripsi pribadi, foto, dan/atau termasuk diantaranya informasi tentang kesehatan pengguna, rekam medis, performa fisik dan mental, informasi penyakit dan disabilitas, ras, jenis kelamin, usia dan informasi sensitif lainnya. Segala data yang disimpan oleh izidok yang berasal dari interaksi ataupun komunikasi antara pengguna dengan pasien akan digunakan oleh izidok semata-mata untuk keperluan legal dan peningkatan kualitas pelayanan medis izidok. Izidok menjamin kerahasiaan data Anda dan semua data tidak akan disebarluaskan dengan sengaja oleh izidok.</p>

                                <p>4.2 Mengenai penyimpanan data rekam medis, berdasarkan Permenkes no. 269/menkes/per/III/2008 perihal penyimpanan rekam medis pada faskes Non-RS, maka rekam medis pasien Anda dapat disimpan pada database izidok selama maksimal 3 tahun dari tanggal terakhir pasien berobat.</p>

                                <p>4.3 Rekam Medis pada izidok untuk Klinik, telah diatur/disesuaikan dengan Permenkes no. 269/menkes/per/III/2008 bab IV pasal 10, 11, dan 12 bahwa:</p>

                                <ol style="list-style-type:lower-alpha">
                                    <li>Informasi tentang identitas, diagnosis, riwayat penyakit, riwayat pemeriksaan dan riwayat pengobatan bersifat rahasia dan harus dijaga oleh dokter, dokter gigi, tenaga kesehatan tertentu, petugas pengelola dan pimpinan sarana pelayanan kesehatan, namun dapat dibuka dalam hal kepentingan kesehatan pasien. Sehingga izidok dapat mengintegrasikan data rekam medis tersebut untuk dokter/lembaga/pemohon lain yang membutuhkan data tersebut untuk kepentingan pasien maupun kepentingan lain yang tercatat pada Permenkes no. 269/menkes/per/III/2008 bab IV pasal 10.</li>
                                    <li>Informasi rekam medis dapat dijelaskan oleh pimpinan sarana pelayanan kesehatan, sehingga data rekam medis seluruh pasien klinik di izidok disimpan pada akun penanggung jawab klinik/PIC secara aman.</li>
                                    <li>Berkas rekam medis merupakan milik sarana pelayanan kesehatan. Sehingga pihak klinik dapat menyimpan, mengunduh, mencetak berkas rekam medis dari izidok jika dibutuhkan dengan tetap menjaga kerahasiaan dari isi rekam medis tersebut.</li>
                                </ol>

                                <p>4.4 Adapun informasi-informasi lain yang secara otomatis diambil oleh izidok adalah sebagai berikut:<br />
                                Informasi teknis, termasuk di dalamnya alamat Internet Protocol (IP address) yang digunakan oleh PC, laptop, tablet maupun perangkat lainnya untuk mengakses website izidok, informasi login, jenis dan versi dari sistem operasi (operating system), zona waktu, lokasi, dan informasi kunjungan Anda, termasuk di dalamnya layanan dan jasa yang dilihat atau digunakan, waktu respon, informasi interaksi dan nomor telepon yang digunakan untuk dan oleh Anda.</p>

                                <p>4.5 Kami akan menggunakan informasi tersebut diatas (pasal 4.4) untuk mengawasi dan menganalisa penggunaan layanan, untuk administrasi layanan secara teknis, untuk menambah fungsi dari layanan kami dan untuk memverifikasi apakah Anda sebagai pengguna memiliki otoritas yang diperlukan untuk memanfaatkan layanan sesuai permintaan Anda.</p>

                                <p>4.6 Kami dapat mengumpulkan informasi personal yang dapat digunakan untuk menghubungi atau mengidentifikasi Anda. Informasi Personal adalah informasi yang dapat digunakan untuk: (a) menyediakan dan meningkatkan layanan kami, (b) mengatur penggunaan layanan, (c) lebih mengenal kebutuhan dan kepentingan Anda, (d) untuk melakukan personalisasi dan meningkatkan pengalaman Anda, dan (e) untuk menggunakan pembaharuan software dan pengumuman produk.</p>

                                <p>4.7 Data personal Anda dijaga berdasarkan Kebijakan Privasi Kami. Kebijakan Privasi dianggap sebagai bagian yang tidak terpisahkan dari Ketentuan Penggunaan ini dan persetujuan Anda atas Ketentuan Penggunaan ini merupakan penerimaan Anda atas Kebijakan Privasi Kami.</p>

                                <p>4.8 Kami dapat memindahkan dan mengalihkan Data Anda dalam hal terjadinya merjer, akuisisi, atau penjualan dari seluruh atau sebagian dari asset Kami, tanpa memberikan pemberitahuan sebelumnya kepada Anda. Anda dengan ini memberikan persetujuan dan kesepakatannya apabila pemindahan tersebut terjadi.</p>

                                <p>4.9 Sebagai suatu pengguna yang terdaftar, Anda dapat memeriksa, memperbaharui, memperbaiki atau menghapus Informasi Personal yang disediakan saat pendaftaran atau profil akun dengan merubah Pengaturan Akun. Dalam hal pabila Anda secara pribadi merubah informasi yang dapat diinformasikan, Anda dapat memperbaharui atau menghapusnya dengan melakukan perubahan pada Pengaturan Akun Anda. Kami menyimpan salinan dari informasi Anda apabila dipersyaratkan oleh hukum.</p>

                                <p>4.10 Kami akan menyimpan informasi Anda selama akun Anda aktif atau sebagaimana yang Kami butuhkan untuk menyediakan Anda dengan layanan. Apabila anda berniat untuk membatalkan akun Anda atau meminta Kami untuk tidak lagi menggunakan informasi Anda untuk memberikan Anda dengan pelayanan, Anda dapat menghapus akun Anda. Konsisten dengan persyaratan ini, Kami akan menghapus informasi Anda segera pada saat diminta. Akan tetapi mohon diketahui bahwa terdapat risiko dari server dan versi cadangan Kami yang mungkin masih ada setelah penghapusan. Sebagai tambahan, kami tidak menghapus dari server kami yang Anda miliki bersama dengan pengguna lain.</p>

                                <p>4.11 Pengguna dapat memberikan informasi mengenai nama, alamat, alamat surat elektronik, nomor telepon, informasi kartu kredit dan finansial. Pengguna memberikan hak kepada izidok untuk menyimpan serta menampilkannya dalam akun Pengguna serta dalam data izidok Kerahasiaan data Pengguna terjamin dan akan digunakan hanya untuk keperluan interaksi dengan Dokter yang dilakukan melalui Produk izidok</p>

                                <h2>PASAL 5 - TANGGUNG JAWAB</h2>

                                <p>5.1 Anda bertanggung jawab secara pribadi atas setiap aktivitas yang menggunakan akun Anda, untuk menjaga Data dan pembagian Data yang Anda lakukan kepada suatu pihak ketiga. Anda wajib untuk dengan segera memberitahukan izidok mengenai adanya penggunaan akun Anda secara tidak berwenang.</p>

                                <p>5.2 Anda bertanggung jawab untuk menjaga kata sandi yang Anda gunakan untuk mengakses Layanan dan Anda sepakat untuk tidak memberitahukan kata sandi Anda kepada pihak ketiga manapun.</p>

                                <p>5.3 Anda bertanggung jawab secara penuh atas keaslian, akurasi, kelengkapan dan/atau legalitas dari setiap jenis Data yang Anda berikan kepada izidok. Anda diwajibkan untuk senantiasa memeriksa dan memberikan konfirmasi apakah Data yang diberikan sudah benar.</p>

                                <p>5.4 Anda secara tegas mengesampingkan dan melepaskan kami dari setiap dan semua kewajiban, tuntutan atau kerugian yang timbul dari atau dengan cara apapun sehubungan dengan Penyedia Layanan Kesehatan (Anda, Dokter Praktik Mandiri maupun Klinik) dengan pasien. Perusahaan tidak akan menjadi pihak dalam sengketa, negosiasi sengketa antara Anda dan pasien. Anda secara tegas mengesampingkan dan melepaskan Kami dari setiap dan semua kewajiban, tuntutan, penyebab tindakan, dan atau kerusakan yang timbul dari penggunaan layanan izidok.</p>

                                <p>5.5 Anda akan membebaskan izidok dari segala tuntutan apapun, jika izidok tidak dapat melaksanakan perintah dari Anda baik sebagian maupun seluruhnya karena kejadian-kejadian atau sebab-sebab di luar kekuasaan atau kemampuan izidok, termasuk namun tidak terbatas pada segala gangguan virus komputer, bencana alam, perang, huru-hara, keadaan peralatan, sistem atau transmisi yang tidak berfungsi, gangguan listrik, gangguan telekomunikasi dan kebijakan pemerintah.</p>

                                <p>5.6 Anda bertanggung jawab atas keamanan perangkat dan/atau Komputer Anda yang digunakan untuk mengakses Akun izidok dengan secara wajar menjaga dan menyediakan memori penyimpanan yang cukup untuk mencegah setiap kegagalan atau gangguan atas setiap proses Layanan izidok yang disebabkan oleh kegagalan fungsi perangkat dan/atau Komputer Anda.</p>

                                <h2>PASAL 6 - GANTI RUGI</h2>

                                <p>6.1 Dengan menggunakan izidok ini, Anda setuju bahwa Anda akan membela, memberikan ganti rugi dan membebaskan Kami, pemberi lisensi, afiliasi, dan masing-masing dari petugas, direktur, komisaris, karyawan, dari dan terhadap setiap semua klaim, biaya, kerusakan, kerugian, kewajiban dan biaya (termasuk biaya dan ongkos pengacara) yang timbul dari atau sehubungan dengan:<br />
                                Penggunaan Layanan dan/atau Akun izidok oleh Anda, hubungan Anda dengan sesama penyedia layanan kesehatan, pasien, mitra, pemasang iklan dan/atau sponsor;<br />
                                Pelanggaran atas atau tidak dipatuhinya salah satu Ketentuan Penggunaan atau peraturan perundang-undangan yang berlaku, baik yang disebutkan di sini atau tidak;<br />
                                Penggunaan atau penyalahgunaan Akun. Kewajiban pembelaan dan pemberian ganti rugi ini akan tetap berlaku walaupun Ketentuan dan penggunaan Layanan oleh Anda telah berakhir.</p>

                                <h2>PASAL 7 - KEKAYAAN INTELEKTUAL</h2>

                                <p>7.1 izidok, termasuk nama dan logonya, kode, desain, teknologi, model bisnis, dilindungi oleh hak cipta, merek dan hak kekayaan intelektual lainnya yang tersedia berdasarkan hukum Republik Indonesia. Kami (dan pihak yang memperoleh lisensi dari kami, jika berlaku) memiliki seluruh hak dan kepentingan atas izidok, termasuk seluruh hak kekayaan intelektual yang berhubungan dengannya. Syarat dan Ketentuan ini tidak dan dengan cara apapun tidak akan dianggap sebagai pemberian izin kepada Anda untuk menggunakan setiap hak kekayaan intelektual kami sebagaimana disebutkan di atas.</p>

                                <p>7.2 Ketentuan ini tidak memberikan Anda hak, titel, atau kepentingan pada Layanan, perangkat lunak (software), atau isi dari Layanan. Kami dapat menggunakan umpan balik (feedback), komentar, atau saran-saran yang Anda kirimkan kepada kami tanpa adanya kewajiban apapun terhadap Anda. Perangkat lunak (software) dan teknologi lainnya yang kami gunakan untuk memberikan Layanan dilindungi oleh hak cipta, hak merek dari hukum Republik Indonesia.</p>

                                <h2>PASAL 8 - HUKUM YANG BERLAKU DAN JURISDIKSI</h2>

                                <p>8.1 Ketentuan ini akan diatur, diartikan, dan diinterpretasikan berdasarkan hukum Republik Indonesia. Setiap dan seluruh perselisihan yang timbul dari penggunaan layanan kami akan tunduk pada yurisdiksi eksklusif di Pengadilan Negeri Jakarta Selatan.</p>

                                <p>8.2 Setiap sengketa, kontroversi atau perbedaan yang dapat timbul diantara Para Pihak atau terkait dengan atau sehubungan dengan Ketentuan ini, atau mengenai konstruksi, pengakhiran, atau pelanggaran terhadap Ketentuan ini, akan diselesaikan secara baik-baik oleh Para Pihak. Apabila sengketa, kontroversi atau perbedaan tersebut tidak dapat diselesaikan dalam waktu tiga puluh (30) hari sejak pemberitahuan tertulis diberitahukan kepada salah satu pihak kepada pihak lainnya, maka Para Pihak sepakat untuk memasukkan sengketa tersebut ke Pengadilan Negeri Jakarta Selatan.</p>

                                <h2>PASAL 9 - PENGAKHIRAN</h2>

                                <p>9.1 Akun izidok Anda dapat ditutup karena hal-hal sebagai berikut:</p>

                                <ol style="list-style-type:lower-alpha">
                                    <li>Permintaan oleh Anda;</li>
                                    <li>Kebijakan Kami berdasarkan hukum dan peraturan perundang-undangan yang berlaku;</li>
                                    <li>Keadaan Kahar terjadi selama 3 (tiga) bulan atau lebih secara berturut-turut; dan/atau alasan sehubungan dengan Pemblokiran Akun.</li>
                                </ol>

                                <p>9.2 Jika Akun Anda, dikarenakan suatu hal yang diatur pada ketentuan ini maupun tidak, diblokir dan Anda ingin mengaktifkan kembali akun tersebut, Anda dapat mengajukan keluhan kepada Kami. Setelah melakukan verifikasi atas informasi personal Anda, kami dapat, berdasarkan keputusan direksi kami, menentukan untuk mengakhiri atau melanjutkan pemblokiran akun.</p>

                                <h2>PASAL 10 - LAIN-LAIN</h2>

                                <p>10.1 Ketentuan ini adalah keseluruhan perjanjian antara Para Pihak sehubungan dengan subyek dari Ketentuan ini dan akan menggantikan seluruh perjanjian atau pengaturan sebelumnya. Ketentuan ini akan berlaku secara penuh dan mengikat sejak tanggal Anda menerima Ketentuan ini sampai Anda mengakhiri akun atau kami mengakhiri akun Anda di izidok.</p>

                                <p>10.2 Apabila, pada setiap saat, suatu ketentuan dari Ketentuan ini terbukti menjadi atau menjadi illegal, tidak sah, atau tidak dapat dilaksanakan berdasarkan suatu hukum dari suatu jurisdiksi, tidak satupun legalitas, keabsahan atau pelaksaaan dari ketentuan lainnya terkena dampak atau menjadi tidak sah karenanya berdasarkan hukum dari suatu jurisdiksi.</p>

                                <p>10.3 Anda tidak diperkenankan dan Anda sepakat untuk tidak mengalihkan setiap hak dan kewajiban yang anda miliki berdasarkan Ketentuan ini tanpa adanya persetujuan sebelumnya dari izidok. Kami memiliki hak untuk mengalihkan setiap hak dan kewajiban yang dimiliki berdasarkan Ketentuan ini kepada afiliasinya atau sehubungan dengan merjer, akuisisi, reorganisasi perusahaan, atau penjualan seluruh atau sebagian besar asset tanpa memberikan pemberitahuan. Segala usaha lainnya untuk mengalihkan adalah batal.</p>

                                <p>10.4 Layanan kami dapat diinterupsi oleh kejadian atau hal tertentu di luar kewenangan dan kontrol kami (Keadaan Kahar), termasuk namun tidak terbatas pada bencana alam, gangguan listrik, gangguan telekomunikasi, kebijakan pemerintah, dan hal-hal lainnya yang di luar kewenangan dan kontrol kami. Anda oleh karenanya setuju untuk melepaskan kami dari setiap klaim, jika kami tidak dapat memenuhi instruksi Anda melalui Akun izidok baik sebagian maupun seluruhnya karena Keadaan Kahar. Jika Keadaan Kahar terus berlanjut untuk jangka waktu lebih dari 3 (tiga) bulan berturut-turut kami dapat menutup Akun izidok Anda.</p>

                                <p>10.5 Keselamatan dan keamanan online Anda merupakan hal terpenting bagi kami. Kami memberlakukan standar keamanan yang wajar untuk melindungi data Anda yang sedang dalam proses pengiriman, ketika disimpan dan penggunaan Anda atas Akun izidok dan/atau Layanan izidok. Meskipun demikian, kami hendak menekankan kepada Anda bahwa tidak ada sistem yang tidak dapat ditembus dan hal ini dapat berakibat pada meningkatnya resiko atas informasi Anda dan penggunaan Akun izidok dan/atau Layanan izidok. Oleh karenanya, Anda setuju untuk melepaskan kami dari klaim apapun yang timbul sehubungan dengan virus, kerusakan, gangguan, atau bentuk lain dari gangguan sistem, termasuk akses tanpa otorisasi oleh pihak ketiga. Kami menganjurkan Anda untuk memberitahu kami segera jika Anda mengalami gangguan sistem apapun sebagaimana disebutkan di atas sehingga kami dapat berusaha memperbaiki gangguan tersebut.</p>

                                <p>Dengan ini Saya telah membaca, memahami dan menyetujui hal-hal yang tercantum pada Syarat dan Ketentuan Pengguna &amp; Kebijakan Privasi yang ditetapkan oleh izidok, dan Saya tidak berkeberatan apabila izidok menggunakan data personal Saya berupa alamat e-mail/nomor handphone untuk kepentingan pengiriman informasi seperti newsletter, brosur, dan lain-lain.</p>

                            </div>
                        </div>
                        <a href="{{ route('landing') }}" class="fs-6 fw-semibold link-primary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection