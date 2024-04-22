@props(['heading'])
<section class="px-6 py-8 mx-auto max-w-4xl">
    <h1 class="text-lg font-bold mb-6 pb-2 text-center border-b">{{ $heading }}</h1>
    <div class="flex">

        <aside class="w-48">
            <h4 class="font-semibold mb-4">
                Links

            </h4>
            <ul>
                <li><a href="/admin/posts/create"
                        class="{{ request()->is('admin/posts/create') ? 'text-blue-500' : '' }}">Create New Post</a></li>
                <li><a href="/admin/posts" class="{{ request()->is('admin/posts') ? 'text-blue-500' : '' }}">
                        My Posts</a></li>
                <li><a href="/admin/categories"
                        class="{{ request()->is('admin/categories') ? 'text-blue-500' : '' }}">Categories</a></li>
            </ul>
        </aside>
        {{-- Flex to fill remaining space --}}
        <main class="flex-1">

            <x-panel class="">
                {{ $slot }}
            </x-panel>
        </main>
    </div>

</section>
