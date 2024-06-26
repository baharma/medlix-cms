<div>
    <div class="card">
        <form wire:submit="save" enctype="multipart/form-data">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <x-componen-form.input-image-dropify label='Image' wireModel="image"
                                imageDefault="{{ $image ? asset($image) : '' }}" name="image" />
                        </div>

                    </div>
                    <div class="col-md-6" id="inpList">
                        <div class="form-group">
                            <label for="inpTitle">About Title</label>
                            <input type="text" class="form-control" wire:model="title" id="inpTitle">
                        </div>

                        <div class="form-group mt-3">
                            <label>About List</label>
                            <br>
                            @if (!$model)
                                <div class="input-group mb-3">

                                    <input name="fistList" class="form-control" id="" cols="30"
                                        rows="2" wire:model="fistList"></input>
                                    <button type="button" class="btn btn-danger" wire:click="removeArr">
                                        <i class="bx bx-trash"></i>
                                    </button>
                                </div>
                            @endif

                            @foreach ($lists as $index => $post)
                                <div class="input-group mb-2">
                                    <input name="lists.{{ $index }}" class="form-control" id=""
                                        cols="30" rows="2" wire:model="lists.{{ $index }}"></input>

                                    {{-- <input type="text" class="form-control" wire:model="lists.{{ $index }}"> --}}
                                    <button type="button" class="btn btn-danger"
                                        wire:click="removeItem({{ $index }})">
                                        <i class="bx bx-trash"></i>
                                    </button>
                                </div>
                            @endforeach

                            <button type="button" class="btn btn-success btn-sm" wire:click="addItem">
                                <i class="bx bx-plus"></i> Add Item
                            </button>


                            {{-- <div class="form-group mb-3" wire:ignore>
                            <x-componen-form.textarea-input label='subtitle' wireModel="subtitle" cols="30"
                                rows="5" idTextarea="subtitle" name="subtitle" inpVal="{{ $subtitle }}" />
                        </div> --}}
                        </div>
                    </div>
                </div>

            </div>
            <div class="card-footer" style="display: flex; justify-content: end">
                <button class="btn btn-primary" type="submit" wire:loading.attr="disabled"
                    onclick="function() { this.disabled = true; this.form.submit(); }">
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

@push('scripts')
    @script
        <script>
            $('.dropify-clear').click(function(e) {
                e.preventDefault();
                $('#miniImage').attr('data-default-file', '')
                //Here you can manage you ajax request to delete
                //file from database.
            });
            ClassicEditor
                .create(document.querySelector('#subtitle'))
                .then(edt => {
                    edt.model.document.on('change:data', () => {
                        @this.set('subtitle', edt.getData());
                    })
                })
                .catch(error => {
                    console.error(error);
                });
        </script>
    @endscript
@endpush
