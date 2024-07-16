<?php
require_once '../../routes/authCheck.php';
authCheck();
require_once dirname(__DIR__) . '../../routes/readCars.php';
$cars = getAllCars();
// var_dump($cars);
// die();




?>
<style>
    .hero-sec {
        background-image: url(../../public/assets/images/car-background.jpg);
        background-repeat: no-repeat;
        background-size: cover;
        /* height: 100vh; */
        width: 100%;
        display: flex;
        flex-direction: column;

    }

    .hero-desc-container {
        width: 100%;
        display: flex;
        justify-content: end;


    }

    .hero-desc {
        width: 95%;
        /* background-color: black; */
        display: flex;
        flex-direction: column;
        gap: 2;
    }

    .desc {
        width: 40%;
        font-size: 50px;
    }

    .desc-para {
        width: 40%;
    }

    .line {
        font: 20px;
    }

    .filter-part {
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .filter {
        margin-top: 2%;
        width: 80%;
        background-color: white;
        padding: 2%;
        border-radius: 10px;
        margin-bottom: 10vh;
        display: flex;
        flex-direction: column;
        align-items: center;
        /* gap: ; */
    }

    .filter-title {
        font-size: 23px;
        margin-bottom: 20px;
    }

    .selects-container {
        width: 100%;
        display: flex;
        justify-content: space-around;
        align-items: center;
        flex-wrap: wrap;
    }

    .dropdown {
        box-sizing: border-box;
    }

    .select {
        color: gray;
        display: flex;
        justify-content: space-between;
        align-items: center;
        border: 2px gray solid;
        border-radius: 5px;
        padding: 6px;
        width: 200px;
        cursor: pointer;
        transition: background 0.3;
        font-size: 12px;
    }

    .select-clicked {
        border: 2px black solid;
        box-shadow: 0 0 0.8em black;
    }

    .select:hover {
        background-color: gray;
    }

    .caret {
        width: 0;
        height: 0;
        border-left: 5px solid transparent;
        border-right: 5px solid transparent;
        border-top: 6px solid black;
        transition: 0.3s;
        /* background-color: black; */
    }

    .caret-rotate {
        transform: rotate(180deg);
    }

    .menu {
        list-style: none;
        padding: 0.2em 0.5em;
        background: white;
        border: 1px black solid;
        border: 1px solid;
        /* padding: 10px; */
        box-shadow: 1px 5px #888888;
        border-radius: 0.5em;
        color: black;
        position: absolute;
        top: 3em;
        left: 50%;
        width: 100%;
        transform: translateX(-50%);
        opacity: 0;
        display: none;
        transition: 0.2s;
        z-index: 1;
    }

    .menu li {

        padding: 0.7em 0.5em;
        margin: 0.3em 0;
        border-radius: 0.5em;
        cursor: pointer;
    }

    .menu li:hover {
        background: gray;
    }

    .active {
        background: gray;
    }

    .menu-open {
        display: block;
        opacity: 1;
    }

    /* .car-filter{
        width: 200px ;
        background-color: black;
        padding: 2%;
    } */
    .about-sec {
        background-color: black;
        width: 100%;
        display: flex;
        justify-content: end;
    }

    .about-details {
        width: 95%;
        display: flex;
        justify-content: center;
        gap: 7%;
        margin-top: 5%;
        margin-bottom: 5%;

    }

    .about-desc {
        width: 30%;
        margin-top: 7%;
    }

    .about-p {
        font-size: 15px;
    }

    .about-title {
        border-bottom: red 1px solid;
        width: 23%;
        padding-bottom: 10px;
    }

    .test {
        width: 100%;
        display: flex;
        justify-content: center;
        background-color: black;
        padding: 5%;

    }

    .test-details {
        width: 90%;
        justify-content: center;
        /* gap: 5%; */
        margin-top: 5%;
        background-color: black;

    }

    .brands-images {
        display: flex;
        justify-content: center;
        gap: 5%;
    }

    .partners-title {

        text-align: center;
    }

    .cars {
        width: 100%;
        display: flex;
        justify-content: end;
        background-color: black;
        padding: 3%;
    }

    .cars-details {
        width: 95%;
        display: flex;
        flex-direction: column;

    }

    .car-cards {
        margin-top: 3%;
        width: 100%;
        display: flex;
        justify-content: center;
        gap: 5%;
    }

    .how {
        width: 100%;
        width: 100%;
        display: flex;
        justify-content: end;
        background-color: black;
        padding: 3%;
    }

    .how-details {
        width: 100%;
        display: flex;
        flex-direction: column;
    }

    .how-explain {
        display: flex;
        justify-content: center;
        align-items: center;

    }

    .how-icon {
        font-size: 35px;
        padding: 25px;
        color: black;
        background-color: red;
        border-radius: 100%;
    }

    .carousel-item {
        display: flex !important;
        flex-direction: column !important;
        justify-content: center !important;
        align-items: center;
        /* width: 80%; */
        /* justify-content: center; */
    }

    .test-container {
        display: flex;
        flex-direction: column;
        /* background-color: black; */
        width: 70%;
        padding: 2%;
    }

    .persona {
        display: flex;
        gap: 20px;
        align-items: center;
        padding: 6%;
    }

    .contact-us {
        width: 100%;
        background-color: #f5f5f5;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 5;
    }

    .contact-container {
        width: 80%;
        display: flex;
        justify-content: center;
        gap: 1%;
    }

    .left-contact {
        width: 40%;
    }

    .right-contact {
        width: 50%;
        background-color: black;
        display: flex;
        flex-direction: column;
        justify-content: start;
        /* align-items: center; */
        padding: 5%;
    }

    /* .inside-right {
        background-color: black;
        display: flex;
        flex-direction: column;
        justify-content: start;
    } */

    .button-contact {
        background-color: red;
        padding: 10px;
        width: 200px;
        text-align: center;
    }

    .phone-container {
        width: 80%;
        display: flex;
        height: 40px;
        margin-bottom: 60px;

    }

    .phone-icon {
        padding: 15px;
        color: black;
        background-color: white;

    }

    .email-icon {
        padding: 15px;
        color: black;
        background-color: white;

    }

    /* .phone-number {
        
        background-color: red;
        width: 100%;
        height: 100%;
        
    } */

    .email-container {
        width: 80%;
        height: 40px;
        display: flex;
        margin-bottom: 40px;

    }


    /* .email {
        padding: 15px;
        background-color: red;
        width: 100%;
        height: 100%;
    } */
    .footer {
        width: 100%;
        background-color: white;
        padding: 5%;
    }

    .icons-footer {
        display: flex;
        justify-content: center;
        gap: 3%;
    }

    @font-face {
        font-family: 'robot';
        src: url(../../public/assets/fonts/Square.ttf   );

    }

    .first-font {
        font-family: 'robot';
    }

    .menu input[type="date"] {
        border: none;
        font-size: 16px;
    }
</style>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const dropdowns = document.querySelectorAll('.dropdown');

        dropdowns.forEach(dropdown => {
            function closeAllDropdowns(except) {
                document.querySelectorAll('.dropdown').forEach(dropdown => {
                    if (dropdown !== except) {
                        const select = dropdown.querySelector('.select');
                        const caret = dropdown.querySelector('.caret');
                        const menu = dropdown.querySelector('.menu');
                        select.classList.remove('select-clicked');
                        caret.classList.remove('caret-rotate');
                        menu.classList.remove('menu-open');
                    }
                });
            }

            const select = dropdown.querySelector('.select');
            const caret = dropdown.querySelector('.caret');
            const menu = dropdown.querySelector('.menu');
            const options = dropdown.querySelectorAll('.menu li');
            const selected = dropdown.querySelector('.selected');
            const input = dropdown.querySelector('.input');

            select.addEventListener('click', () => {
                closeAllDropdowns(dropdown);
                select.classList.toggle('select-clicked');
                caret.classList.toggle('caret-rotate');
                menu.classList.toggle('menu-open');
            });

            options.forEach(option => {
                option.addEventListener('click', () => {
                    selected.innerHTML = option.innerHTML;
                    input.value = selected.innerHTML;
                    
                    menu.classList.remove('menu-open');
                    select.classList.remove('select-clicked');
                    caret.classList.remove('caret-rotate');
                    options.forEach(option => {
                        option.classList.remove('active');
                    });
                    option.classList.add('active');
                });
            });
        });
    });
