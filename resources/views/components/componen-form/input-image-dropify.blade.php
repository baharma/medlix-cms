@props([
    'wireModel' => null,
    'imageDefault' => null,
    'label' => null,
    'name' => null,
    'classInputValidate' => null,
    'id' => null,
    'error' => null,
])
<label for="inputAddress4" class="col-md-3 col-form-label">{!! $label !!}</label>
<div class="col" wire:ignore>
    <input type="file" class="dropify {{ $classInputValidate }}" id="{{ $id ?? $name }}" wire:ignore.self
        wire:model='{{ $wireModel }}' name="{{ $name }}" data-default-file="{{ $imageDefault }}"
        data-max-file-size="2M">
</div>
<div class="row">
    <div class="col-md-3">

    </div>
    <div class="col">
        {{ $error }}
    </div>
</div>
