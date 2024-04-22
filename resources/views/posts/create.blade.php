<x-layout>
    <x-settings heading="Publish New Post">

        {{-- Change to multipart form data for file transfer --}}
        <form action="/admin/posts" method="POST" enctype="multipart/form-data">
            @csrf
            {{-- Title --}}
            <x-form.input name="title" label="Title" type="text" :required="false" />
            {{-- Slug --}}
            <x-form.input name="slug" label="Slug" type="text" :required="false" />
            {{-- Thumbnail --}}
            <x-form.input name="thumbnail" label="Thumbnail" type="file" :required="false" />
            {{-- Excerpt --}}
            <x-form.input name="excerpt" label="Excerpt" type="textarea" :required="false" />
            {{-- Body --}}
            <x-form.input name="body" label="Body" type="textarea" :required="false" />
            {{-- Category --}}
            <x-form.field>
                <x-form.label name="category_id" label="Category" />
                <select name="category_id" id="category_id">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ ucwords($category->name) }}</option>
                    @endforeach
                </select>
                <x-form.error name="category_id" />
            </x-form.field>

            <div class="mt-6">
                <button type="submit"
                    class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">Publish</button>
            </div>
        </form>
    </x-settings>



</x-layout>
