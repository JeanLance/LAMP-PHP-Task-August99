<?php
    session_start();

    require_once './DB_CONN.php';
    $db = new DB();

    class Book {
        /** Method/Function to get all books */
        public function get_books() {
            global $db;

            $query = 'SELECT * FROM books';
            $books = $db->fetch_all($query);

            $_SESSION['book_catalogs'] = $books;
            header('location: ../includes/books_partials.php');
        }

        /** Method/Function to fetch book by ID */
        public function fetch_book_by_id($id) {
            $id     = $db->escape_string($id);
            $query  = "SELECT * FROM books WHERE id = $id";
            return  $db->run_mysqli_query($query);
        }

        /** Add Query */
        public function add($data) {
            global $db;

            $query          = "INSERT INTO books (title, isbn, author, publisher, year_published, category)
                                VALUES (
                                    '{$data['title']}', 
                                    '{$data['isbn']}', 
                                    '{$data['author']}', 
                                    '{$data['publisher']}', 
                                    '{$data['yr_published']}', 
                                    '{$data['category']}')";
                                    
            $insert_id      = $db->run_mysqli_query($query);
            $this->get_books();
        }

        /** Edit Query */
        public function edit($data) {
            global $db;

            $query  = "UPDATE books SET 
                        title = '{$data['title']}',
                        isbn = '{$data['isbn']}',
                        author = '{$data['author']}',
                        publisher = '{$data['publisher']}',
                        year_published = '{$data['yr_published']}',
                        category = '{$data['category']}'
                        WHERE id = {$data['id']}";

            $db->run_mysqli_query($query);
            $this->get_books();
        }

        /** Delete Query */
        public function delete($data) {
            global $db;

            $query = "DELETE FROM books WHERE id = {$data['id']}";

            $db->run_mysqli_query($query);
            $this->get_books();
        }

        /** Escape Strings */
        public function escape_form_input($data) {
            global $db;

            $data['title']          = $db->escape_string($data['title']);
            $data['isbn']           = $db->escape_string($data['isbn']);
            $data['author']         = $db->escape_string($data['author']);
            $data['publisher']      = $db->escape_string($data['publisher']);
            $data['yr_published']   = $db->escape_string($data['yr_published']);
            $data['category']       = $db->escape_string($data['category']);
            
            return $data;
        }
    }

    $books = new Book();
    

    if (isset($_GET['table_init'])) {
        $books->get_books();
    }
    
    if(isset($_POST['action']) && $_POST['action'] == 'add') {
        $postData = $_POST;
        $postData = $books->escape_form_input($postData);
        
        $books->add($postData);
    }
    else if (isset($_POST['action']) && $_POST['action'] == 'edit') {
        $postData = $_POST;
        $postData = $books->escape_form_input($postData);
        
        $books->edit($postData);
    }
    else if (isset($_POST['action']) && $_POST['action'] == 'delete') {
        $postData = $_POST;
        
        $books->delete($postData);
    }
?>