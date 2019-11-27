<?php 
$applications = $data['applications'];

if(sizeof($applications)){
?>
<table class="table_style">
    <thead>
        <tr>
            <th>Application For</th>
            <th>Application Date</th>
            <th>Case Type</th>
            <th>Case No.</th>
            <th>Case Year</th>
            <th>Order Date</th>
            <th>Certificate Type</th>
        </tr>
    </thead>
    <tbody>
<?php
    $cert = new certificate_types();
    foreach ($applications as $app) {
        $cert = $cert->find($app->certificate_type);
?>
        <tr>
            <td><?= $app->app_for ?></td>
            <?php 
                $create_at_timestamp = strtotime($app->create_at);
                $order_date_timestamp = strtotime($app->order_date);
            ?>
            <td><?= date('d-m-Y',$create_at_timestamp) ?></td>
            <td><?= $app->case_type ?></td>
            <td><?= $app->case_no ?></td>
            <td><?= $app->case_year ?></td>
            <td><?= date('d-m-Y',$order_date_timestamp) ?></td>
            <td><?= $cert->copy_name ?></td>
        </tr>
<?php 
    }
?>
    </tbody>
</table>
<?php
}
else{
    ?>
    <div class="card bg-info text-white">
        <div class="card-body">No Application found. Apply new.</div>
    </div> 
<?php
}
?>



