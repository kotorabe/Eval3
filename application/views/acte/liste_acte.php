<main id="main" class="main">
    <div class="pagetitle">
        <h1>Lieu</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Acte</li>
                <li class="breadcrumb-item active">Liste</li>
            </ol>
        </nav>
    </div>
    <section class="section">
    <?php $this->load->view('_FlashAlert\flash_alert.php') ?>
        <div class="row">
            <div class="col-lg-10">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Listes des Actes</h5>
                        <!-- Active Table -->
                        <table class="table">
                            <thead class="text-center">
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">Budget</th>
                                    <th scope="col">#</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <?php foreach($liste as $l){ ?>
                                <tr>
                                    <th scope="row"><?= $l['id_type_acte'] ?></th>
                                    <td><?= $l['nom'] ?></td>
                                    <td><?= number_format($l['budget'],2,',',' '); ?> Ar</td>
                                    <td><a href="<?= base_url('Acte/Red_Updt?id='); ?><?= $l['id_type_acte'] ?>">Modifier</a></td>
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