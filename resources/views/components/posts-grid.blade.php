@props(['posts'])
<x-featured-card :post="$posts[0]" />

@if ($posts->count() > 1)
    <div class="lg:grid lg:grid-cols-6">
        @foreach ($posts->skip(1) as $post)
            <x-post-card :post="$post" {{-- On loop iteration less than 3 use col span 2, else col span 3 --}}
                class="{{ $loop->iteration < 3 ? 'col-span-3' : 'col-span-2' }}" />
        @endforeach
    </div>
    </div>
@endif
