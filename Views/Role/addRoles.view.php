<div class="container">
    
    <div class="row">
        <div class="col-sm-4">
            <fieldset>
                <legend>Add new user role:</legend>
                <form name="add_role" method="POST">
                    <div>
                        <label>Enter Role Name</label>
                        <input type="text" class="form-control" name="role_name" required />
                    </div>
                    <div style="text-align: center">
                        <button class="btn btn-info" type="submit">Submit</button>
                    </div>
                    <div style="text-align: center">
                        <?= $data['addRoleResponse'] ?>
                    </div>
                </form>
            </fieldset>
        </div>
        <div class="col-sm-8">
            <label>List of roles:</label>
            <table border="0" class="table_style yellow_header">
                <tr>
                    <th>Sl. No.</th>
                    <th colspan="2">Role Name</th>
                </tr>
            
            <?php
            $roles = $data['roles'];
            $i=1;
            foreach ($roles as $role){
            ?>
                <tr>
                    <td><?= $i++ ?></td>
                    <td><?= $role->role_name ?></td>
                    <!--<td><a href="edit/<?= $role->roles_id ?>">Edit</a></td>-->
                    <td><a href="remove/<?= $role->roles_id ?>">Remove</a></td>
                </tr>
            <?php
            }
            ?>
            </table>
        </div>
    </div>
</div>

