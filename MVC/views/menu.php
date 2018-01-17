<ul>
<?php if ($ctrl != "radars/list"): ?>
<li><a href="<?= $base ?>">Radarai</a></li>
<!-- <li><a href="<?= $base ?>">Naujas vairuotojo irasas</a></li> -->
<?php endif; ?>
<?php if ($ctrl != "drivers/list"): ?>
<li><a href="<?= $base.'drivers/list' ?>">Vairuotojai</a></li>
<!-- <li><a href="<?= $base ?>">Naujas radaro irasas</a></li> -->
<?php endif; ?>
</ul>
