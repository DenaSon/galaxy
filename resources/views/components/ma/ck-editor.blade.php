<link href="{{ asset('vendor/quill/quill.snow.css') }}" rel="stylesheet" />




<div id="editor"></div>

<script src="{{ asset('vendor/quill/quill.js') }}"></script>

<script>
    function initQuill() {
        const toolbarOptions = [
            ['bold', 'italic', 'underline', 'strike'], // toggled buttons
            ['blockquote', 'code-block'],
            ['link', 'image', 'video', 'formula'],
            [{ 'header': 1 }, { 'header': 2 }], // custom button values
            [{ 'list': 'ordered' }, { 'list': 'bullet' }, { 'list': 'check' }],
            [{ 'script': 'sub' }, { 'script': 'super' }], // superscript/subscript
            [{ 'indent': '-1' }, { 'indent': '+1' }], // outdent/indent
            [{ 'direction': 'rtl' }], // text direction
            [{ 'size': ['small', false, 'large', 'huge'] }], // custom dropdown
            [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
            [{ 'color': [] }, { 'background': [] }], // dropdown with defaults from theme
            [{ 'font': [] }],
            [{ 'align': [] }],
            ['clean'] // remove formatting button
        ];

        const quill = new Quill('#editor', {
            'image-tooltip': true,
            'link-tooltip': true,
            placeholder: "متن خود را بنویسید",

            modules: {
                toolbar: toolbarOptions
            },
            theme: 'snow'
        });
        @this.set('content', content);

    }

    // Initialize Quill when Livewire navigates
    document.addEventListener('livewire:navigate', (event) => {
        initQuill();
    });

    // Initialize Quill on page load
    document.addEventListener('DOMContentLoaded', initQuill);
</script>
