@props(['id', "name", "label" => null, "type" => "text", "value" => "", "placeholder" => "", "required" => false])

<div class="mb-4">
    @if( $label )  
        <label class="block text-gray-700" for="{{ $id }}">{{ $label }}</label>
    @endif
      
    <input
        id="{{ $id }}"
        type="{{ $type }}"
        name="{{ $name }}"
        class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-1 focus:ring-gray-400
                @error($name) border-red-500 @enderror"
        placeholder="{{ $placeholder }}"
        {{ $required ? "required" : ""}}
        value="{{ old($name, $value) }}"
    />
    @error($name)
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>