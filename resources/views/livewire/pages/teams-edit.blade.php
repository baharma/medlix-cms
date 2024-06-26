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
                        @if ($up_lv)
                            <div class="form-group mb-2">
                                <x-componen-form.input-form label='Title' wireModel="title" name="title"
                                    placeholder="Director" />
                            </div>
                        @endif

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="{{ route('team') }}" wire:navigate id="close-modal" class="btn btn-warning"
                    data-bs-dismiss="modal">
                    <i class="bx bx-arrow-back"></i> Back</a>
                <button type="submit" class="btn btn-primary"><i class="bx bx-save"></i> Submit</button>
            </div>

        </form>
    </div>
</div>
