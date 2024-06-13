<?php

require_once '../includes/header.php';

?>


<div class="w-full h-screen flex justify-center items-center">
    <form action="../../routes/login.php" method="post" class="bg-amber-300 rounded-xl flex justify-center items-center flex-col gap-3  w-[30%] p-5">
        <label for="username">Username</label>

        <input type="text" placeholder="Your username" name="username" require class="w-[50%] border border-black rounded-lg p-1">

        <label for="password">Password</label>

        <input type="password" placeholder="Your password" name="password" require class="w-[50%] border border-black rounded-lg p-1">
        
        <button type="submit" class="bg-white rounded-full p-3">Login</button>
    </form>
</div>

<?php

require_once '../includes/footer.php';

?>