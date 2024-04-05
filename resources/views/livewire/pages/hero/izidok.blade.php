<div>
    <div class="d-flex justify-content-between mb-3">
        <h4></h4>
        <button type="button" class="btn" wire:click="refresh"
            style="background-color: #3652AD; color: white; box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);"
            data-bs-toggle="modal" data-bs-target="#ModalHero"> <i class="bx bx-plus"></i> Add/Change Hero Content
        </button>
    </div>
    <div class="card">
        <div class="card-body row">
            <div class="col-md-6">


                <img src="{{ checkImage($image) }}" alt="HeroImage" style="max-width: 500px">
            </div>
            <div class="col-md-6 text-center p-5">
                <h4>{{ $title }}</h4>
                <p>{{ $subTitle }}</p>
                <ul class="list-group">
                    <li class="list-group-item active">Extend Variable</li>
                    @foreach ($extend as $item)
                        <li class="list-group-item"><b>{{ $item['key'] . ':' ?? '' }}</b>{{ $item['val'] ?? '' }}</li>
                    @endforeach
                </ul>
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
                        <button type="button" class="btn-close closeBtn" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <form wire:submit.prevent="save" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group mb-3">
                                        <x-componen-form.input-image-dropify label='Hero  Image' wireModel="image"
                                            imageDefault="{{ asset($image) }}" name="image" />
                                    </div>

                                </div>
                                <div class="col-md-12" id="inpList">
                                    <div class="form-group mb-2">
                                        <label for="inpTitle">Hero Title</label>
                                        <textarea name="" id="" cols="30" rows="3" class="form-control" wire:model="title"
                                            id="inpTitle"></textarea>
                                    </div>
                                    <div class="form-group ">
                                        <label for="inpSubTitle">Hero Sub Title</label>
                                        <textarea name=""cols="30" rows="3" class="form-control" wire:model="subTitle" id="inpSubTitle"></textarea>
                                    </div>

                                    <div class="form-group mt-3">
                                        <label>Extend Variable</label>
                                        <br>
                                        @foreach ($extend as $index => $post)
                                            <div class="input-group mb-2">
                                                <input type="text" placeholder="Key | exp: app_vid_url"
                                                    class="form-control" wire:model="extend.{{ $index }}.key"
                                                    readonly>
                                                <input type="text"
                                                    placeholder="Value | exp: http://"aria-label="Last name"
                                                    class="form-control" wire:model="extend.{{ $index }}.val">
                                                <button type="button" class="btn btn-danger"
                                                    wire:click="removeItem({{ $index }})">
                                                    <i class="bx bx-trash"></i>
                                                </button>
                                            </div>
                                        @endforeach





                                    </div>


                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" id="close-modal" class="btn btn-warning closeBtn"
                                data-bs-dismiss="modal"><i class="bx bx-x"></i> Close</button>
                            <button class="btn btn-primary" type="submit" wire:loading.attr="disabled">
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
                $('.closeBtn').on('click', function() {
                    location.reload()
                })
            </script>
        @endscript
    @endpush

</div>
