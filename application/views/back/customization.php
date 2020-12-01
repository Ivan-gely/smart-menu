<div class="container"><br>

        <h3 class="text-center text-success">Personnalisation</h3>
        <hr><br>
        <h4>Aperçu de votre carte</h4><br>
        <ul class="list-unstyled list-group list-group-horizontal">
            <li><a class="btn btn-primary m-1" href="<?=base_url()?>manager/preview/">Aperçu sur votre
                    écran</a></li>
            <li><a class="btn btn-primary m-1" href="<?=base_url()?>manager/preview/mobile">Aperçu
                    smartphone</a></li>
            <li><a class="btn btn-primary m-1" href="<?=base_url()?>manager/preview/tablette">Aperçu
                    tablette</a></li>
        </ul>
        
        <hr><br>
        <h4>Logo de votre établissement</h4><br>

        <div><img class="img-fluid" src="<?=base_url() . 'uploads/logo/' . $image->name . $image->type?>?t=<?=time()?>"
                alt="logo">
        </div><br>

        <?php echo form_open_multipart('manager/upload_logo'); ?>
        <input type="file" for="logo" name="userfile">
        <input type="submit" id="logo" class="btn btn-success" name="valider" value="Télécharger"><br>
        <?php echo $error; ?>
        </form>



        <hr><br>
        <h4>Présentation de votre établissement</h4><br>
        <?php echo form_open_multipart('manager/presentation'); ?>
        <textarea id="mytextarea" for="presentation"
            name="presentation"><?=$customization->presentation?></textarea><br>
        <div class="d-flex justify-content-center">
            <input type="submit" id="presentation" class="btn btn-success" name="valider" value="Enregistrer">
        </div><br>
        </form>



        <hr><br>
        <h4>Image de fond de votre carte</h4>
        <div class="form-group">
            <?php echo form_open_multipart('manager/background'); ?>
            <div class="custom-control custom-switch">
                <input onchange="myFunction()" type="checkbox" class="custom-control-input" id="no_image"
                    name="no_image">
                <label class="custom-control-label" for="no_image">Ne pas utiliser d'image de fond (blanc par
                    défaut).</label>
            </div><br>

            <div id="background">
                <?foreach (glob("uploads/background/*.png") as $filename) {
                if ($customization->background == basename($filename)) {?>
                <img class="background_image selected img-fluid" src="<?=base_url() . $filename?>" alt="<?=basename($filename)?>">
                <?} else {?>
                <img class="background_image" src="<?=base_url() . $filename?>" alt="<?=basename($filename)?>">
                <?}?>
                <?}?>
            </div>

            <input type="hidden" id="background_image" name="imagebackground" value="">
            <br>
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-success">Enregistrer l'image de
                    fond</button>
            </div>
            </form>
        </div>
</div>


<script>
function myFunction() {
    let x = document.getElementById("background");
    if (x.style.display === "none") {
        x.style.display = "inline";
    } else {
        x.style.display = "none";
    }
}

let header = document.getElementById("background");
let btns = header.getElementsByClassName("background_image");
let input_image = document.getElementById("background_image");

for (let i = 0; i < btns.length; i++) {
    btns[i].addEventListener("click", function() {
        let current = document.getElementsByClassName("selected");
        if (current.length > 0) {
            current[0].className = current[0].className.replace(" selected", "");
        }
        this.className += " selected";

        let img_path = this.alt; //getAttribute()
        input_image.value = img_path;
    });
};
</script>