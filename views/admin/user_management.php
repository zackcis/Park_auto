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
        <th scope="col">Username</th>
        <th scope="col">Email</th>
        <th scope="col">role</th>
        <th scope="col">action</th>
      </tr>
    </thead>
    <tbody>



      <?php foreach ($users as $user) : ?>
        <tr>
          <th scope="row"><?php echo $user['id'] ?></th>
          <td><?php echo $user['username'] ?></td>
          <td><?php echo $user['email'] ?></td>
          <td><?php echo $user['role'] ?></td>
          <td class="d-flex gap-1">
            <button class="btn btn-primary" type="submit" data-bs-toggle="modal" data-bs-target="#UpdateModal<?php echo $user['id'] ?>">Update</button>
            <!-- Update modal -->
            <div class="modal fade" id="UpdateModal<?php echo $user['id'] ?>" tabindex="-1" aria-labelledby="UpdateModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Create new User</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <form action="../../routes/updateUser.php" class="d-flex flex-column gap-4" method="post" id="<?php echo $user['id'] ?>">
                    <input type="number" class="d-none" value="<?php echo $user['id'] ?>" name="id">  
                    <label for="">username</label>
                      <input class="border border-primary rounded" value="<?php echo $user['username'] ?>" type="text" name="username" require>
                      <label for="">email</label>
                      <input class="border border-primary rounded" value="<?php echo $user['email'] ?>" type="text" name="email" require>
                      <!-- <label for="password">password</label>
                      <input class="border border-primary rounded" type="password" name="password" require> -->
                      <!-- <label for="Confirm Password">Confirm Password</label>
                      <input class="border border-primary rounded" type="password" name="confirmPassword" require> -->
                      <select name="role" id="<?php echo $user['id'] ?>">
                        <option <?php if($user['role'] == 'admin') echo 'selected'  ?> value="admin">admin</option>
                        <option <?php if($user['role'] == 'user') echo 'selected'  ?> value="user">user</option>
                      </select>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <form action="../../routes/deleteUser.php" method="post">
              <input type="number" value="<?php echo $user['id'] ?>" name="id" class="d-none">
              <button class="btn btn-danger" type="submit">Delete</button>
            </form>

          </td>
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
          <form action="../../routes/addUser.php" class="d-flex flex-column gap-4" method="post">
            <label for="">username</label>
            <input class="border border-primary rounded" type="text" name="username" require>
            <label for="">email</label>
            <input class="border border-primary rounded" type="email" name="email" require>
            <label for="password">password</label>
            <input class="border border-primary rounded" type="password" name="password" require>
            <label for="Confirm Password">Confirm Password</label>
            <input class="border border-primary rounded" type="password" name="confirmPassword" require>
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