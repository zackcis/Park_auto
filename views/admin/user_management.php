<?php
require_once '../../routes/authCheck.php';
authCheck();

require_once   '../../routes/readUsers.php';
$users = getAllUsers();

include_once '../includes/header.php';
?>


<div class="w-full flex flex-col justify-center items-center">
    <h1 class="text-center my-5 text-4xl font-bold">Admin Panel</h1>
    <!-- Button trigger modal -->
    <div class="w-[80%]">
        <button type="button" class="btn btn-primary justify-start self-start" data-bs-toggle="modal" data-bs-target="#exampleModal">
          Create User
        </button>
    </div>
    <table class="table w-[80%]">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
      <th scope="col">action</th>
    </tr>
  </thead>
  <tbody>



    <?php foreach($users as $user): ?>
    <tr>
      <th scope="row"><?php echo $user['id'] ?></th>
      <td><?php echo $user['username'] ?></td>
      <td><?php echo $user['email'] ?></td>
      <td><?php echo $user['role'] ?></td>
      <td></td>
    </tr>
    <?php endforeach; ?>

    

  </tbody>
</table>





<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Create new User</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="../../routes/addCar.php" class="d-flex flex-column gap-4" method="post">
            <label for="">username</label>
            <input class="border border-primary rounded" type="text" name="username" require>
            <label for="">email</label>
            <input class="border border-primary rounded" type="text" name="email" require>
            <label for="password">password</label>
            <input class="border border-primary rounded" type="password" name="password" require>
            <label for="Confirm Password">Confirm Password</label>
            <input class="border border-primary rounded" type="password" name="Confirm Password" require>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
</div>

<?php 
include_once '../includes/footer.php'
?>