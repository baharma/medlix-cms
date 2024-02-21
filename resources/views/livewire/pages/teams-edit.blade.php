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
                        <div class="form-group mt-3  @if (auth()->user()->default_cms != 3) d-none @endif">
                            <label for="inpTitle">Only Medlinx Team</label>
                            <div class="form-check  mt-2">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" wire:model="only"
                                    value="3" id="flexRadioDefault2">
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Yes
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" wire:model="only"
                                    value="null" id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    No
                                </label>
                            </div>
                            @error('only')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
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
