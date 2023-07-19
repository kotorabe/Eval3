<main id="main" class="main">


    <div class="pagetitle">
        <h1>Lieu</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Depense</li>
                <li class="breadcrumb-item active">Ajout</li>
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
                        <h5 class="card-title">Ajout de dépense</h5>
                        <form action="<?= base_url('Depense/Add');?>" method="post">
                            <div class="row mb-10">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Nom:</label>
                                <div class="col-sm-10">
                                    <input type="text" name="nom" class="form-control" id="inputText">
                                </div>
                            </div> <br>
                            <div class="row mb-10">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Code:</label>
                                <div class="col-sm-10">
                                    <input type="text" name="code" class="form-control" id="inputText">
                                </div>
                            </div> <br>
                            <div class="row mb-10">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Budget:</label>
                                <div class="col-sm-10">
                                    <input type="text" name="budget" class="form-control" id="inputText">
                                </div>
                            </div> <br>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Ajouter</button>
                                <button type="reset" class="btn btn-secondary">Reset</button>
                            </div>
                        </form><!-- End Horizontal Form -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>