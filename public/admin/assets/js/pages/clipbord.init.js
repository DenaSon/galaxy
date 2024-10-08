var clipboard = new ClipboardJS('#copyButton, #cutButton');

clipboard.on('success', function (e) {
    // Handle success, e.text is the copied text
    alert('Copied text: ' + e.text);
});

clipboard.on('error', function (e) {
    // Handle error
    alert('Copy/Cut failed');
});