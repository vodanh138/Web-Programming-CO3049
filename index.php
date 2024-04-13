<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website</title>
    <link rel="stylesheet" href="./style1/index.css" />
</head>

<body>
    <div class="logo-con">
        <a href="index.php?page=home">
            <div class="logo-container">
                <img src="./asset/hcmut.png">
            </div>
        </a>
        <div class="link">
            <p>
                Welcome to MyBK
            </p>
            <?php
            session_start();

            // Kiểm tra xem người dùng đã đăng nhập hay chưa
            if (isset($_SESSION['ori_username'])) {
                $username = $_SESSION['ori_username'];
                // Nếu đã đăng nhập, hiển thị nút "Logout"
                echo    '<div class = "user_info">
                            <a href = "index.php?page=logout">
                                <img src="./asset/user.png">';
                echo            "$username";
                echo        '</a>
                        </div>';
            } else {
                // Nếu chưa đăng nhập, hiển thị nút "Login"
                echo '  <div class="login">
                            <a href="index.php?page=login">Login</a>
                        </div>
                        <a href="index.php?page=register">Register</a>
                        <a href="index.php?page=products">Products</a>';
            }
            ?>
            <a href="index.php?page=home">Home</a>
        </div>
    </div>
    <main>
        <?php
        $page = isset($_GET['page']) ? $_GET['page'] : 'home';
        $page_path = $page . '.php';
        if (file_exists($page_path)) {
            include $page_path;
        } else {
            echo "404 Page not found";
        }
        if (isset($_SESSION["ori_username"])){
            echo    '<div class="product">
                        <div class = "sproduct">
                            <a href="index.php?page=products">Search Product</a>
                        </div>
        
                        <div class = "aproduct">
                            <a href="index.php?page=add_product">Add Product</a>
                        </div>
        
                        <div class = "mproduct">
                            <a href="index.php?page=my_product">My Product</a>
                        </div>
                    </div>';
        }  
        ?>
    </main>
    
</body>

</html>