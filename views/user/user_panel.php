<?php
include_once '../../routes/authCheck.php';
authCheck();
include_once '../../routes/readCars.php';
include_once '../includes/header.php';
$cars = getAllCars();
?>



<div class="w-full flex flex-col justify-center items-center">
    <h1 class="text-center my-5 text-4xl font-bold">User Panel</h1>

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
                    <td class="flex gap-1">
                        <?php if ($car['status'] == 'available') : ?>
                            <button type="button" class="btn btn-primary" id="<?php echo $car['id'] ?>" data-bs-toggle="modal" data-bs-target="#RentModal<?php echo $car['id'] ?>">Rent</button>
                            <div class="modal fade" id="RentModal<?php echo $car['id'] ?>" tabindex="-1" aria-labelledby="RentModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Create new User</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="../../routes/renting.php" class="d-flex flex-column gap-4" method="post" id="<?php echo $car['id'] ?>">
                                                <input id="model-" class="d-none" type="text" name="model" value="<?php echo $car['model']; ?>">
                                                <input id="mark-" class="d-none" type="text" name="mark" value="<?php echo $car['mark']; ?>">
                                                <input id="registration_number-" type="hidden" name="registration_number" value="<?php echo $car['registration_number']; ?>">
                                                <input type="number" class="d-none" value="<?php echo $car['id'] ?>" name="car_id">
                                                <input type="text" class="d-none" value="<?php echo $car['status'] ?>" name="status">
                                                <label for="Pickup date">Pickup date</label>
                                                <input type="date" name="pickup_date" class="p-2 border-2">
                                                <label for="dropoff date">dropoff date</label>
                                                <input type="date" name="dropoff_date" class="p-2 border-2">
                                                <label for="Pickup location">Pickup location</label>
                                                <input type="text" name="pickup_location" class="p-2 border-2">
                                                <label for="dropoff date">dropoff date</label>
                                                <input type="text" name="dropoff_location" class="p-2 border-2">
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php else : ?>
                            <button class="btn btn-danger" type="button">Rented</button>
                        <?php endif; ?>



                    </td>
                </tr>
            <?php endforeach; ?>

        </tbody>
    </table>
</div>

<?php
include_once '../includes/footer.php';
?>