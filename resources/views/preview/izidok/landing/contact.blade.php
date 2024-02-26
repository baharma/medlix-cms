<div class="pt-20 contact" id="contact">
    <div class="container-fluid">
        <div class="my-17">
            <div class="container">
                <div class="row mb-5">
                    <div class="col-12 text-center">
                        <h2 class="text-primary">Hubungi Kami</h2>
                        <p>Apabila ada pertanyaan terkait izidok, silakan hubungi Customer Care kami.</p>
                    </div>
                </div>
                <div class="row py-5">
                    <div class="col">
                        <iframe style="border:0; width: 100%; height: 370px;"
                            src="{{ $app['gmaps'] ?? 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.026337030271!2d106.79387927578139!3d-6.260261061291903!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x66517b8cb4180971%3A0xc27bbf2d71f5030b!2sizidok!5e0!3m2!1sid!2sid!4v1697611425066!5m2!1sid!2sid' }} "
                            allowfullscreen referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
                <div class="row py-5">
                    <div class="col-lg-4">
                        <div class="info">
                            <div class="address">
                                <i class="bi bi-geo-alt"></i>
                                <h4>Lokasi:</h4>
                                <p>{!! $app['address'] !!}
                                </p>
                            </div>
                            <div class="email">
                                <i class="bi bi-envelope"></i>
                                <h4>Email:</h4>
                                <p>{{ $app['mail'] }}</p>
                            </div>
                            <div class="phone">
                                <i class="bi bi-telephone"></i>
                                <h4>Telepon:</h4>
                                <p>{{ $app['phone'] }}</p>
                            </div>
                            <div class="whatsapp">
                                <i class="bi bi-whatsapp"></i>
                                <h4>WhatsApp:</h4>
                                <p>{{ $app['wa'] }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 mt-5 mt-lg-0">
                        <form method="post" action="#" role="form" class="contact-form" id="contact-form">
                            @csrf
                            <div class="row gy-2 gx-md-3">
                                <div class="col-md-6 form-group mb-3">
                                    <input type="text" class="form-control" name="name" id="name"
                                        placeholder="Nama" required>
                                </div>
                                <div class="col-md-6 form-group mb-3">
                                    <input type="text" class="form-control number" name="phone" id="phone"
                                        placeholder="Nomor HP" required>
                                </div>
                                <div class="col-md-6 form-group mb-3">
                                    <input type="email" class="form-control" name="email" id="email"
                                        placeholder="Alamat Email" required>
                                </div>
                                <div class="col-md-6 form-group mb-3">
                                    <select class="form-select" name="pilihan" id="pilihan">
                                        <option value="" selected disabled>Pilih Perihal</option>
                                        <option value="Demo">Demo</option>
                                        <option value="Customize Paket">Customize Paket</option>
                                        <option value="Feedback & Saran">Feedback & Saran</option>
                                        <option value="Lainnya">Lainnya</option>
                                    </select>
                                </div>
                                <div class="col-md-12 form-group mb-3">
                                    <input type="text" class="form-control" name="profesi" id="profesi"
                                        placeholder="Profesi. Contoh: Dokter, Perawat, Admin, dsb" required>
                                </div>
                                <div class="form-group col-12 mb-3">
                                    <textarea class="form-control" name="pesan" id="pesan" rows="5" placeholder="Pesan" required></textarea>
                                </div>
                                <div class="text-center d-grid d-sm-block">
                                    <button class="btn btn-primary" type="submit">Kirim Pesan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
