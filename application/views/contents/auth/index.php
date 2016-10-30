<div class="col-lg-3 col-lg-offset-5">
    <form class="form-horizontal" method="post" action="<?php url("signin/proceed"); ?>">
        <div class="form-group">
            <label class="control-label col-lg-3">Username</label>
            <div class="col-lg-9">
                <input type="text" id="signinUname" name="signinUname" value="admin"/>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-lg-3">Password</label>
            <div class="col-lg-9">
                <input type="password" id="signinPaswd" name="signinPaswd" value="admin"/>
            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-12">
                <button class="btn btn-default"><i class="fa fa-signin"></i> Sign In</button>
            </div>
        </div>
    </form>
</div>
