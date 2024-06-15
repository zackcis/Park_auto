<?php
require_once '../../routes/authCheck.php';
authCheck();
if ($_SESSION['role'] !== 'admin') {
  header('Location: ../../views/auth/login.php');
  exit();
}
require_once dirname(__DIR__, 2) . '/routes/readCars.php';
$cars = getAllCars();

include_once '../includes/header.php';

?>
<div class="w-full flex flex-col justify-center items-center">
  <h1 class="text-center my-5 text-4xl font-bold">Admin Panel</h1>
  <!-- Button trigger modal -->
  <div class="w-[80%]">
    <button type="button" class="btn btn-primary justify-start self-start" data-bs-toggle="modal" data-bs-target="#createModal">
      Create car
    </button>
  </div>
  <table class="table w-[80%]">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">model</th>
        <th scope="col">mark</th>
        <th scope="col">registration_number</th>
        <th scope="col">status</th>
        <th scope="col">actions</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($cars as $car) : ?>
        <tr>
          <th scope="row"><?php echo $car['id'] ?></th>
          <td><?php echo $car['mark'] ?></td>
          <td><?php echo $car['model'] ?></td>
          <td><?php echo $car['registration_number'] ?></td>
          <td><?php echo $car['status'] ?></td>
          <td class="">
            
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#UpdateModal">Update</button>
            <!-- update modal -->
            <div class="modal fade" id="UpdateModal" tabindex="-1" aria-labelledby="UpdateModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Update car</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                  <form action="../../routes/updateCar.php" class="d-flex flex-column gap-4" method="post">
                    <input type="hidden" name="id" value="<?php echo $car['id']; ?>">
                    <label for="model-<?php echo $car['id']; ?>">Model</label>
                    <input id="model-<?php echo $car['id']; ?>" class="border border-primary rounded" type="text" name="model" value="<?php echo $car['model']; ?>" required>
                    <label for="mark-<?php echo $car['id']; ?>">Mark</label>
                    <input id="mark-<?php echo $car['id']; ?>" class="border border-primary rounded" type="text" name="mark" value="<?php echo $car['mark']; ?>" required>
                    <label for="registration_number-<?php echo $car['id']; ?>">Registration Number</label>
                    <input id="registration_number-<?php echo $car['id']; ?>" class="border border-primary rounded" type="text" name="registration_number" value="<?php echo $car['registration_number']; ?>" required>
                    <label for="status-<?php echo $car['id']; ?>">status</label>
                    <select name="status" id="">
                      <option value="">available</option>
                      <option value="">rented</option>
                    </select>
                    <input id="status-<?php echo $car['id']; ?>" class="border border-primary rounded" type="text" name="status" value="<?php echo $car['status']; ?>" required>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
                  </div>
                </div>
              </div>
            </div>
            
            
              <button type="button " class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#DeleteModal">Delete</button>
            
          </td>
        </tr>
      <?php endforeach; ?>

    </tbody>
  </table>




  <!--Delete modal -->
  <!-- <div class="modal fade" id="DeleteModal" tabindex="-1" aria-labelledby="DeleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Delete car</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="../../routes/deleteCar.php" class="d-flex flex-column gap-4" method="post">
            <label for="">Model</label>
            <input class="border border-primary rounded" type="text" name="model" require>
            <label for="">mark</label>
            <input class="border border-primary rounded" type="text" name="mark" require>
            <label for="registration_number">registration_number</label>
            <input class="border border-primary rounded" type="text" name="registration_number" require>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div> -->
  <!-- Modal -->
  <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Create new car</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="../../routes/addCar.php" class="d-flex flex-column gap-4" method="post">
            <label for="">Model</label>
            <input class="border border-primary rounded" type="text" name="model" require>
            <label for="">mark</label>
            <input class="border border-primary rounded" type="text" name="mark" require>
            <label for="registration_number">registration_number</label>
            <input class="border border-primary rounded" type="text" name="registration_number" require>
            <label for="status">status</label>
            <input class="border border-primary rounded" type="text" name="status" require>
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
include_once '../includes/footer.php';
?>