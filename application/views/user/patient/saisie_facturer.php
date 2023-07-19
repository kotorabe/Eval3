<main id="main" class="main">
    <div class="pagetitle">
        <h1>Lieu</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Saisie facturer</li>
            </ol>
        </nav>
    </div>
    <section class="section">
        <?php $this->load->view('_FlashAlert\flash_alert.php') ?>
        <div class="row">
            <div class="col-lg-10">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Facture Du: <?= date("j M Y",strtotime($daty)) ?></h5>
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
                        <input type="hidden" name="id" value="<?= $id ?>">
                        <div class="row mb-10">
                            <table class="table">
                                <thead class="text-center">
                                    <tr>
                                        <th scope="col">Acte</th>
                                        <th scope="col">Tarif</th>
                                        <th scope="col">#</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    <?php foreach($liste as $l){ ?>
                                    <tr>
                                        <td><?= $l['nom'] ?></td>
                                        <td><?=  number_format($l['tarif'],2,',',' '); ?> Ar </td>
                                        <td>#</td>
                                    </tr>
                                    <?php } ?>
                                    <tr>
                                        <td><strong>TOTAL:</strong></td>
                                        <td><strong><?=  number_format($prix,2,',',' '); ?> Ar</strong></td>
                                        <td>#</td>
                                    </tr>
                                </tbody>
                            </table><br>
                        </div>
                        <div class="text-center">
                        <a class="btn btn-danger" href="<?= base_url('PdfCont/getPdf?id_patient='); ?><?= $id_patient ?>&&id_acte=<?= $id ?>&&daty=<?= $daty ?>">Exporter PDF</a>
                        </div>
                        <!-- End Active Table -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>