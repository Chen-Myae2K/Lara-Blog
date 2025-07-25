<div class="mb-3">
    <label for="{{ $name }}" class="form-label">{{ $label }}</label>
    <input type="{{ $type }}"  value="{{ old($name, $default) }}" id="{{ $name }}"
        class="form-control @error($name) is-invalid @enderror" name="{{ $multiple ? $name . '[]' : $name }}" @isset($multiple) multiple

        @endisset>
    @error($name)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
    @isset($multiple)
        @error($name . '.*')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    @endisset
</div>
