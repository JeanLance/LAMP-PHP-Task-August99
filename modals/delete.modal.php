<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Delete book catalog #<?= $_GET['id']?></h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body books-modal">
    <p>Are you sure you want to delete book catalog #<?= $_GET['id']?>?</p>
    <form id="book-catalog" action="processes/book.php" method="POST">
        <input type="hidden" name="action" value="delete">
        <input type="hidden" name="id" value="<?= $_GET['id']?>">
    </form>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary modal-btn" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary modal-btn" form="book-catalog">Yes</button>
</div>