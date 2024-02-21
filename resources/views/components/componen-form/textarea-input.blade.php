@props([
    'label' => null,
    'idTextarea' => null,
    'wireModel' => null,
    'rows' => null,
    'placeholder' => null,
    'cols' => null,
    'classLabels' => null,
    'classInput' => null,
    'inpVal' => null,
])


<label for="{{ $idTextarea }}" class="{{ $classLabels }} col-form-label">{{ $label }}</label>
<div class="{{ $classInput }}">
    <textarea class="form-control" id="{{ $idTextarea }}" wire:model="{{ $wireModel }}" rows="{{ $rows }}"
        placeholder="{{ $placeholder }}" cols="{{ $cols }}">{!! $inpVal !!}</textarea>
</div>
