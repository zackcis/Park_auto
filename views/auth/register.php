<?php 
include_once '../includes/header.php';
 ?>


<div class="w-full h-screen p-2 flex justify-center items-center ">
<form action="../../routes/register.php" method="post" class="bg-amber-300 rounded-xl flex justify-center items-center flex-col gap-3  w-[30%] p-5">
<label for="username">Username</label>
<input class="w-[50%] border border-black rounded-lg p-1 " type="text" placeholder="Your username" name="username" require>
<label for="email">Email</label>
<input class="w-[50%] border border-black rounded-lg p-1 " type="email" placeholder="Your Email" name="email" require>
<label for="password">Password</label>
<input class="w-[50%] border border-black rounded-lg p-1 " type="password" name="password" placeholder="Your Password" require>
<button type="submit" class="bg-white rounded-full p-3 ">Register</button>
</form>


</div>




<?php
include_once '../includes/footer.php';
?>