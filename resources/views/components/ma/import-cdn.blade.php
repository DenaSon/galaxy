
@if(!empty($style))

        @push('styles')
            <link rel="stylesheet" href="{{ $style }}">
        @endpush

@endif

@if(!empty($script))

        @push('scripts')
            <script src="{{ $script }}"></script>
        @endpush

@endif
