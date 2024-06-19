<?php

require_once '../../routes/authCheck.php';
authCheck();

require_once '../../routes/readRents.php' ;
require_once '../includes/header.php';
$rental = new Rental();
$rentals = $rental::findAll();
?>
<div class="w-full flex flex-col justify-center items-center ">

    <h1 class="text-center my-5 text-4xl font-bold">ALL Rents</h1>
    <table class="table w-[80%]">
      <thead>
        <tr>
          <th scope="col">id</th>
          <th scope="col">car id</th>
          <th scope="col">user id</th>
          <th scope="col">rent date</th>
          <th scope="col">return date</th>
          <th scope="col">actions</th>
          
        </tr>
      </thead>
      <tbody>
        <?php foreach($rentals as $rental) : ?>
        <tr>
          <th scope="row"><?php echo $rental['id'] ?></th>
          <td><?php echo $rental['car_id'] ?></td>
          <td><?php echo $rental['user_id'] ?></td>
          <td><?php echo $rental['rent_date'] ?></td>
          <td><?php echo $rental['return_date'] ?></td>
          <td class="flex gap-1">
            <button class="btn bnt-primary">Update</button>
            
            <form action="../../routes/deleteRental" method="post">
                <input type="number" class="d-none" value="<? echo $rental['id']?>" name="id" >
                <button class="btn bnt-danger" type="submit">Delete</button>
            </form>
          </td>
        </tr>
        <?php endforeach; ?>
    
      </tbody>
    </table>
</div>


