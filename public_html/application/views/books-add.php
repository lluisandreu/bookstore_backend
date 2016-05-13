<?php echo validation_errors(); ?>
<?php echo form_open_multipart('book/add'); ?>
<?php $form_class = array('class' => 'form-control'); ?>
<?php $button_attr = array('class' => 'btn btn-primary', 'type' => 'submit', 'content' => 'Save'); ?>
<main>
<div class="well col-md-6">
	<h2>Add a new book</h2>
	<form>
		<div class="form-group">
			<label>Book title</label>
			<?php echo form_input('title', set_value('title'), $form_class); ?>
		</div>
		<div class="form-group">
			<label>ISBN</label>
			<?php echo form_input('isbn', set_value('isbn'), $form_class); ?>
		</div>
		<div class="form-group">
			<label>Price</label>
			<div class="input-group">
			<div class="input-group-addon">€</div>
				<?php echo form_input('price', set_value('price'), $form_class); ?>
			</div>
		</div>
		<div class="form-group">
			<label>Cover</label>
			<?php echo form_upload('cover', '', $form_class); ?>
		</div>
		<div class="form-group">
			<label>Author</label>
			<?php echo form_input('author', set_value('author'), $form_class); ?>
		</div>
		<div class="form-group">
			<label>Review</label>
			<?php echo form_textarea('review', set_value('review'), $form_class); ?>
		</div>
		<?php echo form_button($button_attr); ?>
	</form>
</div>
</main>