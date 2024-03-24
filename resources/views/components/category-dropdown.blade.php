@props(['selections' => [], 'selected' => '', 'title' => '', 'value' => '', 'redirectSlugPrefix' => ''])
@php
    $selectorName = $title . 'Selector';
@endphp
<div>
    {{-- Category dropdown --}}
    <select class="flex-1 appearance-none bg-transparent py-2 pl-3 pr-9 text-sm font-semibold" id="category">
        <option value="category" disabled selected>Category
        </option>
        @foreach ($categories as $selection)
            <option value="{{ $selection->slug }}">{{ $selection->name }}
            </option>
        @endforeach
    </select>

    {{-- Category dropdown script --}}
    <script>
        document.getElementById('category').addEventListener('change', function() {
            var selectedValue = this.value;

            var urlParams = "?" + 'category=' + selectedValue;

            // If a search url param is detected add to the new URL
            var searchParam = window.location.search;
            if (searchParam) {
                urlParams += '&' + searchParam.split('&')[0];
            }

            // Redirecting to the new URL
            window.location.href = urlParams;
        });
    </script>

</div>