</script>
<div class="hero-sec">
    <?php
    require_once '../includes/header.php';
    ?>
    <div class="hero-desc-container">
        <div class="hero-desc">
            <h3 class="fs-2 text-white mb-3 first-font"><b>Welcome</b></h3>
            <h1 class="desc mb-3 text-white"> This is my project bitch show some <span class="text-danger">respect</span></h1>
            <p class="desc-para text-white">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Exercitationem dolor culpa laudantium nulla, in eos consequuntur at sint accusantium ea ut inventore deleniti velit amet ratione ab incidunt atque recusandae praesentium quaerat architecto soluta doloremque! Molestiae, laudantium rerum. Veritatis, itaque hic. Culpa officiis aliquam, placeat corrupti recusandae et delectus nulla.</p>
            <div class="d-flex gap-3 justify-content-start align-items-center">
                <i class="fa-solid fa-arrow-right-long text-danger mb-3 "></i>
                <p class="text-danger text-center">learn more</p>
            </div>
        </div>
    </div>
    <div class="filter-part">
        <div class="filter ">
            <h1 class="filter-title"><b>Select & Rent <span class="text-danger">Cars</span></b></h1>
            <div class="selects-container">
                <!-- Car Select -->
                <form action="../../routes/renting.php" class="selects-container" method="post">
                    <div class="dropdown ">
                        <div class="select">
                            <i class="fa-solid fa-car text-danger"></i>
                            <span class="selected"><b>Select Car type</b></span>
                            <div class="caret"></div>
                        </div>
                        <ul class="menu">
                            <?php foreach ($cars as $car) : ?>
                                <li class=""><?php echo $car['mark'] ?></li>
                                <input id="model-" class="d-none" type="text" name="model" value="<?php echo $car['model']; ?>">
                                <input id="mark-" class="d-none" type="text" name="mark" value="<?php echo $car['mark']; ?>">
                                <input id="registration_number-" type="hidden" name="registration_number" value="<?php echo $car['registration_number']; ?>">
                                <input type="number" value="<?php echo $car['id'] ?>" name="car_id" class="d-none">
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <!-- Pickup Location -->
                    <div class="dropdown pickup">
                        <div class="select">
                            <i class="fa-solid fa-location-dot text-danger"></i>
                            <span class="selected pickup"><b>Select a pickup location</b></span>
                            <input type="text" class="d-none input" name="pickup_location" value="">
                            <div class="caret"></div>
                        </div>
                        <ul class="menu">
                            <li>casablanca</li>
                            <li>Rabat</li>
                            <li>marrakech</li>
                            <li class="active">tangier</li>
                        </ul>
                    </div>

                    <!-- Pickup Date -->
                    <div class="dropdown">
                        <div class="select">
                            <i class="fa-solid fa-calendar-days text-danger"></i>
                            <!-- <input type="date" class="d-none"> -->
                            <span class="selected"><b>Pickup a date</b></span>
                            <div class="caret"></div>
                        </div>
                        <ul class="menu">
                            <li class="active"><input type="date" name="pickup_date"></li>
                        </ul>
                    </div>
                    <!-- Dropoff date -->
                    <div class="dropdown">
                        <div class="select">
                            <i class="fa-solid fa-calendar-days text-danger"></i>
                            <span class="selected"><b>Dropoff a date</b></span>

                            <div class="caret"></div>
                        </div>
                        <ul class="menu">
                            <li class="active"><input type="date" name="dropoff_date"></li>
                        </ul>
                    </div>
                    <!-- Dropoff Location -->
                    <div class="dropdown dropoff">
                        <div class="select">
                            <i class="fa-solid fa-location-dot text-danger"></i>
                            <span class="selected dropoff_selected"><b>dropoff location</b></span>
                            <input type="text" class="d-none input" name="dropoff_location" value="">
                            <div class="caret"></div>
                        </div>
                        <ul class="menu">
                            <li>casablanca</li>
                            <li>Rabat</li>
                            <li>marrakech</li>
                            <li class="active">tangier</li>
                        </ul>
                    </div>
                    <button>rent</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="partners">
    <div class="partners-details">
        <h3 class="partners-title my-3">Our partners</h3>
        <div class="brands-images mb-3">
            <img src="../../public/assets/images/car-brand.png" alt="" srcset="" width="120">
            <img src="../../public/assets/images/fiat_logo-freelogovectors.net_.png" alt="" srcset="" width="120">
            <img src="../../public/assets/images/mercedece.png" alt="" srcset="" width="120">
            <img src="../../public/assets/images/toyota.png" alt="" srcset="" width="120">
            <img src="../../public/assets/images/nissan.png" alt="" srcset="" width="120">
        </div>
    </div>
