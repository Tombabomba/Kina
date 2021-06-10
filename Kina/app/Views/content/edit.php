
<div id="container_style" class="container">
    <table class="table table-striped table-bordered">
        <tr>
            <th>název</th>    
            <th>delka</th>
            <th>zanr</th>
            <th>typ</th>
            <th></th>
         </tr>
        <?php foreach($edit as $film): ?>
        <tr>
            <td><?php echo $film->nazev; ?></td>
            <td><?php echo $film->delka." min"; ?></td>
            <td><?php echo $film->zanr; ?></td>
            <td><?php echo $film->typ; ?></td>
            <td>
                <a id="text_def" href="<?php $id_filmu=$film->id_filmy; echo base_url("edit_film/".$id_filmu); ?>"><button type="button" class="btn btn-secondary">edit</button></a>
                <a id="text_def" href="<?php $id_filmu=$film->id_filmy;  $in=$film->id_jazyk; echo base_url("delete_film/$id_filmu/$in"); ?>"><button type="submit"  name='submit' value='Submit' class="btn btn-danger">Delete</button></a>
            </td>
         </tr>
         <?php endforeach; ?>     
    </table>
</div>
 