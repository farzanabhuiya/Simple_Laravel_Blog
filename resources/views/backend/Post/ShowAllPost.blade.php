
@extends('layouts.backendlayout')
@section('backend')

				<section class="content-header">					
					<div class="container-fluid my-4">
						<div class="row mb-2">
							<div class="col-sm-6">
								<h1>All Posts</h1>
							</div>
							<div class="col-sm-6 text-right">
								<a href="{{route('Post.create')}}" class="btn btn-primary">New Post</a>
							</div>
						</div>
					</div>
					<!-- /.container-fluid -->
				</section>
				<!-- Main content -->
				<section class="content">
					<!-- Default box -->
					<div class="container-fluid">
						<div class="card">
							<form action="" method="get">
							<div class="card-header">
								@if (session('success'))
                          <div  class="alert alert-success w-10 h-20">
                              <h2>{{session('success')}}</h2>
                          </div>
                            @endif
								
							
						</form>
							<div class="card-body table-responsive p-0">								
								<table class="table table-hover text-nowrap">
									<thead>
										<tr>
											<th width="60">ID</th>
											<th>Image</th>
											<th>Title</th>
											<th>Content</th>
											<th width="100">Action</th>
										</tr>
									</thead>
									<tbody>
										@foreach( $posts as $key=>$post )
											
										
										<tr>
											
											<td>{{ $posts->firstITEM()  +$key }}</td>
											<td><img style="width: 80px;height:80px object-fit:cover;obect-position:center;" 
												src="{{asset('storage/post/'.$post->image)}}"></td>
											<td>{{$post->title}}</td>

										
											<td>{!! Str::length($post->content) > 30 ? substr($post->content,0,30).'....' : $post->content !!}</td>

											
											<td>
												<a href="{{route('Post.edit',$post->id)}}">
													
													<svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" fill="currentColor" class="bi bi-pen-fill" viewBox="0 0 16 16">
														<path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001"/>
													  </svg>
												</a>
												<a href="#" class="text-danger w-4 h-4 mr-1 deleteBt" id="deleteBt">
												
													<svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
														<path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0"/>
													  </svg>
												</a>
												<form action="{{route('Post.delete',$post->id)}}"  method="post">
													@csrf
													@method('DELETE')
												</form>
											</td>
										</tr>
										@endforeach
										
										
                                       
									</tbody>
								</table>
								{{$posts->links()}}											
							</div>
						</div>
						</div>
					</div>
					<!-- /.card -->
				</section>
				<!-- /.content -->


				@push('customJs')
				<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
				<script>
				
				$('.deleteBt').click(function (event){
				  event.preventDefault()
					Swal.fire({
				  title: "Are you sure?",
				  text: "You won't be able to revert this!",
				  icon: "warning",
				  showCancelButton: true,
				  confirmButtonColor: "#3085d6",
				  cancelButtonColor: "#d33",
				  confirmButtonText: "Yes, delete it!"
				}).then((result) => {
				  if (result.isConfirmed) {
				   $(this).next('form').submit()
				  }
				});
				
				});
				
					</script>
				@endpush

             @endsection