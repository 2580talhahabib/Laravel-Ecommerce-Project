@extends('layouts.app')
@section('section')
    <div class="content-wrapper">
				<!-- Content Header (Page header) -->
				<section class="content-header">					
					<div class="container-fluid my-2">
						<div class="row mb-2">
							<div class="col-sm-6">
								<h1>Update Category</h1>
							</div>
							<div class="col-sm-6 text-right">
								<a href="categories.html" class="btn btn-primary">Back</a>
							</div>
						</div>
					</div>
					<!-- /.container-fluid -->
				</section>
				<!-- Main content -->
				<section class="content">
					<!-- Default box -->
					<div class="container-fluid">
						<form action="{{route('category.store')}} " method="POST" enctype="multipart/form-data">
							@csrf
						<div class="card">
							<div class="card-body">								
									<div class="row">
									<div class="col-md-6">
										<div class="mb-3">
											<label for="name">Name</label>
											<input type="text" value="{{old('name')}}" name="name"  class="form-control @error('name') is-invalid @enderror" placeholder="Name">
												@error('name')
										<div class="invalid-feedback">{{$message}}</div>
										@enderror
										</div>
									
										
									</div>
									<div class="col-md-6">
									<div class="mb-3">
											<label for="name">Slug</label>
											<input type="text" value="{{old('slug')}}" name="slug"  class="form-control @error('slug') is-invalid @enderror" placeholder="Slug"  >
												@error('slug')
										<div class="invalid-feedback">{{$message}}</div>
										@enderror
										</div>
									
										
									</div>		
                                    <div class="col-md-6">
										<div class="mb-3">
											<label for="email">Status</label>
											<select name="status" id="status" class="form-control">
                                                <option value="1">Active</option>
                                                <option value="0">Block</option>
                                            </select>	
										</div>
									</div>	
									<div class="image">
										 <Label>Image</Label>		
									<input type="file" value="{{old('image')}}" name="image" id="" class="form-control  @error('image') is-invalid @enderror" >
										@error('image')
										<div class="invalid-feedback">{{$message}}</div>
										@enderror			
								</div> 	
								</div>
							</div>							
						</div>
						<div class="pb-5 pt-3">
							<button type="submit" class="btn btn-primary">Update</button>
							<a href="brands.html" class="btn btn-outline-dark ml-3">Cancel</a>
						</div>
						</form>
					</div>
					<!-- /.card -->
				</section>
				<!-- /.content -->
			</div>
@endsection
