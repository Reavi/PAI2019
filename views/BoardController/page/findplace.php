<div class="row">
    <div class="col-xl">
        <form>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Wybierz miasto</label>
                <select class="form-control" id="exampleFormControlSelect1">
                    <?php
                    if(isset($places)){
                        foreach($places as $place) {
                            echo "<option>$place</option>";
                        }
                    }
                    ?>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>