<h1>Hello {{ $title}} </h1>
<ul>
    @foreach($jobs as $job)
        <li>{{ $job }}</li>
    @endforeach
</ul>