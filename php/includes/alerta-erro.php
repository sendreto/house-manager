<?php if($erro = DAO::getErro()): ?>
<div class="alert alert-danger alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
 	<strong>Aviso:</strong> <?= $erro ?>
</div>
<?php endif; ?>
