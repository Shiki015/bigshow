

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
                    <th scope="col">FULL NAME</th>
                    <th scope="col">DATE OF BIRTH&nbsp&nbsp&nbsp&nbsp</th>
                    <th scope="col">HEIGHT</th>
                    <th scope="col">RESIDANCE</th>
                    <th scope="col">GENDER</th>
                    <th scope="col">PROFESSION</th>
                    <th scope="col">&nbsp;</th>
                    <th scope="col">&nbsp;</th>
                  </tr>
                </thead>
                <tbody>

                <?php foreach ($data['celebrity'] as $user) : ?>
                  <tr>
                    <th scope="row"><?=$user->id_celebrity?></th>
                    <td class="tm-product-name"><?=$user->birthName?></td>
                    <td><?=$user->dateOfBirth?></td>
                    <td><?=$user->height?></td>
                    <td><?=$user->residence?></td>
                    <td><?=$user->gender?></td>
                    <td><?=$user->name_cp?></td>
                    <td>
                          <a href="index.php?page=deleteCelebrity&id=<?=$user->id_celebrity?>" ><i class="fa fa-trash"></i></a>
                    </td>
                      <td>
                          <a href="index.php?page=editCelebrity&id=<?=$user->id_celebrity?>" ><i class="fa fa-edit"></i></a>

                      </td>
                  </tr>


                <?php endforeach; ?>
                </tbody>
              </table>
            </div>
            <!-- table container -->
              <br>
              <br>
              <h3>New Celebrity Form</h3>
              <br>
              <form action="index.php?page=addCelebrity" method="post" class="tm-edit-product-form" enctype="multipart/form-data">

                  <div class='form-group mb-3'>
                      <label for='fname'>Full Name</label>
                      <input id='fname'name='fname'type='text' placeholder='Full Name'class='form-control validate'/>
                  </div>
                  <div class='form-group mb-3'>
                      <label for='dateOfBirth'>Date Of Birth</label>
                      <input id='dateOfBirth'name='dateOfBirth'type='date' class='form-control validate'/>
                  </div>
                  <div class='form-group mb-3'>
                      <label for='height'>Height</label>
                      <input id='height'name='height'type='number' placeholder='180'class='form-control validate'/>
                  </div>
                  <div class='form-group mb-3'>
                      <label for='residence'>Residence</label>
                      <input id='residence'name='residence'type='text' placeholder='residence'class='form-control validate'/>
                  </div>
                  <div class='form-group mb-3'>
                      <label for='celebrityPicture'>Celebrity Picture</label>
                      <input type="file" name="celebrity_photo">
                  </div>
                  <div class='form-group mb-3'>
                      <label for='gender'>Gender</label>
                      <select name="gender" class="form-control">
                          <option value="0">Choose..</option>

                          <?php foreach($data['gender'] as $g):?>
                              <option value="<?= $g->id_gender ?>"><?= $g->gender ?></option>
                          <?php endforeach;?>
                      </select>

                  </div>
                  <div class='form-group mb-3'>
                      <label for='description' >Profession</label>
                      <select name="profession" class="form-control">
                          <option value="0">Choose..</option>

                          <?php foreach($data['profession'] as $uloga):?>
                              <option value="<?= $uloga->id_cp ?>"><?= $uloga->name_cp ?></option>
                          <?php endforeach;?>
                      </select>
                  </div>
                  <button type="submit" name="btnInsert" class="btn btn-primary btn-block text-uppercase">Add Celebrity Now</button>
          </div>
    </form>

          </div>
</div>
</div>
    </div>
</div>