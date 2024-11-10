
<script data-navigate-once>
    function initializeCKEditor() {
        // Check if CKEditor instance already exists to avoid re-initializing
        if (CKEDITOR.instances.editor1) {
            CKEDITOR.instances.editor1.destroy();
        }

        // Initialize CKEditor
        const editor = CKEDITOR.replace('editor1', {
            language: 'fa',
        });

        // Sync CKEditor data with Livewire property when content changes
        editor.on("change", function () {
            @this.
            set('content', editor.getData());
        });
    }

    document.addEventListener("livewire:load", function () {
        initializeCKEditor();
    });

    // Re-initialize CKEditor on Livewire navigation
    document.addEventListener('livewire:navigate', (event) => {
        initializeCKEditor();
    });
    $(document).ready(function () {
        initializeCKEditor();

    });
</script>
