	<a href="index.php?action=picture" class="navbar-item">
		<span class="icon">
			<i class="fas fa-camera"></i>
		</span>
	</a>
	<?php 
		if ($_SESSION['logged'] == 1) {
			echo "<a href='index.php?action=my_account' class='navbar-item'>
				<span class='icon'>
					<i class='fas fa-address-card'></i>
				</span>
			</a>";
			echo "<a href='index.php?action=log_out' class='navbar-item'>
				<span class='icon'>
					<i class='fas fa-sign-out-alt'></i>
				</span>
			</a>";
		}
		else {
			echo "<a href='index.php?action=identification' class='navbar-item'>
				<span class='icon'>
					<i class='fas fa-sign-in-alt'></i>
				</span>
			</a>";
		}
	?>
</div>