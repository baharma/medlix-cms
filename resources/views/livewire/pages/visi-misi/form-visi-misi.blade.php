<div>

    <div class="card p-3">
        <a href="{{route('visi-misi.medlinx')}}" class="card-link mb-4 h6">
            <i class='bx bx-arrow-back'></i>
            Back
        </a>
        <form wire:submit.prevent="save" id="myForm" enctype="multipart/form-data">
            <div class="row mb-3">
                <div class="col">
                    <!-- Input for Visi Image -->
                    <x-componen-form.input-image-dropify label='Visi Image' wireModel="imageVisi"
                        imageDefault="{{ $imageVisi }}" name="imageVisi">
                        @slot('classInputValidate')
                            @error('imageVisi')
                                is-invalid
                            @enderror
                        @endslot
                    </x-componen-form.input-image-dropify>
                </div>
                <div class="col">
                    <!-- Input for Misi Image -->
                    <x-componen-form.input-image-dropify label='Misi Images' wireModel="imageMisi"
                        imageDefault="{{ $imageMisi }}" name="imageMisi">
                        @slot('classInputValidate')
                            @error('imageMisi')
                                is-invalid
                            @enderror
                        @endslot
                    </x-componen-form.input-image-dropify>
                </div>
            </div>
            <div class="row mb-3" wire:ignore>
                <div class="col">
                    <!-- Textarea for Visi Descriptions -->
                    <label>Visi Descriptions</label>
                    <textarea class="form-control @error('visi') is-invalid @enderror" style="width: 100%"
                        wire:model='visi' placeholder="Leave a comment here" id="editorVisi"></textarea>
                </div>
            </div>
            <div class="row mb-3" wire:ignore>
                <div class="col">
                    <!-- Textarea for Misi Descriptions -->
                    <label>Misi Descriptions</label>
                    <textarea class="form-control @error('misi') is-invalid @enderror" style="width: 100%"
                        wire:model='misi' placeholder="Leave a comment here" id="editorMisi"></textarea>
                </div>
            </div>
            <div class="row mb-12">
                <div class="col-md-12">
                    <!-- Input for Detail Visi-Misi Image -->
                    <x-componen-form.input-image-dropify label='Detail Visi-Misi Image' wireModel="image"
                        imageDefault="{{ $image }}" name="image">
                        @slot('classInputValidate')
                            @error('image')
                                is-invalid
                            @enderror
                        @endslot
                    </x-componen-form.input-image-dropify>
                </div>
                <div class="col"></div>
            </div>
            <div class="d-flex flex-row-reverse bd-highlight mb-3 mt-5">
                <button class="btn btn-primary" type="button" wire:click='SureSave' wire:loading.attr="disabled" >
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

@push('script')
    <script>
        function initializeEditor(editorId, dataProperty) {
            ClassicEditor.create(document.querySelector(editorId))
                .then(editor => {
                    editor.model.document.on('change:data', () => {
                        @this.set(dataProperty, editor.getData());
                    });
                    editor.keystrokes.set('Space', (key, stop) => {
                        editor.execute('input', {
                            text: '\u00a0'
                        });
                        stop();
                    });
                    editor.ui.addButton('MyButton', {
                        icon: '_ bx bx-check-double _' // this hacks the existing classes and injects extra classes to the icon span
                    });
                })
                .catch(error => {
                    console.error(error);
                });
        }
        window.onload = function() {
            initializeEditor('#editorVisi', 'visi');
            initializeEditor('#editorMisi', 'misi');
        };
    </script>
@endpush

@script
    <script>
        $wire.on('saveVisiMisi', () => {
            Swal.fire({
                title: 'Are you sure you want to save this?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes',
                cancelButtonText: 'No'
            }).then((result) => {
                if (result.isConfirmed) {
                    @this.save(); // This invokes the Livewire component method 'save'
                }
            });
        })
    </script>
@endscript
