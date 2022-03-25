<?php
    session_start();
    $book = $_SESSION['book_edit_data'];
    unset($_SESSION['book_edit_data']);
?>
<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Edit book catalog #<?= $book['id']?></h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body books-modal">
    <form id="book-catalog" action="processes/book.php" method="POST">
        <input type="hidden" name="action" value="edit">
        <input type="hidden" name="id" value="<?= $book['id']?>">
        <label><span class="label-wrapper">Title:</span><input type="text" name="title" value="<?= $book['title']?>" required></label>
        <label><span class="label-wrapper">ISBN:</span><input type="text" name="isbn" value="<?= $book['isbn']?>" required></label>
        <label><span class="label-wrapper">Author:</span><input type="text" name="author" value="<?= $book['author']?>" required></label>
        <label><span class="label-wrapper">Publisher:</span><input type="text" name="publisher" value="<?= $book['publisher']?>" required></label>
        <label><span class="label-wrapper">Year Published:</span><input type="text" name="yr_published" value="<?= $book['year_published']?>" required></label>
        <label><span class="label-wrapper">Category:</span><input type="text" name="category" value="<?= $book['category']?>" required></label>
    </form>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary modal-btn" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary modal-btn" form="book-catalog">Save changes</button>
</div>