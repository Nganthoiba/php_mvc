<?php
$response = $data['response'];
if($response['status_code'] == 200){
    $users = $response['data'];
    ?>
<table class="table_style yellow_header table-scroll">
    <thead>
        <tr>
            <!--<th>User ID</th>-->
            <th>Name</th>
            <th>Email</th>
            <th>Phone No</th>
            <th>Aadhaar</th>
            <th>User Role</th>
        </tr>
    </thead>
    <tbody id="users_content">
        <?php
            foreach ($users as $user){
        ?>
        <tr>
            <td><?= $user->full_name ?></td>
            <td><?= $user->email ?></td>
            <td><?= $user->phone_no ?></td>
            <td><?= $user->aadhaar ?></td>
            <?php 
                $role = new role();
                $role = $role->find($user->role_id);
            ?>
            <td><?= $role->role_name ?></td>
        </tr>
        <?php
            }
        ?>
    </tbody>
</table>
<script>
    $(document).ready(function () {
        $(".table-scroll thead").mCustomScrollbar({
            theme: "minimal"
        });
        $(".table-scroll tbody").mCustomScrollbar({
            theme: "minimal"
        });
    });
    
</script>
    <?php
}
 else {
     echo $response['msg'];
}
?>