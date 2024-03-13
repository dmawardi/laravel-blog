<x-layout>
    <h1>{{ $post->title }}</h1>
    <div>
        {!! $post->body !!}
    </div>
    <p>
        <a href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a>
    </p>
    <a href="/">Go Back</a>
</x-layout>
