<x-layout>
    <section class="px-6 py-8">
        <x-panel class="mx-auto max-w-sm">

            <form action="/admin/posts" method="POST">
                @csrf
                {{-- Title --}}
                <div class="mb-6">
                    <label for="title" class="block mb-2 uppercase font-bold text-xs text-gray-700">Title</label>
                    <input type="text" class="border border-gray-400 p-2 w-full" value="{{ old('title') }}"
                        name="title" id="title" required>
                    @error('title')
                        <p class="text-xs text-red-500 mt-2">{{ $message }}</p>
                    @enderror
                </div>
                {{-- Slug --}}
                <div class="mb-6">
                    <label for="slug" class="block mb-2 uppercase font-bold text-xs text-gray-700">Slug</label>
                    <input type="text" class="border border-gray-400 p-2 w-full" name="slug" id="slug"
                        value="{{ old('slug') }}" required>
                    @error('slug')
                        <p class="text-xs text-red-500 mt-2">{{ $message }}</p>
                    @enderror
                </div>
                {{-- Excerpt --}}
                <div class="mb-6">
                    <label for="excerpt" class="block mb-2 uppercase font-bold text-xs text-gray-700">Excerpt</label>
                    <textarea type="text" class="border border-gray-400 p-2 w-full" name="excerpt" id="excerpt" required>{{ old('excerpt') }}</textarea>
                    @error('excerpt')
                        <p class="text-xs text-red-500 mt-2">{{ $message }}</p>
                    @enderror
                </div>
                {{-- Body --}}
                <div class="mb-6">
                    <label for="body" class="block mb-2 uppercase font-bold text-xs text-gray-700">Body</label>
                    <textarea type="text" class="border border-gray-400 p-2 w-full" name="body" id="body" required>{{ old('body') }}</textarea>
                    @error('body')
                        <p class="text-xs text-red-500 mt-2">{{ $message }}</p>
                    @enderror
                </div>
                {{-- Category --}}
                <div class="mb-6">
                    <label for="category_id"
                        class="block mb-2 uppercase font-bold text-xs text-gray-700">Category</label>
                    <select name="category_id" id="category_id">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ ucwords($category->name) }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <p class="text-xs text-red-500 mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <button type="submit"
                        class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">Publish</button>
                </div>
            </form>
        </x-panel>

    </section>
</x-layout>
