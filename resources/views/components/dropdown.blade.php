@props(['selections' => [], 'selected' => '', 'title' => '', 'value' => '', 'redirectSlugPrefix' => ''])
@php
    $selectorName = $title . 'Selector';
@endphp
{{-- Category dropdown --}}
<select class="flex-1 appearance-none bg-transparent py-2 pl-3 pr-9 text-sm font-semibold" id="{{ $selectorName }}">
    <option value="{{ $value }}" disabled selected>{{ $title }}
    </option>
    @foreach ($selections as $selection)
        <option value="{{ $selection->slug }}">{{ $selection->name }}
        </option>
    @endforeach
</select>

{{-- Category dropdown script --}}
<script>
    document.getElementById('{{ $selectorName }}').addEventListener('change', function() {
        var selectedValue = this.value;

        // Redirecting to the new URL
        window.location.href = "/" + '{{ $redirectSlugPrefix }}' + "/" + selectedValue;
    });
</script>
