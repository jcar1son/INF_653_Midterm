<?php include('view/header.php'); ?>
<section class="vehicles_list">
    <?php include('view/get_vehicles_form.php'); ?>

    <div>
        <!--If the list is empty then the it will tell the users-->
        <?php if (!empty($vehicles_list)) { ?>

            <!--Creates a table for the headings of the items -->
            <table>

                <tr>
                    <th>The Year</th>
                    <th>The Make</th>
                    <th>The Model</th>
                    <th>The Type</th>
                    <th>The Class</th>
                    <th>The Price</th>
                </tr>

                <!--for each loop to pull out the information-->
                <?php foreach($vehicles_list as $vehicle)  {

                    $year = $vehicle->getYear();
                    $model = $vehicle->getModel();
                    $formattedPrice = $vehicle->getFormattedPrice();
                    $make_name = $vehicle->getMake()->getName() ?? 'n/a';
                    $type_name = $vehicle->getType()->getName() ?? 'n/a';
                    $class_name = $vehicle->getClass()->getName() ?? 'n/a';
                ?>

                <!--outputs the items -->
                    <tr>
                        <td><?= $year ?></td>
                        <td><?= $make_name ?></td>
                        <td><?= $model ?></td>
                        <td><?= $type_name ?></td>
                        <td><?= $class_name ?></td>
                        <td><?= $formattedPrice ?></td>
                    </tr>

                <?php } ?>

            </table>

        <!-- in the case there are no vehicles in the database -->
        <?php } else { ?>
            <p>No vehicles are in the database.</p>
        <?php } ?>
    </div>

</section>

<?php include('view/footer.php'); ?>
