<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href="./style1/products.css"/>
</head>
<body>
    <form id = "searching_form"  method="post">
        <div class = "searching_form">
        <input class = "search_bar" name = "search_bar" id = "search_bar" tyoe = "text" placeholder="Searching....">  
        <button type="submit" name = "btn_searching" class = "btn_searching"> Search </button>
        </div>
    </form>
    <main>
        <?php
            require "./database/connect.php";
            if (isset($_POST["btn_searching"])) {
                $search = $_POST["search_bar"];
                $sql = "SELECT * from product_table Where pname Like '%$search%'";
                $result = mysqli_query($con, $sql);
                echo    "<p>Searching for: " . $search . '</p><br>';
                if (mysqli_num_rows($result) > 0) {
                    echo '<div class = "page_display">';
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo    '<div class = "product_display">';
                        echo        '<img src = "';
                        echo        $row['image'];
                        echo        '"> <br>';
                        echo        "<p>Product's name:</p>";
                        echo        '<p>'.$row['pname'].'</p><br>';
                        echo        '<p>Price: '.$row['Price'].'$ </p>';
                        echo    '</div>';

                    }
                    echo '</div>';
                }
                else {
                    echo "<p>No result found</p>";
                }
            }   
        ?>
    </main>
</body>
</html>