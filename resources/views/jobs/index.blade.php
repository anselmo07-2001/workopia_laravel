<x-layout>
    <ul>
        @foreach($jobs as $job)
            <li>{{ $job }}</li>
        @endforeach
    </ul>
</x-layout>