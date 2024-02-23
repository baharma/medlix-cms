<div>
    <div class="card p-4">
        <form wire:submit='save'>
            <div class="row  mb-3">
                <x-componen-form.input-form idInput="person" label="Name Testimoni*" wireModel="person"
                    placeholder="Enter Name Testimonial" name="person" classInput="col-sm-9" classLabels="col-sm-3">
                    @slot('classInputInsite')
                    @error('person')
                    is-invalid
                    @enderror
                    @endslot
                </x-componen-form.input-form>
                @error('person')
                <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <div class="row mb-3">
                <x-componen-form.textarea-input label="Testimonial*" idTextarea="testimoni" wireModel="testimoni"
                    rows="5" classInput="col-sm-9" classLabels="col-sm-3" placeholder="Description Testimonial" />
            </div>
            <div class="row  mb-3">
                <x-componen-form.input-form idInput="title" label="Title Testimoni" wireModel="title"
                    placeholder="Enter Title Testimonial When Have" name="title" classInput="col-sm-9" classLabels="col-sm-3">
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
            <div class="row mb-3">
                <x-componen-form.input-image-dropify label='Image Testimoni*' wireModel="image" imageDefault="{{$image}}"
                    name="image" />
            </div>
            <div class="d-flex flex-row-reverse bd-highlight">
                <button type="submit" class="btn btn-success">
                    <i class='bx bxs-save'></i>
                    Save</button>
            </div>
        </form>
    </div>
</div>
