<main id="main" class="main">
    <div class="pagetitle">
        <h1>Lieu</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Patient</li>
                <li class="breadcrumb-item active">Ajout</li>
            </ol>
        </nav>
    </div>
    <section class="section">
    <?php $this->load->view('_FlashAlert\flash_alert.php') ?>
        <div class="row">
            <div class="col-lg-10">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Listes des Patients</h5>
                        <!-- Active Table -->
                        <table class="table">
                            <thead class="text-center">
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Prénom</th>
                                    <th scope="col">Sexe</th>
                                    <th scope="col">Date de naissance</th>
                                    <th scope="col">#</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <?php foreach($liste as $l){ ?>
                                <tr>
                                    <th scope="row"><?= $l['id_patient'] ?></th>
                                    <td><?= $l['nom'] ?></td>
                                    <td><?= $l['prenom'] ?></td>
                                    <?php if($l['id_sexe'] == 1){ ?>
                                        <td>M</td>
                                    <?php }else if($l['id_sexe'] == 2){ ?>
                                        <td>F</td>
                                    <?php } ?>
                                    <td><?= date("j M Y",strtotime($l['date_naissance'])) ?></td>
                                    <?php if(!empty($_SESSION['ADMIN_ID'])){ ?>
                                    <td><a href="<?= base_url('Patient/Red_Updt?id='); ?><?= $l['id_patient'] ?>">Modifier</a></td>
                                    <?php }else{  ?>
                                    <td><a href="<?= base_url('Patient/Red_Saisie?id='); ?><?= $l['id_patient'] ?>">Saisir</a></td>
                                    <?php } ?>    
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