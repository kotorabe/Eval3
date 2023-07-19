<main id="main" class="main">


    <div class="pagetitle">
        <h1>Lieu</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Dépense</li>
                <li class="breadcrumb-item active">Saisie</li>
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
                        <h5 class="card-title">Saisie de dépense</h5>
                        <form action="<?= base_url('Depense/Saisie');?>" method="post">
                            <div class="row mb-10">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Type:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputText" placeholder="<?= $nom; ?>"
                                        disabled>
                                    <input type="hidden" name="nom" value="<?= $nom ?>">
                                    <input type="hidden" name="id" value="<?= $id_type_depense ?>">
                                </div>
                            </div> <br>
                            <div class="row mb-10">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Jour:</label>
                                <div class="col-sm-10">
                                    <input type="number" name="jour" min="1" max="28" class="form-control"
                                        id="inputText">
                                </div>
                            </div> <br>
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Mois:</h5>
                                    <div class="col-md-6">
                                        <label for="janvier" class="form-label">Janvier</label>
                                        <input type="checkbox" name="month[]" value="01" id="janvier">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="fevrier" class="form-label">Février</label>
                                        <input type="checkbox" name="month[]" value="02" id="fevrier">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="mars" class="form-label">Mars</label>
                                        <input type="checkbox" name="month[]" value="03" id="mars">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="avril" class="form-label">Avril</label>
                                        <input type="checkbox" name="month[]" value="04" id="avril">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="mai" class="form-label">Mai</label>
                                        <input type="checkbox" name="month[]" value="05" id="mai">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="juin" class="form-label">Juin</label>
                                        <input type="checkbox" name="month[]" value="06" id="juin">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="juillet" class="form-label">Juillet</label>
                                        <input type="checkbox" name="month[]" value="07" id="juillet">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="aout" class="form-label">Août</label>
                                        <input type="checkbox" name="month[]" value="08" id="aout">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="septembre" class="form-label">Septembre</label>
                                        <input type="checkbox" name="month[]" value="09" id="septembre">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="octobre" class="form-label">Octobre</label>
                                        <input type="checkbox" name="month[]" value="10" id="octobre">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="novembre" class="form-label">Novembre</label>
                                        <input type="checkbox" name="month[]" value="11" id="novembre">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="decembre" class="form-label">Décembre</label>
                                        <input type="checkbox" name="month[]" value="12" id="decembre">
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-10">
                                <label for="inputText" class="col-sm-2 col-form-label">Annee:</label>
                                <div class="col-sm-10">
                                    <input type="number" name="annee" min="1999" class="form-control" id="inputText">
                                </div>
                            </div> <br>
                            <div class="row mb-10">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Détail:</label>
                                <div class="col-sm-10">
                                    <textarea name="detail" cols="30" rows="10" class="form-control"></textarea>
                                </div>
                            </div> <br>
                            <div class="row mb-10">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Tarif:</label>
                                <div class="col-sm-10">
                                    <input type="number" name="tarif" class="form-control" id="inputText">
                                </div>
                            </div> <br>
                            <div class="text-center">
                                <button type="submit" class="btn btn-success">Saisir</button>
                                <button type="reset" class="btn btn-secondary">Reset</button>
                            </div>
                        </form><!-- End Horizontal Form -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>