</div>
<div class="cars">
    <div class="cars-details">
        <h2 class="text-center text-white">Our cars</h2>
        <div class="car-cards">
            <div class="card" style="width: 18rem;">
                <img src="../../public/assets/images/card-2.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
            <div class="card" style="width: 18rem;">
                <img src="../../public/assets/images/card-2.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
            <div class="card" style="width: 18rem;">
                <img src="../../public/assets/images/card-2.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="how">
    <div class="how-details">
        <h2 class="text-center text-white mb-5">How it works</h2>
        <div class="how-explain">
            <div class="d-flex flex-col justify-content-center align-items-center">
                <i class="fa-solid fa-car how-icon"></i>
                <h3 class="text-white text-center">Choose a car</h3>
                <p class="text-white text-center">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aperiam quae neque quisquam, quas tempora similique obcaecati
                    debitis </p>
            </div>
            <h2 class="text-danger mx-3"><b>..................................</b></h2>
            <div class="d-flex flex-col justify-content-center align-items-center">
                <i class="fa-solid fa-receipt how-icon"></i>
                <h3 class="text-white text-center">Book online</h3>
                <p class="text-white text-center">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aperiam quae neque quisquam, quas tempora similique obcaecati
                    debitis !</p>
            </div>
            <h2 class="text-danger mx-3"><b>..................................</b></h2>
            <div class="d-flex flex-col justify-content-center align-items-center">
                <i class="fa-solid fa-location-dot how-icon"></i>
                <h3 class="text-white text-center">Pickup & drive</h3>
                <p class="text-white text-center">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aperiam quae neque quisquam, quas tempora similique obcaecati
                    debitis </p>
            </div>
        </div>
    </div>
