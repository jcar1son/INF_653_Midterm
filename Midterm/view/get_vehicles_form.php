<!--The home page for the program-->
<form action="." method="GET">
    <input type="hidden" name="action">
    <div>

        <!--Form for getting the class-->
        <div>
            <label for="class_id"></label>
            <select name = "class_id" id = "class_id">
                <option value="" <?= (!$class_id ? 'selected' : '') ?>>View Classes</option>

                <!--For each loop to go through the classes -->
                <?php foreach ($classes_list as $class) { ?>
                    <option
                    value="<?= $class->getID() ?>"
                    <?= (isset($class_id) && $class_id == $class->getID() ? 'selected' : '') ?>
                    ><?= $class->getName() ?></option>
                <?php } ?>
            </select>
        </div>


        <!--From for getting the make-->
        <div>
            <label for="make_id"></label>
            <select name="make_id" id="make_id">
                <option value="" <?= (!$make_id ? 'selected' : '') ?>>View Makes</option>

                <!--For each loop to go through the makes -->
                <?php foreach ($makes_list as $make) { ?>
                    <option
                    value="<?= $make->getID() ?>"
                    <?= (isset($make_id) && $make_id == $make->getID() ? 'selected' : '') ?>
                    ><?= $make->getName() ?></option>
                <?php } ?>

            </select>
        </div>

        <!--Form for the types-->
        <div>
            <label for="type_id"></label>
            <select name="type_id" id="type_id">
                <option value="" <?= (!$type_id ? 'selected' : '') ?>>View Types</option>

                <!--For each loop to go through the types -->
                <?php foreach ($types_list as $type) { ?>
                    <option
                    value="<?= $type->getID() ?>"
                    <?= (isset($type_id) && $type_id == $type->getID() ? 'selected' : '') ?>
                    ><?= $type->getName() ?></option>
                <?php } ?>
            </select>
        </div>
        <div>

        <!--Tells the user what the vehicles will be sorted by-->
            <div>
                <span>Decending sort by:</span>
            </div>

            <!-- Radio buttons for the price-->
            <div>

                <input type="radio" name="sort_by" id="sort_by_price" value= "price" checked>
                <label for="sort_by_price">By Price</label>

            </div>

            <!-- Radio buttons for the year-->
            <div>

                <input type="radio" name="sort_by" id="sort_by_year" value="year" <?= $sort_by == 'year' ? 'checked' : '' ?>>
                <label for="sort_by_year">By Year</label>

            </div>

            <!--The end submit button-->
            <div>
                <button type="find">Find</button>
            </div>
        </div>
    </div>
</form>