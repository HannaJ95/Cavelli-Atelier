@props(['links' => []])

<nav aria-label="Breadcrumb" class="text-sm text-gray-400 mx-10 mt-6">
    @foreach($links as $index => $link)
        @if(!$loop->last)
            <a href="{{ $link['url'] }}" class="hover:text-gray-600 transition-colors">
                {{ $link['label'] }}
            </a>
            <span class="mx-1" aria-hidden="true">/</span>
        @else
            <span class="text-gray-600" aria-current="page">{{ $link['label'] }}</span>
        @endif
    @endforeach
</nav>
