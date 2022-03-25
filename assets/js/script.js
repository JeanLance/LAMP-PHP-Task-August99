$(document).ready(function() {
    function fetch_book_catalogs() {
        $.ajax({
            type: "GET",
            url: '../../processes/book.php',
            data: {table_init: true},
            success: function(res) {
                $('.books-table tbody').html(res);
            }
        });
    }

    /** Submit the form with ajax and displays the books */
    $(document).on('submit', '#book-catalog', function() {
        $('.modal-btn').prop('disabled', true);
        $.post($(this).attr('action'), $(this).serialize(), function(res) {
            $('.books-table tbody').html(res);
            $('.close').click();
        });
        return false;
    });

    /** Event to trigger that opens the modal */
    $(document).on('click', '.action-modal-btn', function() {
        $('.modal-content').html('');
        $.ajax({
            type: "GET",
            url: $(this).attr('href'),
            data: {
                action: $(this).attr('data-action'),
                id: $(this).attr('data-book-id')
            },
            success: function(res) {
                $('.modal-content').html(res);
            }
        });
    });

    /** Run the fetch book catalogs to display all tables from database */
    fetch_book_catalogs();
});