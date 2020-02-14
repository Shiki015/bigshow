
<div class="main-wrap">
    <div class="section section-padding video-list-section">
        <div class="container">
                    <h3>User Edit Form</h3>
                <br>

            <form action="index.php?page=updateUser" method="post">
                              <div class='form-group mb-3'>
                              <input type='hidden' name='idUser' value='<?=$data['userInfo']->idUser?>'/>
                                <label for='fname'>First Name</label>
                                <input id='fname'name='fname'type='text' placeholder='First Name' value='<?=$data['userInfo']->firstName?>'class='form-control validate'/>
                              </div>
                              <div class='form-group mb-3'>
                                <label for='lname'>Last Name</label>
                                <input id='lname'name='lname'type='text' placeholder='Last Name'value='<?=$data['userInfo']->lastName?>'class='form-control validate'/>
                              </div>
                              <div class='form-group mb-3'>
                                <label for='email'>Email</label>
                                <input id='email'name='email'type='text' placeholder='Email' value='<?=$data['userInfo']->email?>'class='form-control validate'/>
                              </div>
                              <div class='form-group mb-3'>
                                <label for='username'>Username</label>
                                <input id='username'name='username'type='text' placeholder='username' value='<?=$data['userInfo']->username?>'class='form-control validate'/>
                              </div>
                                <div class='form-group mb-3'>
                                    <label for='password'>Password</label>
                                    <input id='password'name='password'type='text' placeholder='password' value='<?=$data['userInfo']->pass?>'class='form-control validate'/>
                                </div>


                <div class='form-group mb-3'>
                    <label for='description' >Admin/User</label>
                    <select name="uloga" class="form-control">

                        <?php
                        foreach ($data['role'] as $rola):
                        if( $rola->idRole == $data['userInfo']->idRole):?>
                                <option selected value="<?=$data['userInfo']->idRole?>"><?=$data['userInfo']->name?></option>
                        <?php else: ?>
                                <option value="<?=$rola->idRole?>"><?=$rola->name?></option>
                        <?php endif; endforeach;?>
                    </select>
                </div>
                <button type="submit" name="btnUpdate" class="btn btn-primary btn-block text-uppercase">Update User</button>
                </div>
            </form>
    </div>
</div>
</div>