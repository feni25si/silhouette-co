@props(['name', 'label', 'type' => 'text'])

<div class="field">
    <label for="{{ $name }}">{{ $label }}</label>
    <input id="{{ $name }}" name="{{ $name }}" type="{{ $type }}"
           value="{{ $type === 'password' ? '' : old($name) }}" {{ $attributes }}>
    @error($name)
        <small class="error">{{ $message }}</small>
    @enderror
</div>