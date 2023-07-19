<main id="main" class="main">
    <div class="pagetitle">
        <h1>Lieu</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Dépense</li>
                <li class="breadcrumb-item active">Historiques</li>
            </ol>
        </nav>
    </div>
    <section class="section">
        <?php $this->load->view('_FlashAlert\flash_alert.php') ?>
        <div class="row">
            <div class="col-lg-10">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Historiques des Dépenses pour : <?= $nom ?></h5>
                        <!-- Active Table -->
                        <table class="table">
                            <thead class="text-center">
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Détails</th>
                                    <th scope="col">Date</th>
                                    <th>Tarifs</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <?php foreach($liste as $l){ ?>
                                <tr>
                                    <th scope="row"><?= $l['id_depense'] ?></th>
                                    <td><?= $l['detail'] ?></td>
                                    <?php $daty = explode(" ", $l['date_depense']);
                                    $date = $daty[0];
                                    ?>
                                    <td><?= date('d-m-Y', strtotime($date)) ?></td>
                                    <td><?= number_format($l['tarif'],2,',',' '); ?> Ar</td>
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