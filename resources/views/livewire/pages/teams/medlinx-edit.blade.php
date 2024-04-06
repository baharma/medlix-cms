<div>
    <div class="card">
        <form wire:submit.prevent="save" enctype="multipart/form-data" id="formInp">
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <x-componen-form.input-image-dropify label='Image' wireModel="image"
                                imageDefault="{{ asset($image) }}" name="image" />
                        </div>

                    </div>
                    <div class="col-md-6" id="inpList">
                        <div class="form-group mb-2">
                            <x-componen-form.input-form label='Name' wireModel="name" name="name"
                                placeholder="Fauzi Sungkar" />
                        </div>
                        <div class="form-group mb-2">
                            <x-componen-form.input-form label='Title' wireModel="title" name="title"
                                placeholder="Director" />
                        </div>
                        <label for="Social" class="mt-3">Social</label>
                        <div class="input-group mb-3 ">
                            <button type="button" class="btn btn-info text-light" id="btnTwitter" style="width: 170px">
                                <i class='bx bxl-twitter'></i>
                                Add Twitter</button>
                            <input type="text" class="form-control @if (!$check['tw']) d-none @endif"
                                id="inpTwitter" placeholder="twitter url" wire:model="twitter">
                        </div>
                        <div class="input-group mb-3 ">
                            <button type="button" class="btn btn-danger" id="btnInstagram" style="width: 170px">
                                <i class='bx bxl-instagram'></i> Add instagram</button>
                            <input type="text" class="form-control @if (!$check['ig']) d-none @endif"
                                id="inpInstagram" placeholder="instagram url" wire:model="instagram">
                        </div>
                        <div class="input-group mb-3 ">
                            <button type="button" class="btn btn-info text-light" id="btnLinkedin"
                                style="width: 170px">
                                <i class='bx bxl-linkedin'></i>
                                Add LinkedIn</button>
                            <input type="text" class="form-control @if (!$check['in']) d-none @endif"
                                id="inpLinkedin" placeholder="linked url" wire:model="linkedin">
                        </div>
                        <div class="input-group mb-3 ">
                            <button type="button" class="btn btn-primary" id="btnFacebook" style="width: 170px"> <i
                                    class='bx bxl-facebook'></i> Add
                                Facebook</button>
                            <input type="text" class="form-control @if (!$check['fb']) d-none @endif"
                                id="inpFacebook" placeholder="facebook url" wire:model="facebook">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="{{ route('team.medlinx') }}" wire:navigate id="close-modal" class="btn btn-warning"
                    data-bs-dismiss="modal">
                    <i class="bx bx-arrow-back"></i> Back</a>
                <button type="submit" class="btn btn-primary"><i class="bx bx-save"></i> Submit</button>
            </div>

        </form>
    </div>
</div>

@push('script')
    @script
        <script>
            $("#btnTwitter").click(function() {
                $("#inpTwitter").toggleClass("d-none");
            });
            $("#btnInstagram").click(function() {
                $("#inpInstagram").toggleClass("d-none");
            });
            $("#btnLinkedin").click(function() {
                $("#inpLinkedin").toggleClass("d-none");
            });
            $("#btnFacebook").click(function() {
                $("#inpFacebook").toggleClass("d-none");
            });
        </script>
    @endscript
@endpush
</div>
