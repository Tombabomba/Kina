
<div id="container_style" class="container"> 

    <?php $validation = \Config\Services::validation();?>
    <?php foreach($edit_film_og as $film): ?>
      
      <form action="<?= $id_filmu=$film->id_filmy; base_url("edit_film/".$id_filmu); ?>" method="post">
      <div class="form-group">
          <div class="row">
              <div class="col">
                  <label for="nazev_filmu">Originální název filmu</label>
                  <input type="input" class="form-control" name="nazev_filmu" value="<?php echo $film->nazev;?>" >
                  <?php 
                    if($validation->getError('nazev_filmu')){
                        echo '<div class="alert alert-danger mt-2">'.$validation->getError('nazev_filmu').'</div>';
                    }
                ?>
                    <input style="transform: scale(0);" type="input" class="form-control" name="id_nazev" value="<?php echo $film->id_jazyk;?>">
              </div>
              <div class="col">
                  <label for="jazyk">Jazyk</label>
                  <input type="input" class="form-control" name="jazyk"  value="<?php echo $film->jazyk;?>">
                  <?php 
                    if($validation->getError('jazyk')){
                        echo '<div class="alert alert-danger mt-2">'.$validation->getError('jazyk').'</div>';
                    }
                ?>
              </div>
           </div>
      </div>
      <?php endforeach; ?>
      <?php foreach($edit_film as $film): ?>
      <div class="form-group">
      <div class="row">
              <div class="col">
                  <label for="nazev_alt">alternativní název</label>
                  <input type="input" class="form-control" name="nazev_alt" value="<?php echo $film->nazev;?>">
              </div>
              <div class="col">
                  <label for="jazyk_alt">Jazyk</label>
                  <input type="input" class="form-control" name="jazyk_alt" value="<?php echo $film->jazyk;?>">
              </div>
           </div>
      </div>
      <?php endforeach; ?>  
      <?php foreach($edit_film_og as $film): ?>
      <div class="form-group">
          <label for="delka">Délka</label>
          <input type="input" class="form-control" name="delka" value="<?php echo $film->delka;?>">
          <?php 
            if($validation->getError('delka')){
                echo '<div class="alert alert-danger mt-2">'.$validation->getError('delka').'</div>';
            }
        ?>
      <div class="form-group">   
          <label for="typ">Typ</label>
          <select name="typ"  class="form-control" value="<?php echo $film->id_typ;?>">
              <option value="2" <?php if($film->id_typ==2){echo "selected";}?>>Animovaný</option>
              <option value="1" <?php if($film->id_typ==1){echo "selected";}?>>Hraný</option>
          </select>
      </div>
      <div class="form-group">   
          <label for="druh">Žánr</label>
          <select name="druh"  class="form-control">
              <option value="1" <?php if($film->id_zanr==1){echo "selected";}?>>Komedie</option>
              <option value="2" <?php if($film->id_zanr==2){echo "selected";}?>>Thriller</option>
              <option value="3" <?php if($film->id_zanr==3){echo "selected";}?>>Drama</option>
              <option value="4" <?php if($film->id_zanr==4){echo "selected";}?>>Rodinný film</option>
              <option value="5" <?php if($film->id_zanr==5){echo "selected";}?>>Sci-fi</option>
          </select>
      </div>
      <?php endforeach; ?>
      <button type="submit"  name='submit' value='Submit' class="btn btn-primary">edit</button>
      </form>      
  </div>

