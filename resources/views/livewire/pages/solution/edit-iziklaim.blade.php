<div>
    @push('style')
        <script src="https://cdn.ckeditor.com/ckeditor5/41.1.0/classic/ckeditor.js"></script>
    @endpush
    <div class="card">
        <div class="card-body">
            <form wire:submit.prevent="save" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group mb-3">

                                <x-componen-form.input-image-dropify label='Image' wireModel="image" id="EdtImage"
                                    name="image" imageDefault="{{ asset($image) }}" />
                                @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <x-componen-form.input-image-dropify label='MiniIMG' wireModel="miniImage"
                                    name="miniImage" imageDefault="{{ $miniImage ? asset($miniImage) : null }}" />
                            </div>
                        </div>
                        <div class="col-md-12 row">
                            <div class="col-md-4 form-group mb-3">
                                <x-componen-form.input-image-dropify label='SvgIcon' wireModel="svg" name="svg"
                                    imageDefault="{{ $svg ? asset($svg) : null }}" />
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
                                        <input class="form-check-input" type="radio" name="flexRadioDefault"
                                            wire:model="postion" value="left" id="flexRadioDefault1">
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
                                            <input type="text" placeholder="Button Name" class="form-control"
                                                wire:model="extend.{{ $index }}.name">
                                            <input type="hidden" placeholder="key of value" value="button"
                                                class="form-control" wire:model="extend.{{ $index }}.key">
                                            <input type="text" placeholder="exp: http://" class="form-control"
                                                wire:model="extend.{{ $index }}.val">
                                            <button type="button" class="btn btn-danger"
                                                wire:click="removeItem({{ $index }})">
                                                <i class="bx bx-trash"></i>
                                            </button>
                                        </div>
                                    @endforeach



                                    <button type="button" class="btn btn-success btn-sm" wire:click="addItem">
                                        <i class="bx bx-plus"></i> Add Item
                                    </button>

                                </div>
                            </div>

                        </div>
                        <div class="col-md-12" id="inpList">
                            <div class="form-group mb-3" wire:ignore>
                                <x-componen-form.textarea-input label='subtitle' wireModel="subtitle" cols="30"
                                    rows="5" idTextarea="subtitleEdit" name="subtitle"
                                    inpVal="{{ $subtitle }}" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="{{ route('solution') }}" wire:navigates type="button" id="close-modal"
                        class="btn btn-warning"><i class="bx bx-arrow-back"></i>
                        Back</a>
                    <button type="submit" class="btn btn-primary"><i class="bx bx-save"></i>
                        Update</button>
                </div>
            </form>
        </div>
    </div>
    @push('scripts')


        @script
            <script>
                $('.dropify-clear').click(function(e) {
                    e.preventDefault();
                    $('#miniImage').attr('data-default-file', '')
                    //Here you can manage you ajax request to delete 
                    //file from database.
                });
                $wire.on('setSubTitle', (subtitle) => {
                    $('.ck-editor').html('');
                    ClassicEditor
                        .create(document.querySelector('#subtitleEdit'))
                        .then(edt => {
                            edt.model.document.on('change:data', () => {
                                @this.set('subtitle', edt.getData());
                            })
                        })
                        .catch(error => {
                            console.error(error);
                        });
                });
            </script>
        @endscript
    @endpush
</div>
