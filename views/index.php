<h1>PHP Test Application</h1>

<? if(isset($flashMessages)) { ?>
    <? foreach ($flashMessages as $message) { ?>
        <div class="alert alert-<?= $message['type'] ?>" role="alert">
            <?= $message['text'] ?>
        </div>
    <?php } ?>
<?php } ?>

<table class="table table-striped">
	<thead>
		<tr>
			<th>Name</th>
			<th>E-mail</th>
			<th>City</th>
		</tr>
	</thead>
	<tbody>
		<?foreach($users as $user){?>
		<tr>
			<td><?=$user->getName()?></td>
			<td><?=$user->getEmail()?></td>
			<td><?=$user->getCity()?></td>
		</tr>
		<?}?>
	</tbody>
</table>				

<form method="post" action="create.php">
    <div class="form-group required row">
        <label for="name" class="col-sm-1 col-form-label control-label">Name:</label>
        <div class="col-sm-4">
            <input name="name" class="form-control" type="text" id="name" required/>
        </div>
    </div>

    <div class="form-group required row">
        <label for="email" class="col-sm-1 col-form-label control-label">E-mail:</label>
        <div class="col-sm-4">
            <input name="email" class="form-control" type="email" id="email" required/>
        </div>
    </div>

    <div class="form-group required row">
        <label for="city" class="col-sm-1 col-form-label control-label">City:</label>
        <div class="col-sm-4">
            <input name="city" class="form-control" type="text" id="city" required/>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-4">
            Fields with * are required.
        </div>
    </div>
	<button class="btn btn-primary">Create new row</button>
</form>