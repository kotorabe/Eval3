<main id="main" class="main">


    <div class="pagetitle">
        <h1>Lieu</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Patient</li>
                <li class="breadcrumb-item active">Modif</li>
            </ol>
        </nav>
    </div>
    <?php $this->load->view('_FlashAlert\flash_alert.php') ?>
    <section class="section">
        <div class="progress">
            <div class="progress-bar bg-success" role="progressbar" style="width: 95%" aria-valuenow="25"
                aria-valuemin="0" aria-valuemax="100"></div>
        </div><br>
        <div class="row">
            <div class="col-2"></div>
            <div class="col-7">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Modif d'un Patient</h5>
                        <form action="<?= base_url('Patient/Update');?>" method="post">
                            <div class="row mb-10">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Nom:</label>
                                <div class="col-sm-10">
                                    <input type="text" name="nom" class="form-control" id="inputText" placeholder="<?= $nom; ?>">
                                </div>
                            </div> <br>
                            <div class="row mb-10">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Prénom:</label>
                                <div class="col-sm-10">
                                    <input type="text" name="prenom" class="form-control" id="inputText" placeholder="<?= $prenom; ?>">
                                </div>
                            </div> <br>
                            <input type="hidden" name="id" value="<?= $id; ?>">
                            <div class="row mb-10">
                                <label class="col-sm-2 col-form-label">Sexe:</label>
                                <div class="col-sm-10">
                                    <select name="id_sexe" class="form-control">
                                        <?php foreach($sexe as $t){ ?>
                                        <option value="<?= $t['id_sexe'] ?>"><?= $t['genre'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div> <br>
                            <div class="row mb-10">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Date de naissance:</label>
                                <div class="col-sm-10">
                                    <input type="date" name="date_naissance" class="form-control" id="inputText">
                                </div>
                            </div> <br>
                            <div class="row mb-10">
                                <label class="col-sm-2 col-form-label">Remboursement:</label>
                                <div class="col-sm-10">
                                    <select name="remboursement" class="form-control">
                                        <option value="1">OUI</option>
                                        <option value="0">NON</option>
                                    </select>
                                </div>
                            </div> <br>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Modifier</button>
                                <button type="reset" class="btn btn-secondary">Reset</button>
                            </div>
                        </form><!-- End Horizontal Form -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>