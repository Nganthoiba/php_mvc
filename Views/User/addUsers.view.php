<?php 
$roles = $data['roles'];
?>            
            <div class="card signup_card">
                <h5 class="card-header default-color white-text py-3">
                    <strong>Add user below:</strong>
                </h5>
                <div class="card-body">
                    <form name="addUsers" method="POST" class="needs-validation" novalidate action="addUsers">
                        <input type="hidden" name="action" value="sign_up" />
                        <div class="row">
                            <div class="col-sm-4">
                                <label for="full_name" class="control-label">Full Name:</label>
                            </div>
                            <div class="col-sm-6">
                                <input type="text" name="full_name" id="full_name" class="form-control" required/>
                                <div class="valid-feedback"></div>
                                <div class="invalid-feedback">Name can not be left blank.</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <label for="email" class="control-label">Email:</label>
                            </div>
                            <div class="col-sm-6">
                                <input type="text" onblur="checkEmail();" onchange="checkEmail();" onkeyup="checkEmail();" name="email" id="email" class="form-control" required/>
                                <div class="valid-feedback"></div>
                                <div id="email_invalid_feedback" class="invalid-feedback">Email can not be left blank.</div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-sm-4">
                                <label for="phone_no" class="control-label">Mobile Phone No.:</label>
                            </div>
                            <div class="col-sm-6">
                                <input type="text" maxlength="10" onblur="validatePhoneNo();" onchange="validatePhoneNo();" onkeyup="validatePhoneNo();" onkeypress="return isNumber(event);" name="phone_no" id="phone_no" class="form-control" required/>
                                <div class="valid-feedback"></div>
                                <div id="phone_no_invalid_feedback" class="invalid-feedback">Mobile Phone No can not be left blank.</div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-sm-4">
                                <label for="role_id" class="control-label">User Role:</label>
                            </div>
                            <div class="col-sm-6">
                                <select class="custom-select small_font" name="role_id" id="role_id" required>
                                    <option value="">--- Select Role ---</option>
                                    <?php
                                    foreach ($roles as $role){
                                        echo "<option value='".$role->roles_id."'>".$role->role_name."</option>";
                                    }
                                    ?>
                                </select>
                                <div class="valid-feedback"></div>
                                <div class="invalid-feedback">Please select user role.</div>
                            </div>
                        </div>
                        
                        
                        <div class="row">
                            <div class="col-sm-4">
                                <label for="password" class="control-label">Password:</label>
                            </div>
                            <div class="col-sm-6">
                                <input type="password" name="password" id="password" class="form-control" required/>
                                <div class="valid-feedback"></div>
                                <div id="password_invalid_feedback" class="invalid-feedback">Password can not be left blank.</div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-sm-4">
                                &nbsp;
                            </div>
                            <div class="col-sm-6" style="text-align: center">
                                <button type="submit" class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0">Add User</button>
                            </div>
                        </div>
                    </form>
                    <div style="text-align: center"><?= $data['response'] ?></div>
                </div> 
            </div>
            <script>
                function validatePhoneNo(){
                    var phone_no = $("#phone_no").val().trim();
                    if(phone_no === ""){
                        $("#phone_no_invalid_feedback").show();
                        $("#phone_no_invalid_feedback").html("Phone number can not be left blank.");
                        $("#phone_no").addClass("custom_invalid_field");
                    }
                    else if(phone_no.length!==10 || isNaN(phone_no)){
                        $("#phone_no_invalid_feedback").show();
                        $("#phone_no_invalid_feedback").html("Invalid phone number");
                        $("#phone_no").addClass("custom_invalid_field");
                    }
                    else{
                        $("#phone_no_invalid_feedback").hide();
                        $("#phone_no_invalid_feedback").html("Mobile Phone No can not be left blank.");
                        $("#phone_no").removeClass("custom_invalid_field");
                        return true;
                    }
                    return false;
                }  
                function checkEmail(){
                    email = $("#email").val();
                    email = email.trim();
                    if( email === ""){
                        $("#email_invalid_feedback").html("Email can not be left blank.");
                        $("#email").addClass("custom_invalid_field");
                        $("#email_invalid_feedback").show();
                        return false;
                    }
                    if(isValidEmail(email)){
                        $("#email_invalid_feedback").hide();
                        $("#email").removeClass("custom_invalid_field");
                        return true;
                    }
                    else{
                        $("#email").addClass("custom_invalid_field");
                        $("#email_invalid_feedback").html("Your email is not valid");
                        $("#email_invalid_feedback").show();
                    }
                    return false;
                }
            </script>
