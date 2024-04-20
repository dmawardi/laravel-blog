@auth
    <form action="/posts/{{ $post->slug }}/comments" method="POST" class="border border-gray-200 p-6 rounded-xl">
        @csrf
        <header class="flex items-center">
            <img src="https://i.pravatar.cc/60?u={{ auth()->id() }}" alt="" width="60" height="60">
            <h2 class="ml-3">
                Want to participate?
            </h2>
        </header>
        <div class="mt-6">
            <textarea name="body" class="w-full text-sm focus:outline-none focus:ring" rows="5"
                placeholder="Think of something to say!" required></textarea>
            @error('body')
                <span class="text-xs text-red-500">{{ $message }}</span>
            @enderror
        </div>
        <div class="flex justify-end mt-6 border-t border-gray-200 pt-6">
            <button type="submit"
                class="bg-blue-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-blue-600">Post</button>
        </div>
    </form>
@else
    <p class="font-semibold">
        <a href="/register" class="hover:underline">Register</a> or <a class="hover:underline" href="/login">Log in</a> to
        leave a comment!
    </p>
@endauth
