<div>
    <div class="d-flex justify-content-between mb-3">
        <h4></h4>
        {{-- <button type="button" class="btn btn-lg btn-success"
            style="box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);" data-bs-toggle="modal"
            data-bs-target="#formPlanFeatures"> <i class="bx bx-plus"></i> Add Plan
            Feature</button> --}}
        <button type="button" class="btn"
            style="background-color: #3652AD; color: white; box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);"
            data-bs-toggle="modal" data-bs-target="#ModalHero"> <i class="bx bx-plus"></i> Add/Change Hero Content
        </button>
    </div>
    <div class="card">
        <div class="card-body row text-center">
            <h4 class="mb-5">{{ $title }}</h4>
            <div class="col-md-6 ">
                <h6>Hero Image</h6>
                <div class="hero-image border">
                    <img src="{{ checkImage($image) }}" alt="HeroImage" style="max-width: 500px">
                </div>
            </div>
            <div class="col-md-6">
                <h6>Hero Sub Image</h6>
                <div class="hero-image border">
                    <img src="{{ checkImage($subimage) }}" alt="HeroSubImage" style="max-width: 200px">
                </div>
            </div>

        </div>
    </div>


    <div>
        <div class="modal fade" id="ModalHero" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            wire:ignore.self aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg " wire:ignore.self>
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title mb-0 text-info" id="staticBackdropLabel">Form Hero Area</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form wire:submit.prevent="save" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group mb-3">
                                        <x-componen-form.input-image-dropify label='Image' wireModel="image"
                                            imageDefault="{{ $image }}" name="image" />
                                            @error('image')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <x-componen-form.input-image-dropify label='SubImage' wireModel="subimage"
                                            imageDefault="{{ $subimage }}" name="subimage" />
                                            @error('subimage')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12" id="inpList">
                                    <div class="form-group mb-2">
                                        <label for="inpTitle">Hero Title</label>
                                        <textarea name="" id="" cols="30" rows="3" class="form-control" wire:model="title"
                                            id="inpTitle"></textarea>
                                            @error('title')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" id="close-modal" class="btn btn-warning" data-bs-dismiss="modal"><i
                                    class="bx bx-x"></i> Close</button>
                                    <button class="btn btn-primary" type="submit"  wire:loading.attr="disabled" :disabled="$isSubmitting">
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
        </div>

    </div>


    @push('scripts')
        @script
            <script>
                $wire.on('modalClosed', () => {
                    const closeButton = document.getElementById('close-modal');
                    if (closeButton) {
                        closeButton.click();
                    } else {
                        console.error('Button with ID "close-modal" not found');
                    }
                });
                $wire.on('sentToImage', (Image) => {
                    const image = document.getElementById('image');
                    const imageUrl = `${window.location.origin}/${Image}`;
                    image.setAttribute('data-default-file', imageUrl);

                });
            </script>
        @endscript
    @endpush

</div>
