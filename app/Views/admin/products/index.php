<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>
<!-- Content Header (Page header) -->
<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
		  <div class="col-sm-6">
			<h1>Products</h1>
		  </div>
		  <div class="col-sm-6">
			<ol class="breadcrumb float-sm-right">
			  <li class="breadcrumb-item"><a href="<?php echo site_url('admin/dashboard') ?>">Dashboard</a></li>
			  <li class="breadcrumb-item active">Products</li>
			</ol>
		  </div>
		</div>
	  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
	<div class="container-fluid">
		<!-- /.row -->
		<div class="row">
		  	<div class="col-12">
				<div class="card">
			  		<div class="card-header">
					<h3 class="card-title">List of Products</h3>
					<div class="card-tools">
						<div class="input-group input-group-sm" style="width: 150px;">
							<input type="text" name="table_search" class="form-control float-right" placeholder="Search">
							<div class="input-group-append">
								<button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
							</div>
						</div>
					</div>
			  </div>
			  <!-- /.card-header -->
			  	<div class="card-body table-responsive p-0">
				  	<?= view('admin/shared/flash_message') ?>
					<table class="table table-hover text-nowrap">
					<thead>
						<tr>
							<th>SKU</th>
							<th>Image</th>
							<th>Name</th>
							<th>Price</th>
							<th>Stock</th>
							<th>Status</th>
							<th style="width:15%">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php if ($products): ?>
							<?php foreach ($products as $product): ?>
								<tr>
									<td><?= $product->sku ?></td>
									<td><?= !empty($product->featured_image) ? '<img src="'. $product->featured_image->small. '">' : null ?></td>
									<td>
										<?= $product->name ?><br/>
										<span style="font-size:12px"><?= $product->type ?></span>
									</td>
									<td><?= $product->price ?></td>
									<td><?= $product->qty ?></td>
									<td><?= $statuses[$product->status] ?></td>
									<td>
										<?php if (empty($product->deleted_at)): ?>
											<a href="<?= site_url('admin/products/'. $product->id .'/edit') ?>" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>
											<form method="POST" action="<?= site_url('admin/products/'. $product->id) ?>" accept-charset="UTF-8" class="delete" style="display:inline-block">
												<input name="_method" type="hidden" value="DELETE">
												<button class="btn btn-danger btn-sm"><i class="fas fa-trash-alt" style="border:none !important"></i></button>
											</form>
										<?php else: ?>
											<a href="<?= site_url('admin/products/restore/'. $product->id) ?>" class="btn btn-warning btn-sm"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-counterclockwise" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M8 3a5 5 0 1 1-4.546 2.914.5.5 0 0 0-.908-.417A6 6 0 1 0 8 2v1z"/>
  <path d="M8 4.466V.534a.25.25 0 0 0-.41-.192L5.23 2.308a.25.25 0 0 0 0 .384l2.36 1.966A.25.25 0 0 0 8 4.466z"/>
</svg></a>
											<form method="POST" action="<?= site_url('admin/products/'. $product->id) ?>" accept-charset="UTF-8" class="delete" style="display:inline-block">
												<input name="_method" type="hidden" value="DELETE">
												<button class="btn btn-danger btn-sm"><i class="fas fa-trash-alt" style="border:none !important"></i></button>
											</form>
										<?php endif; ?>
									</td>
								</tr>
							<?php endforeach; ?>
						<?php else: ?>
							<tr>
								<td colspan="5">No record found</td>
							</tr>
						<?php endif; ?>
					</tbody>
					</table>
			  	</div>
				<!-- /.card-body -->
				<div class="card-footer clearfix">
					<div class="row">
						<div class="col-8">
							<?php echo $pager->links('bootstrap', 'bootstrap_pagination') ?>
						</div>
						<div class="col-4 text-right">
							<a href="<?= site_url('admin/products/create') ?>" class="btn btn-success">New Product</a>
						</div>
					</div>
				</div>
			</div>
			<!-- /.card -->
		  	</div>
		</div>
	</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
<?= $this->endSection() ?>