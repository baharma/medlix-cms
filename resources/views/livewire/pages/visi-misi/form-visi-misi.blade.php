<div>
    <div class="card p-3">
        <form wire:submit='save' id="myForm">
            <div class="row mb-3">
                <div class="col">
                    <x-componen-form.input-image-dropify label='Visi Image' wireModel="imageMisi"
                        imageDefault="{{ $imageMisi }}" name="imageMisi">
                        @slot('classInputValidate')
                            @error('imageMisi')
                                is-invalid
                            @enderror
                        @endslot
                    </x-componen-form.input-image-dropify>
                </div>
                <div class="col">
                    <x-componen-form.input-image-dropify label='Misi Images' wireModel="image"
                        imageDefault="{{ $image }}" name="image">
                        @slot('classInputValidate')
                            @error('image')
                                is-invalid
                            @enderror
                        @endslot
                    </x-componen-form.input-image-dropify>
                </div>
            </div>
            <div class="row mb-3" wire:ignore>
                <div class="col">
                    <label>Visi Descriptions</label>
                    <textarea class="form-control @error('visi') is-invalid @enderror" style="width: 100%" wire:model='visi'
                        placeholder="Leave a comment here" id="editorVisi"></textarea>
                </div>
            </div>
            <div class="row mb-3" wire:ignore>
                <div class="col">
                    <label>Misi Descriptions</label>
                    <textarea class="form-control @error('misi') is-invalid @enderror" style="width: 100%" wire:model='misi'
                        placeholder="Leave a comment here" id="editorMisi"></textarea>
                </div>
            </div>
            <div class="row mb-12">
                <div class="col-md-12">
                    <x-componen-form.input-image-dropify label='Detail Visi-Misi Image' wireModel="imageVisi"
                        imageDefault="{{ $imageVisi }}" name="imageVisi">
                        @slot('classInputValidate')
                            @error('imageVisi')
                                is-invalid
                            @enderror
                        @endslot
                    </x-componen-form.input-image-dropify>
                </div>
                <div class="col"></div>
            </div>
            <div class="d-flex flex-row-reverse bd-highlight mb-3 mt-5">
                <button class="btn btn-primary" type="button" wire:click='SureSave'>
                    <i class="bx bx-save"></i> Save
                </button>
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
