<form name="resetPassword" method="POST" class="needs-validation" novalidate action="resetPassword">
   
    <div class="row">
        <div class="col-sm-4 mx-auto">
            <h3>Change your password:</h3>
        </div>
    </div>
    <div class="row">
        
        <div class="col-sm-4">
            <label for="old_password" class="control-label">Old Password:</label>
        </div>
        <div class="col-4">
            <input type="password" name="old_password" id="old_password" class="form-control" required/>
            <div class="valid-feedback"></div>
            <div id="password_invalid_feedback" class="invalid-feedback">Old Password can not be left blank.</div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <label for="new_password" class="control-label">New Password:</label>
        </div>
        <div class="col-4">
            <input type="password" name="new_password" id="new_password" class="form-control" required/>
            <div class="valid-feedback"></div>
            <div id="password_invalid_feedback" class="invalid-feedback">New Password can not be left blank.</div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <label for="conf_new_password" class="control-label">Confirm New Password:</label>
        </div>
        <div class="col-4">
            <input type="password" name="conf_new_password" id="conf_new_password" class="form-control" required/>
            <div class="valid-feedback"></div>
            <div id="password_invalid_feedback" class="invalid-feedback">Confirmation Password can not be left blank.</div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-4">
            &nbsp;
        </div>
        <div class="col-4" style="text-align: center">
            <button type="submit" class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0">Change</button>
        </div>
    </div>
</form>
