<?php
require_once '../../routes/authCheck.php';
authCheck();





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
        width: 80%;
        background-color: white;
        padding: 5%;
        /* border-radius: 5%; */
        margin-bottom: 10vh;
        display: flex;
        justify-content: space-around;
        align-items: center;
        /* gap: ; */
    }

    .dropdown {
        box-sizing: border-box;
    }

    .select {
        color: black;
        display: flex;
        justify-content: space-between;
        align-items: center;
        border: 2px black solid;
        border-radius: 10px;
        padding: 10px;
        width: 200px;
        cursor: pointer;
        transition: background 0.3;
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

            select.addEventListener('click', () => {
                closeAllDropdowns(dropdown);
                select.classList.toggle('select-clicked');
                caret.classList.toggle('caret-rotate');
                menu.classList.toggle('menu-open');
            });
            options.forEach(option => {
                option.addEventListener('click', () => {
                    selected.innerHTML = option.innerHTML;
                    select.classList.remove('select-clicked');
                    caret.classList.remove('caret-rotate');
                    menu.classList.remove('menu-open');
                    options.forEach(option => {
                        option.classList.remove('active');
                    });
                    option.classList.add('active')
                });
            });




        })
    })
</script>
<div class="hero-sec">
    <?php
    require_once '../includes/header.php';
    ?>
    <div class="hero-desc-container">
        <div class="hero-desc">
            <h3 class="fs-2 text-white mb-3"><b>Welcome</b></h3>
            <h1 class="desc mb-3 text-white"> This is my project bitch show some <span class="text-danger">respect</span></h1>
            <p class="desc-para text-white">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Exercitationem dolor culpa laudantium nulla, in eos consequuntur at sint accusantium ea ut inventore deleniti velit amet ratione ab incidunt atque recusandae praesentium quaerat architecto soluta doloremque! Molestiae, laudantium rerum. Veritatis, itaque hic. Culpa officiis aliquam, placeat corrupti recusandae et delectus nulla.</p>
            <div class="d-flex gap-3 justify-content-start align-items-center">
                <i class="fa-solid fa-arrow-right-long text-danger mb-3 "></i>
                <p class="text-danger text-center">learn more</p>
            </div>
        </div>
    </div>
    <div class="filter-part">
        <div class="filter rounded-lg">
            <div class="dropdown">
                <div class="select">
                    <span class="selected">Figma</span>
                    <div class="caret"></div>
                </div>
                <ul class="menu">
                    <li>Bmw</li>
                    <li class="active">Mercedece</li>
                </ul>
            </div>
            <div class="dropdown">
                <div class="select">
                    <span class="selected">Figma</span>
                    <div class="caret"></div>
                </div>
                <ul class="menu">
                    <li>Bmw</li>
                    <li class="active">Mercedece</li>
                </ul>
            </div>
            <div class="dropdown">
                <div class="select">
                    <span class="selected">Figma</span>
                    <div class="caret"></div>
                </div>
                <ul class="menu">
                    <li>Bmw</li>
                    <li class="active">Mercedece</li>
                </ul>
            </div>
        </div>
    </div>

</div>