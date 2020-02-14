
<div class="main-wrap">
    <div class="section section-padding video-list-section">
<div class="container">
<div style="margin:0 auto;"class="sirina col-sm-12 col-md-12 col-lg-8 col-xl-8 tm-block-col " >
          <div class="tm-bg-primary-dark tm-block tm-block-products">
            <div class="tm-product-table-container">
              <table class="table table-hover tm-table-small tm-product-table">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">FIRST NAME</th>
                    <th scope="col">LAST NAME</th>
                    <th scope="col">EMAIL</th>
                    <th scope="col">USERNAME</th>
                    <th scope="col">PASSWORD</th>
                    <th scope="col">ADMIN/KORISNIK</th>
                    <th scope="col">&nbsp;</th>
                    <th scope="col">&nbsp;</th>
                  </tr>
                </thead>
                <tbody>

                <?php foreach ($data['users'] as $user) : ?>
                  <tr>
                    <th scope="row"><?=$user->idUser?></th>
                    <td class="tm-product-name"><?=$user->firstName?></td>
                    <td><?=$user->lastName?></td>
                    <td><?=$user->email?></td>
                    <td><?=$user->username?></td>
                    <td><?=$user->pass?></td>
                    <td><?=$user->name?></td>
                    <td>
                          <a href="index.php?page=deleteUser&idUser=<?=$user->idUser?>" ><i class="fa fa-trash"></i></a>
                    </td>
                      <td>
                          <a href="index.php?page=editUser&idUser=<?=$user->idUser?>" ><i class="fa fa-edit"></i></a>

                      </td>
                  </tr>


                <?php endforeach; ?>
                </tbody>
              </table>
            </div>
            <!-- table container -->
              <br>
              <br>
              <h3>New User Form</h3>
              <br>
              <form action="index.php?page=addUser" method="post" class="tm-edit-product-form">

                  <div class='form-group mb-3'>
                      <label for='fname'>First Name</label>
                      <input id='fname'name='fname'type='text' placeholder='First Name'class='form-control validate'/>
                  </div>
                  <div class='form-group mb-3'>
                      <label for='lname'>Last Name</label>
                      <input id='lname'name='lname'type='text' placeholder='Last Name'class='form-control validate'/>
                  </div>
                  <div class='form-group mb-3'>
                      <label for='email'>Email</label>
                      <input id='email'name='email'type='text' placeholder='Email'class='form-control validate'/>
                  </div>
                  <div class='form-group mb-3'>
                      <label for='username'>Username</label>
                      <input id='username'name='username'type='text' placeholder='username'class='form-control validate'/>
                  </div>
                  <div class='form-group mb-3'>
                      <label for='pass'>Password</label>
                      <input id='pass'name='pass'type='text' placeholder='password' class='form-control validate'/>
                  </div>
                  <div class='form-group mb-3'>
                      <label for='description' >Admin/User</label>
                      <select name="uloga" class="form-control">
                          <option value="0">Choose..</option>

                          <?php foreach($data['role'] as $uloga):?>
                              <option value="<?= $uloga->idRole ?>"><?= $uloga->name ?></option>
                          <?php endforeach;?>
                      </select>
                  </div>
                  <button type="submit" name="btnInsert" class="btn btn-primary btn-block text-uppercase">Add user Now</button>
          </div>
    </form>

          </div>
</div>
</div>
    </div>
</div>