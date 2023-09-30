function openFile() {
    document.getElementById('fileInput').click();

    document.getElementById('fileInput').addEventListener('change', handleFileSelect);
}

function handleFileSelect(event) {
    const files = event.target.files;

    if (files.length > 0) {
        const selectedFile = files[0];
        alert('Selected file: ' + selectedFile.name);
    }
}