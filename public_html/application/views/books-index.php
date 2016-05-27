<div class="col-md-12">
	<div class="row">
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
				<div class="table-responsive">
				<table class="table">
					<thead>
						<tr>
							<th></th>
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
							<td><img src="<?php print $book->cover['thumb']; ?>" alt=""></td>
							<td><?php print $book->title; ?></td>
							<td><?php print $book->author; ?></td>
							<td><?php print $book->ISBN; ?></td>
							<td><?php print $book->price; ?>€</td>
							<td><?php print date($book->created); ?></td>
							<td><a href="<?php print site_url('book/edit/' . $book->id); ?>" class="btn btn-default"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Edit</a>
							<a href="#" data-toggle="modal" data-target="#delete-book" class="btn btn-danger"> <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>Remove</a>
							</td>
						</tr>
					<?php endforeach; ?>
					</tbody>
				</table>
				</div>
			</div>
		</div>
		<?php endif; ?>
	</main>
	</div>
</div>
<div class="modal fade" id="delete-book" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        Do you really want to remove this book?
      </div>
      <div class="modal-footer">
        <a href="<?php print site_url('book/remove/' . $book->id); ?>" class="btn btn-danger">Remove</a>
        <button class="btn btn-primary" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>