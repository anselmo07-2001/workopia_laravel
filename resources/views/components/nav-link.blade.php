@props(["url" => "/", "active" => false, "icon" => null])

<a href={{ $url }} class="text-white hover:underline py-2 {{ $active ? " text-yellow-500" : "" }}">
    @if ($icon)
        <i class="fa fa-{{$icon}}"></i> Create Job
    @endif
    {{ $slot }}
</a>