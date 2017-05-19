<!--template form_login.php-->
<div class="panel-body">
    <?php echo form_open('auth/login', array('role'=>'form'));?>
                <fieldset>
                        <div class="form-group">
                                <input class="form-control" placeholder="User Name" name="username" type="text" required="" autofocus="">
                        </div>
                        <div class="form-group">
                                <input class="form-control" placeholder="Password" name="password" type="password" required="" value="">
                        </div>
                        <div class="checkbox">
                                <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                </label>
                        </div>
                    <button class="btn btn-primary" type="submit" name="submit">Login</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                </fieldset>
    <?php echo form_close();?>
</div>