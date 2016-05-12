<?php echo validation_errors(); ?>
<?php echo form_open('book/add'); ?>
<main>
<div class="well col-md-6">
	<h2>Add a new book</h2>
	<form>
		<div class="form-group">
			<label>Book title</label>
			<input type="text" class="form-control" name="title" value="<?php echo set_value('title'); ?>"></input>
		</div>
		<div class="form-group">
			<label>ISBN</label>
			<input type="text" class="form-control" name="isbn" value="<?php echo set_value('isbn'); ?>"></input>
		</div>
		<div class="form-group">
			<label>Price</label>
			<div class="input-group">
			<div class="input-group-addon">€</div>
				<input type="number" class="form-control" name="price" min="0" value="<?php echo set_value('price'); ?>"></input>
			</div>
		</div>
		<div class="form-group">
			<label>Cover</label>
			<input type="file" class="form-control" name="cover" accept="image/*" value="<?php echo set_value('cover'); ?>"></input>
		</div>
		<div class="form-group">
			<label>Author</label>
			<input type="text" class="form-control" name="author" value="<?php echo set_value('author'); ?>"></input>
		</div>
		<div class="form-group">
			<label>Review</label>
			<textarea class="form-control" rows="6" name="review" value="<?php echo set_value('review'); ?>"></textarea>
		</div>
		<button type="submit" class="btn btn-default">Save</button>
	</form>
</div>
</main>