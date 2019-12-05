<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$user =  $data['user'];
?>

<div class="col-6" style="margin: auto">
    <div class="card">
        <h5 class="card-header default-color white-text py-3">
            <strong>You can update your profile below:</strong>
        </h5>
        <div class="card-body">
            <form method="POST">
                <div class="form-group">
                    <label for="full_name">Name:</label>
                    <input type="text" class="form-control" id="full_name" name="full_name" value="<?= $user->full_name ?>">
                </div>
                <div class="form-group">
                    <label for="email">Email address:</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?= $user->email ?>">
                </div>
                <div class="form-group">
                    <label for="phone_no">Mobile Phone No.:</label>
                    <input type="text" class="form-control" id="phone_no" name="phone_no" value="<?= $user->phone_no ?>">
                </div>
                <div class="form-group">
                    <label for="aadhaar">Aadhaar:</label>
                    <input type="text" class="form-control" id="aadhaar" name="aadhaar" value="<?= $user->aadhaar ?>">
                </div>
                <div class="form-group" style="text-align: center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <div id="update_response"><?= $data['update_response'] ?></div>
                </div>
            </form>
        </div>
    </div>
            
</div>
