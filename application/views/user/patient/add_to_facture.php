<main id="main" class="main">
    <div class="pagetitle">
        <h1>Lieu</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Ajout au facture</li>
            </ol>
        </nav>
    </div>
    <section class="section">
        <?php $this->load->view('_FlashAlert\flash_alert.php') ?>
        <div class="row">
            <div class="col-lg-10">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Ajout au facture</h5>
                        <!-- Active Table -->
                        <table class="table">
                            <thead class="text-center">
                                <?php foreach($act as $l_a){ ?>
                                <tr>
                                    <th scope="col"><?= $l_a['nom'] ?> <?= $l_a['prenom'] ?> </th>
                                </tr>
                                <?php } ?>
                            </thead>
                        </table>
                        <div class="row mb-10">
                        <form action="<?= base_url('Acte/AddToFact');?>" method="post">
                            <div class="row mb-10">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">Type d'acte:</label>
                                <div class="col-sm-6">
                                    <input type="hidden" name="id_acte" value="<?= $id_acte?>">
                                    <input type="hidden" name="id_type_acte" value="<?= $id_type_acte?>">
                                    <input type="hidden" name="id_patient" value="<?= $id_patient?>">
                                    <input type="text" class="form-control" id="inputText" placeholder="<?= $acte ?>" disabled>
                                </div>
                            </div> <br>
                            <div class="row mb-8">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">Prix:</label>
                                <div class="col-sm-6">
                                    <input type="number" min="1" name="tarif" class="form-control" id="inputText" required>
                                </div>
                            </div> <br>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Ajouter au facture</button>
                            </div>
                        </form>
                        </div>
                        <!-- End Active Table -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>