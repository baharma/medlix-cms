<div>
   <div class="card p-3">
        <form wire:submit='save'>
            <div class="row mb-3">
                <div class="col">
                    <x-componen-form.input-image-dropify label='Image Produk' wireModel="image"
                        imageDefault="{{ $image }}" name="image">
                        @slot('classInputValidate')
                            @error('image')
                                is-invalid
                            @enderror
                        @endslot
                    </x-componen-form.input-image-dropify>
                </div>
                <div class="col">
                    <x-componen-form.input-image-dropify label='Image Logo' wireModel="logo"
                        imageDefault="{{ $logo }}" name="logo">
                        @slot('classInputValidate')
                            @error('logo')
                                is-invalid
                            @enderror
                        @endslot
                    </x-componen-form.input-image-dropify>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label class="mb-2">Descriptions</label>
                    <textarea class="form-control @error('visi') is-invalid @enderror" style="width: 100%;height: 150px;" wire:model='text'
                        placeholder="Leave a comment here" id="editorVisi"></textarea>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <x-componen-form.input-form idInput="url" label="Url Produk" wireModel="url"
                        placeholder="URL Htpps://" name="url" classInput="col" classLabels="col-sm-3">
                        @slot('classInputInsite')
                            @error('url')
                                is-invalid
                            @enderror
                        @endslot
                    </x-componen-form.input-form>
                </div>
            </div>
            <div class="d-flex flex-row-reverse bd-highlight mb-3 mt-5">
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
