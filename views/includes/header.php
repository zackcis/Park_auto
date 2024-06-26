<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/app.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css  ">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>Park auto</title>
</head>

<body class="d-flex justify-content-center flex-column ">
    <style>
        header{
        /* width: 80%; */
        /* background-color: black; */
        }
        nav{
            width: 95%;
            /* background-color: black; */
            /* align-items: center; */
        }
    </style>
    <header class="d-flex justify-content-end items-center ">
        <?php if (isset($_SESSION['user_id'])) : ?>
            <nav class="d-flex justify-content-between align-items-center py-4 mt-3  ">
                <ul class="flex gap-5 font-bold">
                    <img src="../../public/assets/images/car-stainless-logo-png.webp" width="100" alt="" srcset="">
                    <a href="../user/index.php" class="cursor-pointer text-decoration-none text-white mx-2 fs-9 ">Home</a>
                    <a href="../user/user_panel.php" class="cursor-pointer text-decoration-none text-white mx-2 fs-9 ">Cars</a>
                    <a href="../user/services.php" class="cursor-pointer text-decoration-none text-white mx-2 fs-9 ">Our Services</a>
                    <a href="../user/about.php" class="cursor-pointer text-decoration-none text-white mx-2 fs-9 ">About Us</a>
                    <a href="../user/contact_us.php" class="cursor-pointer text-decoration-none text-white mx-2 fs-9 ">Contact Us</a>

                    <?php if ($_SESSION['role'] === 'admin') : ?>
                        <a class="cursor-pointer text-decoration-none text-white mx-4 ">
                            Cars management
                        </a>
                        <a class="cursor-pointer text-decoration-none text-white mx-4 ">
                            Users management
                        </a>
                        <a class="cursor-pointer text-decoration-none text-white mx-4 ">
                            Rents management
                        </a>
                    <?php endif ?>

                </ul>
                <a class="auth cursor-pointer text-decoration-none text-white mx-4 fs-9  ">
                    <form action="../../routes/logout.php" method="post">
                        <button type="submit"><b>Logout</b></button>
                    </form>
                </a>
            </nav>
        <?php else : ?>
            <h1 class="text-4xl w-full  text-center mt-7">WELCOME TO PARK AUTO</h1>
        <?php endif ?>
    </header>