</div>
<div class="about-sec">
    <div class="about-details">
        <div class="about-image">
            <img width="300" src="../../public/assets/images/34979-red_porsche_911_on_road_during_daytime-1080x1920 (1).jpg" alt="" srcset="">
        </div>
        <div class="about-desc">
            <h5 class="text-danger about-title">About Us</h5>
            <h2 class="text-white">Park auto car renting agency</h2>
            <p class="text-white about-p">Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                Optio omnis numquam inventore, veniam illum, repellendus animi quo tenetur cumque sunt
                laborum quia necessitatibus iste minus? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloremque fugit sunt
                alias totam quisquam pariatur accusantium tenetur blanditiis vitae eius, eligendi fuga! Aperiam, consequatur architecto.</p>
        </div>
    </div>
</div>
<div class="test">
    <div class="test-details">
        <div class="d-flex flex-column">
            <h2 class="text-white text-center">Testimonial</h2>
            <h4 class="text-center text-danger my-4">What Our Customers Says</h4>
        </div>
        <div id="carouselExampleIndicators" class="carousel slide">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">

                    <div class="test-container">
                        <i class="fa-solid fa-quote-left text-danger fs-1"></i>
                        <p class="fs-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos, aperiam. Lorem ipsum dolor sit amet.</p>
                        <i class="fa-solid fa-quote-right text-danger text-end fs-1"></i>
                    </div>
                    <div class="persona">
                        <img src="../../public/assets/images/zack.jpeg" class="rounded-circle" width="100" alt="">
                        <div class="infos">
                            <h5 class="text-danger">Web developer</h5>
                            <p>He loves kaoutar aurora</p>
                        </div>
                    </div>

                </div>
                <div class="carousel-item active">

                    <div class="test-container">
                        <i class="fa-solid fa-quote-left text-danger fs-1"></i>
                        <p class="fs-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos, aperiam. Lorem ipsum dolor sit amet.</p>
                        <i class="fa-solid fa-quote-right text-danger text-end fs-1"></i>
                    </div>
                    <div class="persona">
                        <img src="../../public/assets/images/hamza.jpeg" class="rounded-circle" width="100" alt="">
                        <div class="infos">
                            <h5 class="text-danger">Web developer</h5>
                            <p>He loves kaoutar aurora</p>
                        </div>
                    </div>

                </div>
                <div class="carousel-item active">

                    <div class="test-container">
                        <i class="fa-solid fa-quote-left text-danger fs-1"></i>
                        <p class="fs-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos, aperiam. Lorem ipsum dolor sit amet.</p>
                        <i class="fa-solid fa-quote-right text-danger text-end fs-1"></i>
                    </div>
                    <div class="persona">
                        <img src="../../public/assets/images/zack.jpeg" class="rounded-circle" width="100" alt="">
                        <div class="infos">
                            <h5 class="text-danger">Web developer</h5>
                            <p>He loves kaoutar aurora</p>
                        </div>
                    </div>

                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</div>
