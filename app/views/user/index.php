<form action="" method="post">
    <table>

        <tr>
            <th>First name</th>
            <th>Last name</th>
            <th>Email Address</th>
            <th>Job Role</th>
            <th>Delete</th>
        </tr>

        <?php foreach($data as $key => $developer): ?>

	        <tr>

	        	<?php foreach($developer as $field => $value): ?>
	        		<?php if($field !== "id"): ?>
		            	<td><input type="text" name="people[<?= $developer['id'] ?>][<?= $field ?>]" value="<?= $developer[$field] ?>" /></td>
		            <?php endif; ?>
		        <?php endforeach; ?>

	            <td><input type="checkbox" name="people[<?= $developer['id'] ?>][delete]" value="1" /></td>

	        </tr>

       	<?php endforeach; ?>

        <tr>
            <td><input type="text" name="people[][firstname]" placeholder="Add new..." /></td>
            <td><input type="text" name="people[][lastname]" placeholder="Add new..." /></td>
            <td><input type="text" name="people[][email]" placeholder="Add new..." /></td>
            <td><input type="text" name="people[][job_role]" placeholder="Add new..." /></td>
        </tr>

    </table>

    <input type="submit" value="Submit!" />

</form>