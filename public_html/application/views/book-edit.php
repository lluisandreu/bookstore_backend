<?php echo validation_errors(); ?>
<?php echo form_open_multipart('/book/edit/' . $book->id); ?>
<?php $form_class = array('class' => 'form-control'); ?>
<?php $textarea_class = array('class' => 'form-control', 'id' => 'ckeditor-field'); ?>
<?php $button_attr = array('class' => 'btn btn-primary', 'type' => 'submit', 'content' => 'Save'); ?>
<main>
<div class="well col-md-6">
	<?php if(isset($book)): ?>
	<h2>Edit <em><?php print $book->title; ?></em></h2>
	<?php endif; ?>
	<form>
		<div class="form-group">
			<label>Book title</label>
			<?php echo form_input('title', $book->title, $form_class); ?>
		</div>
		<div class="form-group">
			<label>ISBN</label>
			<?php echo form_input('isbn', $book->ISBN, $form_class); ?>
		</div>
		<div class="form-group">
			<label>Price</label>
			<div class="input-group">
			<div class="input-group-addon">€</div>
				<?php echo form_input('price', $book->price, $form_class); ?>
			</div>
		</div>
		<div class="form-group">
			<div class="well">
				<div class="row">
					<div class="col-xs-2">
						<img src="/uploads/thumbs/<?php print $book->cover; ?>" alt="">
					</div>
					<div class="col-xs-10">
						<label>Replace Cover</label>
						<?php echo form_upload('cover', '', $form_class); ?>
					</div>
				</div>
			</div>
		</div>
		<div class="form-group">
			<label>Author</label>
			<?php echo form_input('author', $book->author, $form_class); ?>
		</div>
		<div class="form-group">
			<label>Review</label>
			<?php echo form_textarea('review', $book->review, $textarea_class); ?>
		</div>
		<?php echo form_button($button_attr); ?>
		<a href="<?php print site_url('./'); ?>" class="btn btn-danger">Cancel</a>
	</form>
</div>
</main>