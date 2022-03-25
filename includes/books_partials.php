<?php
    session_start();
    $book_catalogs = $_SESSION['book_catalogs'];
    unset($_SESSION['book_catalogs']);
    foreach($book_catalogs as $book) { ?>
    <?php var_dump($book_catalogs); ?>
    <tr>
        <td><?= $book['title']?></td>
        <td><?= $book['isbn']?></td>
        <td><?= $book['author']?></td>
        <td><?= $book['publisher']?></td>
        <td><?= $book['year_published']?></td>
        <td><?= $book['category']?></td>
        <td class="action-btns">
            <ul>
                <li><a class="action-modal-btn" data-toggle="modal" data-target="#book-modal" data-action="edit" data-book-id="<?=$book['id']?>" href="../processes/modals.inc.php">EDIT</a></li>
                <li><a class="action-modal-btn" data-toggle="modal" data-target="#book-modal" data-action="delete" data-book-id="<?= $book['id']?>" href="../processes/modals.inc.php">DEL</a></li>
            </ul>
        </td>
    </tr>
<?php
    } ?>