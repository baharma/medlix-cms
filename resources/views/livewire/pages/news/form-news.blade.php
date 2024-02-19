<div>
    <div class="card text-start p-3">
        <div class="d-flex justify-content-start">
            <a href="{{route('news')}}" class="h5">
                <i class='bx bx-arrow-back'></i> Back
            </a>
        </div>
        <form wire:submit="save">
            <div class="row mb-3">
                <div class="col">
                    <x-componen-form.input-image-dropify label='Thumbnail News' wireModel="thumbnail" imageDefault=""
                        imageDefault="{{$thumbnail}}" name="thumbnail">
                        @slot('classInputValidate')
                        @error('thumbnail') is-invalid @enderror
                        @endslot
                    </x-componen-form.input-image-dropify>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <x-componen-form.input-form idInput="title" label="Title News" wireModel="title" placeholder="title"
                        name="title" classInput="col" classLabels="col-sm-3">
                        @slot('classInputInsite')
                        @error('title') is-invalid @enderror
                        @endslot
                    </x-componen-form.input-form>
                    @error('title')
                    <span class="error">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div x-data="{ link: false, descriptions: false }" x-init="
            link = {{ $check ? 'true' : 'false' }};
            descriptions = {{ $description ? 'true' : 'false' }};
            ">
                <div class="row mb-3 p-3">
                    <div class="form-check col-lg-2">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1"
                        @click="link = true; descriptions = false"
                        x-bind:checked="link"
                        >
                        <label class="form-check-label" for="flexRadioDefault1">
                            Links
                        </label>
                    </div>
                    <div class="form-check col-lg-2">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2"
                        @click="link = false; descriptions = true"
                        x-bind:checked="descriptions"
                        >
                        <label class="form-check-label" for="flexRadioDefault2">
                            Article
                        </label>
                    </div>
                </div>
                <div class="row mb-3" wire:ignore>
                    <div class="col" x-show="descriptions">
                        <label>News Detail</label>
                        <textarea class="form-control @error('description') is-invalid @enderror"
                            wire:model='description' placeholder="Leave a comment here" id="editor"
                            style="height: 500px"></textarea>
                    </div>
                    <div class="col" x-show="link">
                        <x-componen-form.input-form idInput="Link" label="Title News" wireModel="check" placeholder="title"
                            name="check" classInput="col" classLabels="col-sm-3">
                            @slot('classInputInsite')
                            @error('check') is-invalid @enderror
                            @endslot
                        </x-componen-form.input-form>
                        @error('check')
                        <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="d-flex flex-row-reverse bd-highlight">
                <button type="submit" class="btn btn-success">Save</button>
            </div>
        </form>
    </div>

</div>

@script
<script defer>
    window.onload = function () {
        ClassicEditor.create(document.querySelector('#editor'), {
                ckfinder: {
                    uploadUrl: '{{ route('image.upload').'?_token='.csrf_token() }}',
                },
                config: {
                    height: 500 // Set the desired height in pixels
                }
            })
            .then(editor => {
                editor.model.document.on('change:data', () => {
                    @this.set('description', editor.getData());
                });
                editor.keystrokes.set('Space', (key, stop) => {
                    editor.execute('input', {
                        text: '\u00a0'
                    });
                    stop();
                });
            })
            .catch(error => {
                console.error(error);
            });
    };
</script>
@endscript
