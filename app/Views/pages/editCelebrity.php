
<div class="main-wrap">
    <div class="section section-padding video-list-section">
        <div class="container">
            <h3>Celebrity Edit Form</h3>
            <br>

            <form action="index.php?page=updateCelebrity" method="post">

                <div class='form-group mb-3'>
                    <input type='hidden' name='idCelebrity' value='<?=$data['celebrityInfo']->id_celebrity?>'/>

                    <label for='fname'>Full Name</label>
                    <input id='fname'name='fname'type='text' placeholder='Full Name'  class='form-control validate'value='<?=$data['celebrityInfo']->birthName?>'/>
                </div>
                <div class='form-group mb-3'>
                    <label for='dateOfBirth'>Date Of Birth</label>
                    <input id='dateOfBirth'name='dateOfBirth'type='date' class='form-control validate'value='<?=$data['celebrityInfo']->dateOfBirth?>'/>
                </div>
                <div class='form-group mb-3'>
                    <label for='height'>Height</label>
                    <input id='height'name='height'type='number' placeholder='180'class='form-control validate'value='<?=$data['celebrityInfo']->height?>'/>
                </div>
                <div class='form-group mb-3'>
                    <label for='residence'>Residence</label>
                    <input id='residence'name='residence'type='text' placeholder='residence'class='form-control validate'value='<?=$data['celebrityInfo']->residence?>'/>
                </div>

                <div class='form-group mb-3'>
                    <label for='gender'>Gender</label>
                    <select name="gender" class="form-control">
                        <option value="0">Choose..</option>

                        <?php foreach($data['gender'] as $g):
                            if( $g->id_gender == $data['celebrityInfo']->id_gender):?>
                            <option selected value="<?=$data['celebrityInfo']->id_gender?>"><?=$data['celebrityInfo']->gender?></option>
                            <?php else: ?>
                            <option value="<?= $g->id_gender ?>"><?= $g->gender ?></option>
                        <?php endif; endforeach;?>
                    </select>

                </div>
                <div class='form-group mb-3'>
                    <label for='description' >Profession</label>
                    <select name="profession" class="form-control">
                        <?php foreach($data['profession'] as $uloga):
                            if( $uloga->id_cp == $data['celebrityInfo']->id_cp):?>
                            <option selected value="<?=$data['celebrityInfo']->id_cp?>"><?=$data['celebrityInfo']->name_cp?></option>
                        <?php else: ?>
                        <option value="<?= $uloga->id_cp ?>"><?= $uloga->name_cp ?></option>
                        <?php endif; endforeach;?>
                    </select>
                </div>
                <button type="submit" name="btnUpdate" class="btn btn-primary btn-block text-uppercase">Edit Celebrity</button>
        </div>
        </form>
    </div>
</div>
</div>
