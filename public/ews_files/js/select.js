$(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace("editor1");
});

$(document).ready(function () {
    $(".js-example-basic-multiple").select2();
});
