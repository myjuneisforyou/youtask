<?php include(ROOT.'/views/layouts/header.php')?>

<!-- main content -->
	<div class="container creation">
		<div class="row">
                        <?php if($result):?>
                        <h2 style="color: #16b716;">Task was successfully changed!</h2>
                        <?php endif;?>
			<h1>Wanna change something, huh?</h1>
			<form method="POST" enctype='multipart/form-data'>
				<div class="form-group">
                                    <?php foreach($infoedit as $info):?>
				    <label>Task Title</label><span style="color: red;"> <b><?=@$error_title; ?></b></span>
                                    <input type="text" name="title" value="<?php echo $info['title'] ;?>" class="form-control" placeholder="Task title">
				</div>
				<label>Task</label><span style="color: red;"> <b><?=@$error_task; ?></b></span>
                                <textarea class="form-control" name="task" placeholder="Write your task here" rows="10" cols="7"><?php echo $info['tasktext'] ;?></textarea><br>
                                <button class="btn btn-success" name="submit">Create!</button>
                                <?php endforeach; ?>
			</form>
		</div>
	</div>
</div>

<?php include(ROOT.'/views/layouts/footer.php') ?>
