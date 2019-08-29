<h1>PHP Test Application</h1>

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
    <div class="form-group row">
        <label for="name" class="col-sm-1 col-form-label">Name:</label>
        <div class="col-sm-4">
            <input name="name" class="form-control" input="text" id="name"/>
        </div>
    </div>

    <div class="form-group row">
        <label for="email" class="col-sm-1 col-form-label">E-mail:</label>
        <div class="col-sm-4">
            <input name="email" class="form-control" input="text" id="email"/>
        </div>
    </div>

    <div class="form-group row">
        <label for="city" class="col-sm-1 col-form-label">City:</label>
        <div class="col-sm-4">
            <input name="city" class="form-control" input="text" id="city"/>
        </div>
    </div>
	<button class="btn btn-primary">Create new row</button>
</form>