<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/app.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Park auto</title>
</head>

<body>
    <header class="w-full justify-center items-center ">
        <?php if (isset($_SESSION['user_id'])) : ?>
            <nav class="flex w-full justify-center items-center py-4 mt-3">
                <ul class="flex gap-5 font-bold">
                    <li class="cursor-pointer mx-4 ">Home</li>
                    <li class="cursor-pointer mx-4 ">Cars</li>
                    <li class="cursor-pointer mx-4 ">Our Services</li>
                    <li class="cursor-pointer mx-4 ">About Us</li>
                    <li class="cursor-pointer mx-4 ">Contact Us</li>
                    <li class="cursor-pointer mx-4 ">
                        <form action="../../routes/logout.php" method="post">
                            <button type="submit">Logout</button>
                        </form>
                    </li>
                    <?php if($_SESSION['role'] === 'admin') : ?>
                        <li class="cursor-pointer mx-4 ">
                            Cars management
                        </li>
                        <li class="cursor-pointer mx-4 ">
                            Users management
                        </li>
                        <li class="cursor-pointer mx-4 ">
                            Rents management
                        </li>
                        <?php endif ?>
                </ul>
            </nav>
        <?php else : ?>
            <h1 class="text-4xl w-full  text-center mt-7">WELCOME TO PARK AUTO</h1>
            <?php
            include_once '../auth/login.php'
            ?>
            
        <?php endif ?>
    </header>