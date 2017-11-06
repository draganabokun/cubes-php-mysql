	<body>
		<h1>Lista Brendova</h1>
		<p style="text-align: right;">
                    <a href="/crud-brand-list.php">+ Unesi novi brend</a>
		</p>
		<table>
			<thead>
				<tr>
					<th style="width: 50px;">ID</th>
					<th>Naziv</th>
					<th>Websajt</th>
					<th class="actions">Akcije</th>
				</tr>
			</thead>
			<tbody>
                            <?php foreach($brands as $brand) { ?>
				<tr>
                                    <td>#<?php echo htmlspecialchars($brand['id']); ?></td>
					<td><?php echo htmlspecialchars($brand['title']); ?></td>
					<td><?php echo htmlspecialchars($brand['website_url']); ?></td>
					<td class="actions">
                                            <a href="/crud-brand-edit.php?id=<?php echo htmlspecialchars($brand['id']); ?>">Izmeni</a>
                                            <a href="/crud-brand-delete.php?id=<?php echo htmlspecialchars($brand['id']); ?>">Obrisi</a>
					</td>
				</tr>
                            <?php } ?>

			</tbody>
		</table>


