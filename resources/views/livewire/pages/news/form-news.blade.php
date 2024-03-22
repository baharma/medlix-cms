<div>
    <div class="card text-start p-3">
        <div class="d-flex justify-content-start">
            <a href="{{ route('news') }}" class="h5">
                <i class='bx bx-arrow-back'></i> Back
            </a>
        </div>
        <form wire:submit="save">
            <div class="row mb-3">
                <div class="col">
                    <x-componen-form.input-image-dropify label='Thumbnail News' wireModel="thumbnail" imageDefault=""
                        imageDefault="{{ $thumbnail }}" name="thumbnail">
                        @slot('classInputValidate')
                            @error('thumbnail')
                                is-invalid
                            @enderror
                        @endslot
                    </x-componen-form.input-image-dropify>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <x-componen-form.input-form idInput="title" label="Title News" wireModel="title"
                        placeholder="News Title" name="title" classInput="col" classLabels="col-sm-3">
                        @slot('classInputInsite')
                            @error('title')
                                is-invalid
                            @enderror
                        @endslot
                    </x-componen-form.input-form>
                    @error('title')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            @if (is_null($artikelId))
            <div class="row mb-3">
                <label for="" class="form-label">Website News</label>
                <div class="col-lg-6">
                    @foreach ($cms as $item)
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1-{{$item->id}}" value="{{$item->id}}" wire:model='app_id'>
                        <label class="form-check-label" for="inlineCheckbox1-{{$item->id}}">{{$item->app_name}}</label>
                      </div>
                    @endforeach
                    @error('app_id')
                    <span class="error">{{ $message }}</span>
                @enderror
                </div>
            </div>
            @endif
            <div x-data="{ link: false, descriptions: false }" x-init="link = {{ $check ? 'true' : 'false' }};
            descriptions = {{ $description ? 'true' : 'false' }};">
                <div class="row mb-3 p-3">
                    <div class="form-check col-lg-2">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1"
                            @click="link = true; descriptions = false" x-bind:checked="link">
                        <label class="form-check-label" for="flexRadioDefault1">
                            Links
                        </label>
                    </div>
                    <div class="form-check col-lg-2">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2"
                            @click="link = false; descriptions = true" x-bind:checked="descriptions">
                        <label class="form-check-label" for="flexRadioDefault2">
                            Article
                        </label>
                    </div>
                </div>
                <div class="row mb-3" wire:ignore>
                    <hr>
                    <div class="col-md-12" x-show="descriptions">
                        <h5 class="text-center mt-3 mb-2">The News Artile</h5>
                        {{-- <label class="h5">The News Article</label> --}}
                        <textarea class="form-control @error('description') is-invalid @enderror" wire:model='description'
                            placeholder="Leave a comment here" id="editor" style="height: 500px"></textarea>
                    </div>
                    <div class="col" x-show="link">
                        <x-componen-form.input-form idInput="Link" type="url" label="News Link" wireModel="check"
                            placeholder="URL-to://" name="check" classInput="col" classLabels="col-sm-3">
                            @slot('classInputInsite')
                                @error('check')
                                    is-invalid
                                @enderror
                            @endslot
                        </x-componen-form.input-form>
                        @error('check')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="d-flex flex-row-reverse bd-highlight">
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

@script
    <script defer>
        window.onload = function() {
            ClassicEditor.create(document.querySelector('#editor'), {
                    ckfinder: {
                        uploadUrl: '{{ route('image.upload') . '?_token=' . csrf_token() }}',
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
