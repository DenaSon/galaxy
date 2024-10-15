
@if(!empty($style_cdn))

        @push('styles')
            <link rel="stylesheet" href="{{ $style_cdn }}">
        @endpush

@endif

@if(!empty($script_cdn))

        @push('scripts')
            <script src="{{ $script_cdn }}"></script>
        @endpush

@endif
