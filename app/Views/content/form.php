
<div id="container_style" class="container"> 
      
    <?php $validation = \Config\Services::validation();?>
    
    <form action="<?= base_url("form_submit"); ?>" method="post">
    <div class="form-group">
        <div class="row">
            <div class="col">
                <label for="nazev_filmu">Originální název filmu</label>
                <input type="input" class="form-control" name="nazev_filmu">
                <?php 
                    if($validation->getError('nazev_filmu')){
                        echo '<div class="alert alert-danger mt-2">'.$validation->getError('nazev_filmu').'</div>';
                    }
                ?>
            </div>
            <div class="col">
                <label for="jazyk">Jazyk</label>
                <input type="input" class="form-control" name="jazyk">
                <?php 
                    if($validation->getError('jazyk')){
                        echo '<div class="alert alert-danger mt-2">'.$validation->getError('jazyk').'</div>';
                    }
                ?>
            </div>
         </div>
    </div>
    <div class="form-group">
    <div class="row">
            <div class="col">
                <label for="nazev_alt">alternativní název</label>
                <input type="input" class="form-control" name="nazev_alt">
                <?php 
            if($validation->getError('nazev_alt')){
                echo '<div class="alert alert-danger mt-2">'.$validation->getError('nazev_alt').'</div>';
            }
        ?>
            </div>
            <div class="col">
                <label for="jazyk_alt">Jazyk</label>
                <input type="input" class="form-control" name="jazyk_alt">
                <?php 
            if($validation->getError('jazyk_alt')){
                echo '<div class="alert alert-danger mt-2">'.$validation->getError('jazyk_alt').'</div>';
            }
        ?>
            </div>
         </div>
    </div>
    <div class="form-group">
        <label for="delka">Délka</label>
        <input type="input" class="form-control" name="delka">
        <?php 
            if($validation->getError('delka')){
                echo '<div class="alert alert-danger mt-2">'.$validation->getError('delka').'</div>';
            }
        ?>
    </div>
    <div class="form-group">   
        <label for="typ">Typ</label>
        <select name="typ"  class="form-control">
            <option value="2">Animovaný</option>
            <option value="1">Hraný</option>
        </select>
    </div>
    <div class="form-group">   
        <label for="druh">Žánr</label>
        <select name="druh"  class="form-control">
            <option value="1">Komedie</option>
            <option value="2">Thriller</option>
            <option value="3">Drama</option>
            <option value="4">Rodinný film</option>
            <option value="5">Sci-fi</option>
        </select>
    </div>
    <button type="submit"  name='submit' value='Submit' class="btn btn-primary">Submit</button>
    </form>
    
</div>