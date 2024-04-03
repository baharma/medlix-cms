<div>
    <div class="card p-4">
        <form wire:submit.prevent='save'>
            <!-- Image Upload -->
            <div class="row mb-3">
                <x-componen-form.input-image-dropify label="Profile Image<span class='text-danger'>*</span>"
                    wireModel="image" imageDefault="{{ $image }}" name="image" >

                    @slot('error')
                        @error('image')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    @endslot
                </x-componen-form.input-image-dropify>
            </div>

            <!-- Name Testimony Input -->
            <div class="row mb-3">
                <x-componen-form.input-form idInput="person" label="Name Testimony<span class='text-danger'>*</span>"
                    wireModel="person" placeholder="Dr. Izidok" name="person" classInput="col-sm-9"
                    classLabels="col-sm-3">
                    @slot('classInputInsite')
                        @error('person')
                            is-invalid
                        @enderror
                    @endslot
                    @slot('error')
                        @error('person')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    @endslot
                </x-componen-form.input-form>
            </div>
            <!-- Title Testimony Input -->
            <div class="row mb-3">
                <x-componen-form.input-form idInput="title" label="Title Testimony" wireModel="title"
                    placeholder="Staff Doctor Rs. Bandung" name="title" classInput="col-sm-9" classLabels="col-sm-3">
                </x-componen-form.input-form>
            </div>

            <!-- Testimonial Textarea -->
            <div class="row mb-3">
                <x-componen-form.textarea-input label="Testimonial<span class='text-danger'>*</span>"
                    idTextarea="testimoni" wireModel="testimoni" rows="5" classInput="col-sm-9"
                    classLabels="col-sm-3" placeholder="Description Testimonial" >
                    @slot('classEroor')
                    @error('testimoni')
                    is-invalid
                @enderror
                    @endslot
                    @slot('error')
                        @error('testimoni')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    @endslot
                </x-componen-form.textarea-input>
            </div>

            <!-- Submit Button with Loading Indicator -->
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-3 col-form-label"></label>
                <div class="col-sm-9">
                    <button type="submit" class="btn btn-primary" wire:loading.attr="disabled">
                        <i class='bx bx-save'></i>
                        <span wire:loading.remove>Save</span>
                        <span wire:loading>Loading...</span>
                    </button>
                    <span wire:loading>Loading...</span>
                </div>
            </div>
        </form>

    </div>
</div>
