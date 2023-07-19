<main id="main" class="main">
    <div class="pagetitle">
        <h1>Lieu</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Saisie Acte</li>
            </ol>
        </nav>
    </div>
    <section class="section">
        <?php $this->load->view('_FlashAlert\flash_alert.php') ?>
        <div class="row">
            <div class="col-lg-10">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Saisie d'Acte</h5>
                        <!-- Active Table -->
                        <table class="table">
                            <thead class="text-center">
                                <?php foreach($liste as $l_a){ ?>
                                <tr>
                                    <th scope="col"><?= $l_a['nom'] ?> <?= $l_a['prenom'] ?> </th>
                                </tr>
                                <?php } ?>
                            </thead>
                        </table><br>
                        <form action="<?= base_url('Acte/Saisie');?>" method="post">
                            <div class="row mb-10">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Date:</label>
                                <div class="col-sm-8">
                                    <input type="date" name="date" class="form-control" id="inputText">
                                </div>
                            </div> <br>
                            <input type="hidden" name="id" value="<?= $id ?>">
                            <div class="row mb-10">
                                <label class="col-sm-3 col-form-label">Actes:</label>
                                <div class="col-sm-10">
                                    <?php foreach($act as $a): ?>
                                    <label>
                                        <?= form_checkbox('options[]', $a['id_type_acte'], FALSE); ?>
                                        <?= $a['nom'] ?>
                                    </label><br>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Ajouter</button>
                                <button type="reset" class="btn btn-secondary">Reset</button>
                            </div>
                        </form>
                        <!-- End Active Table -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>