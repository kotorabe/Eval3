<main id="main" class="main">
    <div class="pagetitle">
        <h1>Lieu</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Patient</li>
                <li class="breadcrumb-item active">Facturation List</li>
            </ol>
        </nav>
    </div>
    <section class="section">
    <?php $this->load->view('_FlashAlert\flash_alert.php') ?>
        <div class="row">
            <div class="col-lg-10">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Listes des Patients pour Facturation</h5>
                        <!-- Active Table -->
                        <table class="table">
                            <thead class="text-center">
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Prénom</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">#</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <?php foreach($liste as $l){ ?>
                                <tr>
                                    <th scope="row"><?= $l['id_acte'] ?></th>
                                    <td><?= $l['nom'] ?></td>
                                    <td><?= $l['prenom'] ?></td>
                                    <td><?= date("j M Y",strtotime($l['date_acte'])) ?></td>
                                    <td><a href="<?= base_url('Patient/For_Facturation?id_patient='); ?><?= $l['id_patient'] ?>&&id_acte=<?= $l['id_acte'] ?>">Facturer</a></td>  
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