<main id="main" class="main">
    <div class="pagetitle">
        <h1>Lieu</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Patient</li>
                <li class="breadcrumb-item active">Facturer List</li>
            </ol>
        </nav>
    </div>
    <section class="section">
    <?php $this->load->view('_FlashAlert\flash_alert.php') ?>
        <div class="row">
            <div class="col-lg-10">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Listes des Actes facturer</h5>
                        <!-- Active Table -->
                        <table class="table">
                            <thead class="text-center">
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">ID_Patient</th>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Prénom</th>
                                    <th scope="col">#</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <?php foreach($liste as $l){ ?>
                                <tr>
                                    <th scope="row"><?= $l['id_acte'] ?></th>
                                    <th scope="row"><?= $l['id_patient'] ?></th>
                                    <td scope="row"><?= $l['nom'] ?></td>
                                    <td scope="row"><?= $l['prenom'] ?></td>
                                    <td><a href="<?= base_url('Patient/For_Facturer?id_patient='); ?><?= $l['id_patient'] ?>&&id_acte=<?= $l['id_acte'] ?>">Voir facture</a></td>  
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <!-- End Active Table -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>