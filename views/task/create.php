<?php include(ROOT.'/views/layouts/header.php')?>

<!-- main content -->
	<div class="container creation">
		<div class="row">
			<h1>Let the creation Begin!</h1>
			<form method="POST" enctype='multipart/form-data'>
                            <?php if($result):?>
                                <h3 style="color: #16b716; text-align: center;">You task has been added!</h3>
                            <?php endif;?>
				<div class="form-group">
				    <label>Task Title</label><span style="color: red;"> <b><?=@$error_title; ?></b></span>
                                    <input type="text" name="title" class="form-control" placeholder="Task title">
				</div>
				<div class="form-group">
				    <label for="exampleInputFile">File input</label><span style="color: red;"> <b><?=@$error_image; ?></b></span>
                                    <input type="file" name="image" id="exampleInputFile">
				</div>
				<label>Task</label><span style="color: red;"> <b><?=@$error_task; ?></b></span>
                                <textarea class="form-control" name="task" placeholder="Write your task here" rows="10" cols="7"></textarea><br>
                                <button class="btn btn-success" name="submit">Create!</button>
			</form>
		</div>
	</div>
</div>

<?php include(ROOT.'/views/layouts/footer.php') ?>
