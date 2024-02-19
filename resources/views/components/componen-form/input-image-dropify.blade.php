@props([

    'wireModel'=>null,
    'imageDefault'=>null,
    'label'=>null,
    'name'=>null,
    'classInputValidate'
    'id' => null,

])
<label for="inputAddress4" class="col-sm-3 col-form-label">{{ $label }}</label>
<div class="col" wire:ignore>

    <input type="file" class="dropify {{$classInputValidate}}" id="{{ $id ?? $name }}" wire:model='{{ $wireModel }}'
        name="{{ $name }}" data-default-file="{{ $imageDefault }}" data-max-file-size="2M">
</div>
@error('{{ $name }}')
    <span class="error">{{ $message }}</span>
@enderror
