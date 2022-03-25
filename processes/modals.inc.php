<?php
    session_start();

    require_once './DB_CONN.php';
    $db = new DB();
    
    class Modal {
        /** Modal for adding new book */
        public function add() {
            header('location: ../modals/add.modal.php');
            exit();
        }

        /** Modal for edit book catalog */
        public function edit($id) {
            global $db;

            $id     = $db->escape_string($id);
            $query  = "SELECT * FROM books WHERE id = $id";
            $result = mysqli_query($db->conn, $query);
            $_SESSION['book_edit_data'] = mysqli_fetch_assoc($result);
            header("location: ../modals/edit.modal.php?id=$id");
            exit();
        }
        
        /** Modal for deleting book catalog */
        public function delete($id) {
            header("location: ../modals/delete.modal.php?id=$id");
            exit();
        }
    }

    $modal = new Modal();

    if (! $_GET) {
        header('../index.php');
    }

    $action = $_GET['action'];

    if ($action == 'add') {
        $modal->add();
    }
    else if ($action == 'edit') {
        $book_id = $_GET['id'];
        $modal->edit($book_id);
    }
    else if ($action == 'delete') {
        $book_id = $_GET['id'];
        $modal->delete($book_id);
    }
?>
