<x-layout>
    <x-slot name="title">Create Job</x-slot>
    <h1>Create new Job</h1>
    <form action="/jobs" method="POST">
        @csrf
        <div class="my-5">
            <input type="text" name="title" 
                class="w-full md:w-60 px-2 py-1 bg-white text-black placeholder-gray-500 border border-gray-300
                       rounded focus:outline-none focus:ring-2 focus:ring-blue-500" 
                placeholder="title" 
                value="{{ old("title") }}" />
            @error('title')
               <div class="text-red-500 mt-2 text-sm">{{ $message }}</div> 
            @enderror
        </div>
        <div class="mb-5">
            <input type="text" name="description" 
                    class="w-full md:w-60 px-2 py-1 bg-white text-black placeholder-gray-500 border border-gray-300
                       rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="description" 
                    value="{{ old("description") }}" />
            @error('description')
               <div class="text-red-500 mt-2 text-sm">{{ $message }}</div> 
            @enderror
        </div>
        <button type="submit">Submit</button>
    </form>
</x-layout>