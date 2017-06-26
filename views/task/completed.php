<?php include(ROOT.'/views/layouts/header.php')?>

<div class="container-fluid main_content">
		<div class="row">
		<!-- sort -->
			<div class="col-lg-2 col-md-2 col-sm-2">
                            <form method="POST">
					<div class="checkbox">
						<h4>Sort by:</h4>
                                                <label><input type="checkbox" name="sort_by" value="username"> User Name </label><br>
                                                <label><input type="checkbox" name="sort_by" value="useremail"> User Email </label><br>
                                                <label><input type="checkbox" name="sort_by" value="latest"> Latest </label><br>
                                            <button type="submit"  name="submit"class="btn btn-primary btn-sort">Sort</button>
		  			</div>
	  			</form>
			</div>
			<!-- task list -->
			<div class="col-lg-7 col-lg-offset-1 col-md-7 col-md-offset-1 col-sm-7 col-sm-offset-1">
				<?php foreach($completedTask as $task): ?>
				<div class="taskboard">
					<h3><?php echo $task['title'];?></h3>
					<div class="stripe">
                                            <?php if(!User::checkSuperuser($userId)):?><span>#<?php echo $task['id'];?></span> / <span><?php echo $task['user_name'];?></span> / <span><?php echo $task['user_email'];?></span> / <span>Status: <?php echo $task['status'];?></span> 
                                                <?php else:?><span>#<?php echo $task['id'];?></span> / <span><?php echo $task['user_name'];?></span> / <span><?php echo $task['user_email'];?></span> / <span>Status: <?php echo $task['status'];?></span> / <span><a href="/edit/<?php echo $task['id'];?>">Edit</a></span><?php endif; ?><span style="float: right;"><a href="/status/<?php echo $task['id'];?>">Change status</a></span>
				        </div>
					<div class="board">
						<img src="../tmp/img/db/<?php echo $task['image'];?>" align="left" alt="uploaded image">
						<pre><?php echo $task['tasktext'];?></pre>
					</div>
				</div><br>
                                <?php endforeach;?>
			</div>
		</div>
	</div>
</div>

<?php include(ROOT.'/views/layouts/footer.php') ?>
