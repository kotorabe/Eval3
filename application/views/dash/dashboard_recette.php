<main id="main" class="main">
    <div class="pagetitle">
        <h1>Lieu</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Dashboard recette</li>
            </ol>
        </nav>
    </div>
    <section class="section">
    <?php $this->load->view('_FlashAlert\flash_alert.php') ?>
        <div class="row">
            <div class="col-lg-10">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Tableau de bord</h5>
                        <!-- Active Table -->
                        <table class="table">
                            <thead class="text-center">
                                <tr>
                                    <th scope="col">Date</th>
                                    <th scope="col">Montant Recette</th>
                                    <th scope="col">#</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <?php foreach($list_acte as $l_a){ ?>
                                <tr>
                                    <th scope="row"><?= $l_a['mois'] ?></th>
                                    <td><?= number_format($l_a['tarif_acte'],2,',',' '); ?> Ar  </td>
                                    <td></td>
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