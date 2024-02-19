@push('style')
    <script src="https://cdn.ckeditor.com/ckeditor5/41.1.0/classic/ckeditor.js"></script>
@endpush
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
    @foreach ($model as $item)
        @php
            $extend_var = json_decode($item->extend, true);
            $image = $extend_var['image'];
            $img_position = $extend_var['img_postion'];
            $mini_image = $extend_var['mini_image'] ?? false;
            $button = $extend_var['button'] ?? false;
            $icon = $extend_var['icon'] ?? false;

        @endphp
        <div class="card">
            <div class="card-body row">
                @if ($img_position == 'right')
                    <div class="col-md-6">
                        @if ($icon)
                            <img src="{{ asset($icon) }}" alt="icon" class="mb-3">
                        @endif
                        <h5>{{ $item->title }}</h5>
                        {!! $item->sub_title !!}
                        @if ($button)
                            <div class="col">
                                <button type="button" class="btn btn-primary" data-bs-toggle="tooltip"
                                    data-bs-placement="right" title="{{ $button['val'] }}">
                                    {{ $button['name'] }}</button>
                            </div>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <img src="{{ $image }}" alt="image" style="max-width: 300px">
                        @if ($mini_image)
                            <img src="{{ $mini_image }}" alt="image" style="max-width: 100px">
                        @endif
                    </div>
                @else
                    <div class="col-md-6">
                        <img src="{{ $image }}" alt="image" style="max-width: 300px">
                        @if ($mini_image)
                            <img src="{{ $mini_image }}" alt="image" style="max-width: 100px">
                        @endif
                    </div>
                    <div class="col-md-6">
                        @if ($icon)
                            <img src="{{ asset($icon) }}" alt="icon" class="mb-3">
                        @endif
                        <h5>{{ $item->title }}</h5>
                        {!! $item->sub_title !!}
                        @if ($button)
                            <div class="col">
                                <button type="button" class="btn btn-primary" data-bs-toggle="tooltip"
                                    data-bs-placement="right" title="{{ $button['val'] }}">
                                    {{ $button['name'] }}</button>
                            </div>
                        @endif
                    </div>
                @endif
                <div class="card-footer mt-3 d-none">
                    <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#ModalEdit"
                        wire:click="editEvent('{{ $item->id }}')"><i class="bx bx-edit"></i></button>
                    <button class="btn btn-danger"><i class="bx bx-trash"></i></button>
                </div>
            </div>
        </div>
    @endforeach

    <div>
        <div class="modal fade" id="ModalHero" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            wire:ignore.self aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg " wire:ignore.self>
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title mb-0 text-info" id="staticBackdropLabel">Form Solution</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form wire:submit.prevent="save" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group mb-3">
                                        <x-componen-form.input-image-dropify label='Image' wireModel="image"
                                            name="image" />
                                        @error('image')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <x-componen-form.input-image-dropify label='MiniIMG' wireModel="miniImage"
                                            name="miniImage" />
                                    </div>
                                </div>
                                <div class="col-md-12 row">
                                    <div class="col-md-4 form-group mb-3">
                                        <x-componen-form.input-image-dropify label='SvgIcon' wireModel="svg"
                                            name="svg" />
                                    </div>
                                    <div class="col-md-8 form-group mt-3">
                                        <div class="form-group mt-3">
                                            <label for="inpTitle">Postion Image</label>
                                            <div class="form-check  mt-2">
                                                <input class="form-check-input" type="radio" name="flexRadioDefault"
                                                    wire:model="postion" value="right" id="flexRadioDefault2">
                                                <label class="form-check-label" for="flexRadioDefault2">
                                                    Image on Right
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio"
                                                    name="flexRadioDefault" wire:model="postion" value="left"
                                                    id="flexRadioDefault1">
                                                <label class="form-check-label" for="flexRadioDefault1">
                                                    Image on Left
                                                </label>
                                            </div>
                                            @error('postion')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group mt-3">
                                            <label for="inpTitle">Title</label>
                                            <textarea name="" id="" cols="30" rows="2" class="form-control" wire:model="title"
                                                id="inpTitle"></textarea>
                                            @error('title')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group mt-3">
                                            <label>Extend Variable</label>
                                            <br>
                                            @foreach ($extend as $index => $post)
                                                <div class="input-group mb-2">
                                                    {{-- <span class="input-group-text">Button</span> --}}
                                                    <input type="text" placeholder="Button Name"
                                                        class="form-control"
                                                        wire:model="extend.{{ $index }}.name">
                                                    <input type="hidden" placeholder="key of value" value="button"
                                                        class="form-control"
                                                        wire:model="extend.{{ $index }}.key">
                                                    <input type="text" placeholder="exp: http://"
                                                        class="form-control"
                                                        wire:model="extend.{{ $index }}.val">
                                                    <button type="button" class="btn btn-danger"
                                                        wire:click="removeItem({{ $index }})">
                                                        <i class="bx bx-trash"></i>
                                                    </button>
                                                </div>
                                            @endforeach



                                            <button type="button" class="btn btn-success btn-sm"
                                                wire:click="addItem">
                                                <i class="bx bx-plus"></i> Add Item
                                            </button>

                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-12" id="inpList">
                                    <div class="form-group mb-3" wire:ignore>
                                        <x-componen-form.textarea-input label='subtitle' wireModel="subtitle"
                                            cols="30" rows="5" idTextarea="subtitle" name="subtitle" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" id="close-modal" class="btn btn-warning close-modal"
                                data-bs-dismiss="modal"><i class="bx bx-x"></i> Close</button>
                            <button type="submit" class="btn btn-primary"><i class="bx bx-save"></i>
                                Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div>
        <div class="modal fade" id="ModalEdit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            wire:ignore.self aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg " wire:ignore.self>
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title mb-0 text-info" id="staticBackdropLabel">Form Edit Solution</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <form wire:submit.prevent="save" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group mb-3">

                                        <x-componen-form.input-image-dropify label='Image' wireModel="image"
                                            id="EdtImage" name="image" />
                                        @error('image')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <x-componen-form.input-image-dropify label='MiniIMG' wireModel="miniImage"
                                            name="miniImage" />
                                    </div>
                                </div>
                                <div class="col-md-12 row">
                                    <div class="col-md-4 form-group mb-3">
                                        <x-componen-form.input-image-dropify label='SvgIcon' wireModel="svg"
                                            name="svg" />
                                    </div>
                                    <div class="col-md-8 form-group mt-3">
                                        <div class="form-group mt-3">
                                            <label for="inpTitle">Postion Image</label>
                                            <div class="form-check  mt-2">
                                                <input class="form-check-input" type="radio"
                                                    name="flexRadioDefault" wire:model="postion" value="right"
                                                    id="flexRadioDefault2">
                                                <label class="form-check-label" for="flexRadioDefault2">
                                                    Image on Right
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio"
                                                    name="flexRadioDefault" wire:model="postion" value="left"
                                                    id="flexRadioDefault1">
                                                <label class="form-check-label" for="flexRadioDefault1">
                                                    Image on Left
                                                </label>
                                            </div>
                                            @error('postion')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group mt-3">
                                            <label for="inpTitle">Title</label>
                                            <textarea name="" id="" cols="30" rows="2" class="form-control" wire:model="title"
                                                id="inpTitle"></textarea>
                                            @error('title')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group mt-3">
                                            <label>Extend Variable</label>
                                            <br>
                                            @foreach ($extend as $index => $post)
                                                <div class="input-group mb-2">
                                                    {{-- <span class="input-group-text">Button</span> --}}
                                                    <input type="text" placeholder="Button Name"
                                                        class="form-control"
                                                        wire:model="extend.{{ $index }}.name">
                                                    <input type="hidden" placeholder="key of value" value="button"
                                                        class="form-control"
                                                        wire:model="extend.{{ $index }}.key">
                                                    <input type="text" placeholder="exp: http://"
                                                        class="form-control"
                                                        wire:model="extend.{{ $index }}.val">
                                                    <button type="button" class="btn btn-danger"
                                                        wire:click="removeItem({{ $index }})">
                                                        <i class="bx bx-trash"></i>
                                                    </button>
                                                </div>
                                            @endforeach



                                            <button type="button" class="btn btn-success btn-sm"
                                                wire:click="addItem">
                                                <i class="bx bx-plus"></i> Add Item
                                            </button>

                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-12" id="inpList">
                                    <div class="form-group mb-3" wire:ignore>

                                        <x-componen-form.textarea-input label='subtitle' wireModel="subtitle"
                                            cols="30" rows="5" idTextarea="subtitleEdit"
                                            name="subtitle" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" id="close-modal" class="btn btn-warning close-modal"
                                data-bs-dismiss="modal"><i class="bx bx-x"></i> Close</button>
                            <button type="submit" class="btn btn-primary"><i class="bx bx-save"></i>
                                Submit</button>
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
                    const closeButton = document.getElementsByClassName('close-modal');
                    if (closeButton) {
                        closeButton.click();
                    } else {
                        console.error('Button with ID "close-modal" not found');
                    }
                });
                $wire.on('setImage', (Image) => {
                    const image = document.getElementById('EdtImage');
                    const imageUrl = `${window.location.origin}/${Image[0]}`;
                    image.setAttribute('data-default-file', imageUrl);

                });
                ClassicEditor
                    .create(document.querySelector('#subtitle'))
                    .then(editor => {
                        editor.model.document.on('change:data', () => {
                            @this.set('subtitle', editor.getData());
                        })
                    })
                    .catch(error => {
                        console.error(error);
                    });
                $wire.on('setSubTitle', (subtitle) => {
                    $('.ck-editor').html('');
                    ClassicEditor
                        .create(document.querySelector('#subtitleEdit'))
                        .then(editor => {
                            editor.setData(subtitle[0]);
                        })
                        .catch(error => {
                            console.error(error);
                        });
                });
            </script>
        @endscript
    @endpush
</div>
