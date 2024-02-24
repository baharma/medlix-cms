<div class="col-lg-8 mt-4" wire:ignore.self>
    <div class="row mb-3" wire:ignore.self>
        <x-componen-form.input-form idInput="Image Keunggulan" label="imageTitle" wireModel="imageTitle"
            placeholder="Enter Title This Image" name="imageTitle" classInput="col-sm-9"
            classLabels="col-sm-3" />
    </div>
    <div class="row mb-3" wire:ignore.self>
        <x-componen-form.input-image-dropify label='Image Keunggulan' wireModel="image" id="image"
            imageDefault="" name="image" imageDefault="{{$data->image}}" />
    </div>
</div>
