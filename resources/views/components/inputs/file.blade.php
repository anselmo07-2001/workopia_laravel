@props(['id', "name", "label" => null, "required" => false])

<div class="mb-4">
    @if( $label )  
        <label class="block text-gray-700" for="{{ $id }}">{{ $label }}</label>     
    @endif
    <input
        {{ $required ? "required" : ""}}
        id="{{ $id }}"
        type="file"
        name="{{ $name }}"
        class="block w-full text-sm text-gray-900
           border border-gray-300 rounded bg-white
           file:mr-4 file:py-2 file:px-4
           file:rounded file:border-0
           file:bg-gray-200 file:text-gray-600
           hover:file:bg-gray-300
           focus:outline-none focus:ring-1 focus:ring-gray-400
                @error($name) border-red-500 @enderror"
    />
    @error($name)
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>