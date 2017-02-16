// disable caching of ajax content
$('body').on('hidden.bs.modal', '.modal', function () {
    $(this).removeData('bs.modal');
    // $('.modal-body', this).empty();
});