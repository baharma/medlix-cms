@props([
    'idInput' => null,
    'label' => null,
    'wireModel' => null,
    'placeholder' => null,
    'name' => null,
    'value' => null,
    'classInput' => null,
    'classLabels' => null,
    'type' => null,
    'classInputInsite' => null,
])

<label for="{{ $idInput }}" class="{{ $classLabels }} col-form-label">{{ $label }}</label>

<div class="{{ $classInput }}">
    <input @if ($type) type="{{ $type }}" @else type="text"  @endif
        wire:model="{{ $wireModel }}" name="{{ $name }}" class="form-control {{ $classInputInsite }}"
        id="{{ $idInput }}" placeholder="{{ $placeholder }}" value="{{ $value }}" wire:dirty.class="is-dirty">
    @error('{{ $name }}')
        <span class="error">{{ $message }}</span>
    @enderror
</div>
