<div>
    <div class="card">
        <form wire:submit.prevent="save" enctype="multipart/form-data" id="formInp">
            <div class="modal-body">
                <div class="row">

                    <div class="col-md-12" id="inpList">
                        <div class="form-group mb-3">
                            <x-componen-form.input-image-dropify label='Image' wireModel="image" name="image"
                                imageDefault="{{ asset($image) }}" />
                        </div>
                        <div class="form-group mt-3">
                            <label for="inpTitle">Mark</label>
                            <div class="form-check  mt-2">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" wire:model="mark"
                                    value="provider" id="flexRadioDefault2">
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Provider
                                </label>
                            </div>
                            <div class="form-check  mt-2">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" wire:model="mark"
                                    value="maps" id="flexRadioDefault3">
                                <label class="form-check-label" for="flexRadioDefault3">
                                    Maps
                                </label>
                            </div>
                            <div class="form-check mt-2">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" wire:model="mark"
                                    value="client" id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Client
                                </label>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="{{ route('provider') }}" wire:navigate id="close-modal" class="btn btn-warning"
                    data-bs-dismiss="modal"><i class="bx bx-arrow-back"></i> Back</a>
                    <button class="btn btn-primary" type="submit"  wire:loading.attr="disabled" >
                        <i class="bx bx-save"></i>
                        <span wire:loading.remove>Save</span>
                        <span wire:loading>Loading...</span>
                    </button>
                    <!-- Loading Indicator -->
                    <span wire:loading>Loading...</span>
            </div>

        </form>
    </div>
</div>
