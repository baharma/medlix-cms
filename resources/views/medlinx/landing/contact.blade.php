<section id="contact" class="contact-area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-10">
                <div class="section-title text-center pb-30">
                    <h3 class="title">KONTAK KAMI</h3>
                </div> <!-- section title -->
            </div>
        </div> <!-- row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="contact-wrapper form-style-two">
                    <form id="contact-form" action="{{route('send-message')}}" method="post">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-input mt-25">
                                    <label>Nama</label>
                                    <div class="input-items default">
                                        <input name="subject" id="subject" type="hidden" placeholder="subject">
                                        <input name="name" type="text" placeholder="Nama" data-rule-required="true" data-msg-required="Please enter your name" required>
                                        <i class="lni lni-user"></i>
                                    </div>
                                </div>
                                <div class="form-input mt-25">
                                    <label>No. Handphone</label>
                                    <div class="input-items default">
                                        <input name="phone" type="text" class="number" placeholder="No. Handphone" data-rule-required="true" data-msg-required="Please enter your phone" required>
                                        <i class="lni lni-phone"></i>
                                    </div>
                                </div>
                                <div class="form-input mt-25">
                                    <label>Email</label>
                                    <div class="input-items default">
                                        <input type="email" name="email" placeholder="Email" data-rule-required="true" data-rule-email="true" data-msg-required="Please enter your email address" data-msg-email="Please enter a valid email address" required>
                                        <i class="lni lni-envelope"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 contact-radio">
                                        <div class="form-input mt-45">
                                            <div class="input-items default">
                                                <div class="label-radio">Pertanyaan</div>
                                                <input class="input-radio" type="radio" value="Pertanyaan" id="pertanyaan" name="type">
                                            </div>
                                        </div>
                                        <div class="form-input">
                                            <div class="input-items default">
                                                <div class="label-radio">Petunjuk Penggunaan</div>
                                                <input class="input-radio" type="radio" value="Petunjuk Penggunaan" id="petunjuk" name="type">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 contact-radio">
                                        <div class="form-input mt-45">
                                            <div class="input-items default">
                                                <div class="label-radio">Kritik & Saran</div>
                                                <input class="input-radio" type="radio" value="Kritik & Saran" id="kritik" name="type">
                                            </div>
                                        </div>
                                        <div class="form-input">
                                            <div class="input-items default">
                                                <div class="label-radio">Lainnya</div>
                                                <input class="input-radio" type="radio" value="Lainnya" id="lainnya" name="type">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-input mt-10 contact-textarea">
                                    <!-- <label>Pesan</label> -->
                                    <div class="input-items default">
                                        <textarea name="massage" id="message" placeholder="Tulis Pesan Anda" data-rule-required="true" data-msg-required="Please enter your message" required></textarea>
                                        <i class="lni lni-pencil-alt"></i>
                                    </div>
                                </div> <!-- form input -->
                            </div>
                            <div class="col-md-12">
                                <div class="form-input light-rounded-buttons mt-30 float-right">
                                    <button type="submit" class="main-btn light-rounded-two btn-contact" disabled>Kirim</button>
                                </div> <!-- form input -->
                            </div>
                        </div> <!-- row -->
                    </form>
                </div> <!-- contact wrapper form -->
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
</section>