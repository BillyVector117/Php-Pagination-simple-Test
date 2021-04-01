<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagination-Billy Rodriguez M.</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel='stylesheet' type="text/css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <h1>Articles</h1>
        <section class="articles">
            <!-- Access to array 'Articles' (Extracted data from database) -->
            <ul>
                <?php foreach ($articles as $article) : ?>
                    <li><?php echo $article['id'] . ' .- ' . $article['description'] ?></li>
                <?php endforeach; ?>
            </ul>
        </section>
        <section class="pagination">
            <ul>
                <!--  Start pagination button -->
                <?php if ($page == 1) : ?>
                    <li class="disabled">&laquo;</li>
                <?php else : ?>
                    <!-- If page is different to '1' concat '$page' -1 to previous page-->
                    <li><a href="?page= <?php echo $page - 1 ?>">&laquo;</a></li>
                <?php endif ?>

                <?php
                /* Pagination button (li) iterations */
                for ($i = 1; $i <= $paginationNumber; $i++) {
                    // Button active if user is in the same pagination
                    if ($page == $i) {
                        echo "<li class='active'><a href='?page=$i'>$i</a></li>";
                    } else {
                        // Else, store a normal pagination button
                        echo "<li><a href='?page=$i'>$i</a></li>";
                    }
                }
                ?>
                <!-- End Pagination button -->
                <?php if ($page == $paginationNumber) : ?>
                    <!--  $page == 'lastAvailablePage' -->
                    <li class="disabled">&raquo;</li>
                <?php else : ?>
                    <!-- If page is different to '1' concat '$page' -1 to previous page-->
                    <li><a href="?page= <?php echo $page + 1 ?>">&raquo;</a></li>
                <?php endif ?>

            </ul>
        </section>
    </div>
</body>

</html>