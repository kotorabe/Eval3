<main id="main" class="main">
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Dashboard</li>
            </ol>
        </nav>
    </div>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Filtrage</h5>
            <form class="row g-3" action="<?= base_url('Dashboard/Filtrage') ?>" method="post">
                <div class="col-md-6">
                    <label for="inputEmail5" class="form-label">Mois</label>
                    <select name="mois" class="form-control">
                        <option value="01">Janvier</option>
                        <option value="02">Février</option>
                        <option value="03">Mars</option>
                        <option value="04">Avril</option>
                        <option value="05">Mai</option>
                        <option value="06">Juin</option>
                        <option value="07">Juillet</option>
                        <option value="08">Août</option>
                        <option value="09">Septembre</option>
                        <option value="10">Octobre</option>
                        <option value="11">Novembre</option>
                        <option value="12">Décembre</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="inputPassword5" class="form-label">Année</label>
                    <select name="annee" class="form-control">
                        <?php foreach($date as $d) { ?>
                        <option value="<?= $d['annee'] ?>"><?= $d['annee'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-info">Valider</button>
                </div>
            </form>
        </div>
    </div>
    <?php if(empty($annee)){ ?>
    <section class="section">
        <?php $this->load->view('_FlashAlert\flash_alert.php') ?>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Recette</h5>
                        <!-- Active Table -->
                        <table class="table">
                            <thead class="text-center">
                                <tr>
                                    <th scope="col">Type</th>
                                    <th scope="col">Réel</th>
                                    <th scope="col">Budget</th>
                                    <th scope="col">Réalisation</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <?php foreach($recette as $r){ ?>
                                <tr>
                                    <th scope="row"><?= $r['type_acte'] ?></th>
                                    <td scope="row"><?= number_format($r['tarif'],2,',',' '); ?> Ar </td>
                                    <td scope="row"><?= number_format($bdg_r=($r['budget'] / 12),2,',',' '); ?> Ar</td>
                                    <td scope="row"><strong><?= round(($r['tarif'] * 100)/$bdg_r, 2) ?> %</strong></td>
                                </tr>
                                <?php } ?>
                                <tr>
                                    <th scope="row">TOTAL :</th>
                                    <td scope="row"><strong><?= number_format($sum_r,2,',',' '); ?> Ar </strong>
                                    </td>
                                    <td scope="row"><strong><?= number_format($sum_br / 12,2,',',' '); ?> Ar </strong>
                                    </td>
                                    <?php if($sum_br != 0){ ?>
                                    <td scope="row"><strong><?= round(($sum_r * 100)/($sum_br/12), 2) ?> %</strong></td>
                                    <?php }else{ ?>
                                    <td scope="row">0 %</td>
                                    <?php } ?>
                                </tr>
                            </tbody>
                        </table>
                        <!-- End Active Table -->
                    </div>
                </div>
            </div>
        </div><br>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Dépense</h5>
                        <!-- Active Table -->
                        <table class="table">
                            <thead class="text-center">
                                <tr>
                                    <th scope="col">Type</th>
                                    <th scope="col">Réel</th>
                                    <th scope="col">Budget</th>
                                    <th scope="col">Réalisation</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <?php foreach($depense as $d){ ?>
                                <tr>
                                    <th scope="row"><?= $d['type_depense'] ?></th>
                                    <td scope="row"><?= number_format($d['tarif'],2,',',' '); ?> Ar </td>
                                    <td scope="row"><?= number_format(($bdg_d=$d['budget'] / 12),2,',',' '); ?> Ar</td>
                                    <td scope="row"><strong><?= round(($d['tarif'] * 100)/$bdg_d, 2)  ?> %</strong></td>
                                </tr>
                                <?php } ?>
                                <tr>
                                    <th scope="row">TOTAL :</th>
                                    <td scope="row"><strong><?= number_format($sum_d,2,',',' '); ?> Ar </strong>
                                    </td>
                                    <td scope="row"><strong><?= number_format($sum_bd / 12,2,',',' '); ?> Ar </strong>
                                    </td>
                                    <?php if($sum_bd != 0){ ?>
                                    <td scope="row"><strong><?= round(($sum_d * 100)/($sum_bd/12), 2) ?> %</strong></td>
                                    <?php }else{ ?>
                                    <td scope="row">0 %</td>
                                    <?php } ?>
                                </tr>
                            </tbody>
                        </table>
                        <!-- End Active Table -->
                    </div>
                </div>
            </div>
        </div><br>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Bénéfice</h5>
                        <!-- Active Table -->
                        <table class="table">
                            <thead class="text-center">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Réel</th>
                                    <th scope="col">Budget</th>
                                    <th scope="col">Réalisation</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <tr>
                                    <th scope="row">Recette :</th>
                                    <td scope="row"><?= number_format($sum_r,2,',',' '); ?> Ar
                                    </td>
                                    <td scope="row"><?= number_format($sum_br / 12,2,',',' '); ?> Ar
                                    </td>
                                    <?php if($sum_br != 0){ ?>
                                    <td scope="row"><strong><?= round(($sum_r * 100)/($sum_br/12), 2) ?> %</strong></td>
                                    <?php }else{ ?>
                                    <td scope="row">0 %</td>
                                    <?php } ?>
                                </tr>
                                <tr>
                                    <th scope="row">Dépense :</th>
                                    <td scope="row"><?= number_format($sum_d,2,',',' '); ?> Ar </td>
                                    <td scope="row"><?= number_format($sum_bd / 12,2,',',' '); ?> Ar </td>
                                    <?php if($sum_bd != 0){ ?>
                                    <td scope="row"><strong><?= round(($sum_d * 100)/($sum_bd/12), 2) ?> %</strong></td>
                                    <?php }else{ ?>
                                    <td scope="row">0 %</td>
                                    <?php } ?>
                                </tr>
                                <tr>
                                    <th scope="row"></th>
                                    <td scope="row">
                                        <strong><?= number_format($total_l =$sum_r - $sum_d,2,',',' '); ?> Ar
                                        </strong>
                                    </td>
                                    <td scope="row">
                                        <strong><?= number_format($total_r=($sum_br/12) - ($sum_bd/12),2,',',' '); ?> Ar
                                        </strong>
                                    </td>
                                    <?php if($sum_bd != 0){ ?>
                                    <td scope="row"><strong><?= round(($total_l * 100)/$total_r, 2) ?> %</strong></td>
                                    <?php }else{ ?>
                                    <td scope="row">0 %</td>
                                    <?php } ?>
                                </tr>
                            </tbody>
                        </table>
                        <!-- End Active Table -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php }else{ ?>
    <section class="section">
        <?php $this->load->view('_FlashAlert\flash_alert.php') ?>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Recette</h5>
                        <!-- Active Table -->
                        <table class="table">
                            <thead class="text-center">
                                <tr>
                                    <th scope="col">Type</th>
                                    <th scope="col">Réel</th>
                                    <th scope="col">Budget</th>
                                    <th scope="col">Réalisation</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <?php foreach($recette as $r){ ?>
                                <tr>
                                    <th scope="row"><?= $r['type_acte'] ?></th>
                                    <td scope="row"><?= number_format($r['tarif'],2,',',' '); ?> Ar </td>
                                    <td scope="row"><?= number_format($bdg_r=($r['budget'] / 12),2,',',' '); ?> Ar</td>
                                    <td scope="row"><strong><?= round(($r['tarif'] * 100)/$bdg_r, 2) ?> %</strong></td>
                                </tr>
                                <?php } ?>
                                <tr>
                                    <th scope="row">TOTAL :</th>
                                    <td scope="row"><strong><?= number_format($sum_r,2,',',' '); ?> Ar </strong>
                                    </td>
                                    <td scope="row"><strong><?= number_format($sum_br / 12,2,',',' '); ?> Ar </strong>
                                    </td>
                                    <?php if($sum_br != 0){ ?>
                                    <td scope="row"><strong><?= round(($sum_r * 100)/($sum_br/12), 2) ?> %</strong></td>
                                    <?php }else{ ?>
                                    <td scope="row">0 %</td>
                                    <?php } ?>
                                </tr>
                            </tbody>
                        </table>
                        <!-- End Active Table -->
                    </div>
                </div>
            </div>
        </div><br>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Dépense</h5>
                        <!-- Active Table -->
                        <table class="table">
                            <thead class="text-center">
                                <tr>
                                    <th scope="col">Type</th>
                                    <th scope="col">Réel</th>
                                    <th scope="col">Budget</th>
                                    <th scope="col">Réalisation</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <?php foreach($depense as $d){ ?>
                                <tr>
                                    <th scope="row"><?= $d['type_depense'] ?></th>
                                    <td scope="row"><?= number_format($d['tarif'],2,',',' '); ?> Ar </td>
                                    <td scope="row"><?= number_format(($bdg_d=$d['budget'] / 12),2,',',' '); ?> Ar</td>
                                    <td scope="row"><strong><?= round(($d['tarif'] * 100)/$bdg_d, 2)  ?> %<strong></td>
                                </tr>
                                <?php } ?>
                                <tr>
                                    <th scope="row">TOTAL :</th>
                                    <td scope="row"><strong><?= number_format($sum_d,2,',',' '); ?> Ar </strong>
                                    </td>
                                    <td scope="row"><strong><?= number_format($sum_bd / 12,2,',',' '); ?> Ar </strong>
                                    </td>
                                    <?php if($sum_bd != 0){ ?>
                                    <td scope="row"><strong><?= round(($sum_d * 100)/($sum_bd/12), 2) ?> %</strong></td>
                                    <?php }else{ ?>
                                    <td scope="row">0 %</td>
                                    <?php } ?>
                                </tr>
                            </tbody>
                        </table>
                        <!-- End Active Table -->
                    </div>
                </div>
            </div>
        </div><br>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Bénéfice</h5>
                        <!-- Active Table -->
                        <table class="table">
                            <thead class="text-center">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Réel</th>
                                    <th scope="col">Budget</th>
                                    <th scope="col">Réalisation</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <tr>
                                    <th scope="row">Recette :</th>
                                    <td scope="row"><?= number_format($sum_r,2,',',' '); ?> Ar
                                    </td>
                                    <td scope="row"><?= number_format($sum_br / 12,2,',',' '); ?> Ar
                                    </td>
                                    <?php if($sum_br != 0){ ?>
                                    <td scope="row"><strong><?= round(($sum_r * 100)/($sum_br/12), 2) ?> %</strong></td>
                                    <?php }else{ ?>
                                    <td scope="row">0 %</td>
                                    <?php } ?>
                                </tr>
                                <tr>
                                    <th scope="row">Dépense :</th>
                                    <td scope="row"><?= number_format($sum_d,2,',',' '); ?> Ar </td>
                                    <td scope="row"><?= number_format($sum_bd / 12,2,',',' '); ?> Ar </td>
                                    <?php if($sum_bd != 0){ ?>
                                    <td scope="row"><strong><?= round(($sum_d * 100)/($sum_bd/12), 2) ?> %</strong< /td>
                                            <?php }else{ ?>
                                    <td scope="row">0 %</td>
                                    <?php } ?>
                                </tr>
                                <tr>
                                    <th scope="row"></th>
                                    <td scope="row">
                                        <strong><?= number_format($total_l =$sum_r - $sum_d,2,',',' '); ?> Ar
                                        </strong>
                                    </td>
                                    <td scope="row">
                                        <strong><?= number_format($total_r=($sum_br/12) - ($sum_bd/12),2,',',' '); ?> Ar
                                        </strong>
                                    </td>

                                    <?php if($sum_bd != 0){ ?>
                                    <td scope="row"><strong><?= round(($total_l * 100)/$total_r, 2) ?> %</strong></td>
                                    <?php }else{ ?>
                                    <td scope="row">0 %</td>
                                    <?php } ?>

                                </tr>
                            </tbody>
                        </table>
                        <!-- End Active Table -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php } ?>
</main>