<div class="row">
    <div class="col-4">
        <label class="control-label">Select Process:</label>
    </div>
    <?php
    $processes = $data['processes'];
    ?>
    <div class="col-4">
        <select name="process" class="form-control small_font">
            <option value="">-- Select --</option>
            <?php 
                foreach ($processes as $process){
            ?>
            <option value="<?= $process->process_id ?>"><?= $process->process_name ?></option>
            <?php
                }
            ?>
        </select>
    </div>
</div>