<div class="contact-us">
    <div class="contact-container">
        <div class="left-contact">
            <img src="../../public/assets/images/car-stainless-logo-png.webp" width="200" alt="" srcset="">
            <h2 class="text-black">GET YOURS NOW! </h2>
            <p class="text-black">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatem, repellendus!</p>
            <button class="button-contact text-white"><b>Pre-order now</b></button>
        </div>
        <div class="right-contact">
            <div class="inside-right p-1">
                <p class="text-white pb-3 text-start">CALL FOR QUESTIONS</p>
                <div class=" phone-container ">
                    <div class="phone-icon">
                        <i class="fa-solid fa-phone  "></i>
                    </div>
                    <div class="phone-number bg-danger w-100 text-center ">
                        <p class=" fs-5 mt-1  text-white  ">+212 6 99 31 23 62</p>
                    </div>
                </div>
                <p class="text-white pb-3 text-start">Email For Contact!</p>
                <div class="email-container">
                    <div class="email-icon">
                        <i class="fa-solid fa-envelope "></i>
                    </div>
                    <div class="email text-center bg-danger w-100   ">
                        <p class=" fs-5 text-white ">zakaria.eldahar@gmail.com</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="footer">
    <div class="icons-footer">
        <i class="fa-brands fa-facebook text-danger fs-2"></i>
        <i class="fa-brands fa-twitter text-danger fs-2"></i>
        <i class="fa-brands fa-instagram text-danger fs-2"></i>
    </div>
    <div class="copyright">
        <p class=" text-gray text-center my-4   ">&copy; 2024 All right reserved by Parkauto team</p>
    </div>
</div>
<?php require_once '../includes/footer.php' ?>