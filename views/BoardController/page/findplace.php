<div class="row">
    <div class="col-12">
        <div id="chooseCity">
            <form id="findplaceFormChooseCity">
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Wybierz miasto</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="city">
                        <option value="0" selected disabled hidden>Wybierz Miasto</option>
                        <?php
                        if(isset($places)){
                            foreach($places as $place) {
                                echo "<option value='".$place['IdAdres']."'>".$place['Miasto']."</option>";
                            }
                        }
                        ?>
                    </select>
                </div>

                <button type="button" onclick="chooseCity()" class="btn btn-primary buttonDefault buttonDark">Wybieram!</button>
            </form>
        </div>
        <div id="placeInCity">

        </div>
    </div>
</div>