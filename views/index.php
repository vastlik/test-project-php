<h1>PHP Test Application</h1>


<div id="flash-messages">
</div>

<div class="form-group">
    <div class="form-group row">
        <label for="name" class="col-md-1 col-form-label">Filter cities:</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" id="filterInput" onkeyup="filterCities()" placeholder="Filter cities.." autocomplete="off">
        </div>
    </div>
</div>

<table class="table table-striped" id="userTable">
	<thead>
		<tr>
			<th>Name</th>
			<th>E-mail</th>
			<th>City</th>
            <th>Phone</th>
        </tr>
	</thead>
	<tbody>
		<?foreach($users as $user){?>
		<tr>
			<td><?=htmlspecialchars($user->getName())?></td>
			<td><?=htmlspecialchars($user->getEmail())?></td>
			<td><?=htmlspecialchars($user->getCity())?></td>
            <td><?=htmlspecialchars($user->getPhone())?></td>
        </tr>
		<?}?>
	</tbody>
</table>

<form method="post" action="create.php" id="userForm">
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
        <label for="city" class="col-sm-1 col-form-label control-label">Phone:</label>
        <div class="col-sm-4">
            <input name="phone" class="form-control" type="text" id="phone"/>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-4">
            Fields with * are required.
        </div>
    </div>
	<button class="btn btn-primary">Create new row</button>
</form>

<script type="text/javascript">
    $("#userForm").submit(function(e) {

        e.preventDefault(); // avoid to execute the actual submit of the form.

        var form = $(this);
        var url = form.attr('action');

        $.ajax({
            type: "POST",
            url: url,
            data: form.serialize(), // serializes the form's elements.
            success: function(data)
            {
                if(data.status === "OK") {
                    var newElement = "<tr><td>" + data.user.name + "</td><td>" + data.user.email + "</td><td>" + data.user.city + "</td><td>" + data.user.phone + "</td></tr>";
                    $('#userTable').append(newElement);
                }

                var flash_messages = $("#flash-messages");
                flash_messages.html("");
                for(var i = 0; i < data.flash_messages.length; ++i) {
                    let current = data.flash_messages[i];
                    let message = '<div class="alert alert-'+ current.type + '" role="alert">' + current.text + '</div>';
                    flash_messages.append(message);
                }
            }
        });


    });
</script>