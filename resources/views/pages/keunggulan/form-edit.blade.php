<div class="p-3">
    <div class="row mb-3 mt-4">
        <x-componen-form.input-form idInput="title" label="Title" wireModel="title"
            placeholder="Enter Your title" name="title" classInput="col-sm-9"
            classLabels="col-sm-3" />
    </div>
    <div class="row mb-3">
        <x-componen-form.textarea-input label="Description details Event"
            idTextarea="DescriptionEvent" wireModel="description" rows="3" classInput="col-sm-9"
            classLabels="col-sm-3" placeholder="Description Event" />
    </div>
    <button type="button" class="btn btn-secondary mt-4" wire:click='newlist'>
        <i class='bx bx-add-to-queue' ></i>
        Add List</button>
    <div class="row mt-5" wire:ignore.self>
    @if($data && isset($data->KeunggulanList))
    <div id="show-data"></div>
        @foreach ($data->KeunggulanList as $items)
        <div class="col-lg-8" wire:ignore.self>
            <div class="row mb-3" wire:ignore.self>
                <x-componen-form.input-form idInput="imageTitle" label="Title" wireModel="titleList.{{$items->id}}"
                    placeholder="Enter Title" name="imageTitle" classInput="col-sm-9"
                    classLabels="col-sm-3" />
            </div>
            <div class="row mb-3" wire:ignore.self>
                <x-componen-form.input-image-dropify label='Image Keunggulan' wireModel="imageList.{{$items->id}}" id="imageList-{{$items->id}}"
                    imageDefault="" name="image" imageDefault="{{$items->image}}" />
            </div>
        </div>
        @endforeach
    @else
        <h4>None</h4>
    @endif
    </div>
</div>


