$(document).ready(function() {
    $(function() {
        $('#navbar-search-item .dropdown-toggle').click(function() {
            setTimeout(function() {
                $('#s').focus();
            }, 0);
        });
        $('.dropdown input[type=text]').click(function(e) {
            e.stopPropagation();
        });
    });
});