let $ = s => [].slice.call(document.querySelectorAll(s));

// hook 'em up:
$('input[type="tags"]').forEach(tagsInput);