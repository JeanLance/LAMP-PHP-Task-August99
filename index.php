<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js">
    </script><script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="assets/js/script.js"></script>
    <title>Document</title>
</head>
<body>
    <div id="container">
        <div class="table-wrapper">
            <div class="button-wrapper">
                <a class="btn primary-btn action-modal-btn" data-toggle="modal" data-target="#book-modal" data-action="add" href="../processes/modals.inc.php">Add</a>
            </div>
            <table class="books-table">
                <thead>
                    <th>TITLE</th>
                    <th>ISBN</th>
                    <th>AUTHOR</th>
                    <th>PUBLISHER</th>
                    <th>YEAR PUBLISHED</th>
                    <th>CATEGORY</th>
                    <th></th>
                </thead>
                <tbody>
                    <!-- Table Rows Inserted Here -->
                </tbody>
            </table>
        </div>
    </div>
    <!-- Modal Parent DOM -->
    <div class="modal fade" id="book-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            </div>
        </div>
    </div>
</body>
</html>