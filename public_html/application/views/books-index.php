<?php if(isset($message)): ?>
	<div class="alert alert-success"><?php print $message; ?></div>
<?php endif; ?>
<main>
	<div class="well">
		<div class="description"><p>This is a Bookstore backend where you can edit and add books</p></div>
		<a href="<?php echo site_url('book/add'); ?>" class="btn btn-primary">+ Add a new book</a>
	</div>
	<?php if(isset($books)): ?>
	<div class="books-list panel panel-default">
		<div class="panel-heading">
			All books
		</div>
		<div class="panel-body">
			<table class="table">
				<thead>
					<tr>
						<th>Book title</th>
						<th>Author</th>
						<th>ISBN</th>
						<th>Price</th>
						<th>Date created</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
				<?php foreach ($books as $book): ?>
					<tr>
						<td><?php print $book->title; ?></td>
						<td><?php print $book->author; ?></td>
						<td><?php print $book->ISBN; ?></td>
						<td><?php print $book->price; ?>€</td>
						<td><?php print date($book->created); ?></td>
						<td><a href="#">View book</a></td>
					</tr>
				<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
	<?php endif; ?>
</main>
