<main id="main" class="main">
    <div class="pagetitle">
        <h1>Lieu</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Dépense</li>
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
                        <h5 class="card-title">Listes des Dépenses</h5>
                        <!-- Active Table -->
                        <table class="table">
                            <thead class="text-center">
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">Budget</th>
                                    <th scope="col">#</th>
                                    <?php if(empty($_SESSION['ADMIN_ID'])){ ?>
                                    <th>#</th>
                                    <?php } ?>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <?php foreach($liste as $l){ ?>
                                <tr>
                                    <th scope="row"><?= $l['id_type_depense'] ?></th>
                                    <td><?= $l['nom'] ?></td>
                                    <td><?= number_format($l['budget'],2,',',' '); ?> Ar</td>
                                    <?php if(!empty($_SESSION['ADMIN_ID'])){ ?>
                                    <td><a
                                            href="<?= base_url('Depense/Red_Updt?id='); ?><?= $l['id_type_depense'] ?>">Modifier</a>
                                    </td>
                                    <?php }else{  ?>
                                    <td><a
                                            href="<?= base_url('Depense/Red_Saisie?id='); ?><?= $l['id_type_depense'] ?>&&nom=<?= $l['nom'] ?>">Saisir</a>
                                    </td>
                                    <td><a
                                            href="<?= base_url('Depense/Historiques?id='); ?><?= $l['id_type_depense'] ?>">Historiques</a>
                                    </td>
                                    <?php } ?>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table><br>
                        <form action="<?= base_url('Depense/import_csv') ?>" method="post" class="form-inline">
                            <div class="row mb-3">
                                <label for="inputNumber" class="col-sm-2 col-form-label">Importer fichier CSV</label>
                                <div class="col-sm-5">
                                    <input class="form-control" type="file" id="formFile">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success">Importer</button>

                        </form>
                        <!-- End Active Table -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>