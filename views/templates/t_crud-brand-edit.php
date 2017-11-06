	<body>
		<h1>Izmena Brenda #<?php echo htmlspecialchars($brand['id']);?></h1>
		
		<form action="" method="post">
                    <input type="hidden" name="task" value="save">
			
			<div>
				<strong>Naziv</strong>
                                <input type="text" required name="title" value="<?php echo isset($formData["title"]) ? htmlspecialchars($formData["title"]) : "";?>">

                                <?php if (!empty($formErrors["title"])) { ?>
                                    <ul style="color: red">
                                        <?php foreach ($formErrors["title"] as $errorMessage) { ?>
                                            <li class="error"><?php echo $errorMessage; ?></li>
                                        <?php } ?>
                                    </ul>
                                <?php } ?>
			</div>
			
			<div>
				<strong>Websajt</strong>

                                <input type="url" name="website_url" value="<?php echo isset($formData["website_url"]) ? htmlspecialchars($formData["website_url"]) : "";?>">
                                
                                    <?php if (!empty($formErrors["website_url"])) { ?>
                                    <ul style="color: red">
                                        <?php foreach ($formErrors["website_url"] as $errorMessage) { ?>
                                            <li class="error"><?php echo $errorMessage; ?></li>
                                        <?php } ?>
                                    </ul>
                                <?php } ?>
			</div>
			<div>
				<hr>
                                <a href="/crud-brand-list.php">Otkazi</a>
				<button type="submit">Sacuvaj</button>
			</div>
		</form>

