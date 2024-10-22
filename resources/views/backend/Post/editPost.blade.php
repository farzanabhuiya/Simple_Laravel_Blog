@extends('layouts.backendlayout')
@section('backend')
    


<section class="content-header">					
    <div class="container-fluid my-4">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Edit Post</h1>
            </div>
            
        </div>
    </div>
    <!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="container-fluid">
        <form action="{{route('Post.update',$post->id)}}" method="post"  >
            @csrf
            @method('put')
            
        
        <div class="card">
            <div class="card-body">
                @if (session('success'))
                <div class="alert alert-success">{{session('success')}}</div>
                  @endif	
                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="name">Title</label>
                            <input type="text" name="title" value="{{$post->title}}" id="name" class="form-control" placeholder="Name">
                        	
                        </div>
                    </div>

                    <div class="my-3">
                        <textarea value="{{$post->content}}" name="content"  id="editor" placeholder="Content Goes Here...."></textarea>
                       
                       </div>
                                      
                </div>
            </div>							
        </div>
        <div class="pb-5 pt-3">
            <button class="btn btn-primary">Update</button>
            <a href="" class="btn btn-outline-dark ml-3">Cancel</a>
        </div>
        </form>
    </div>
    <!-- /.card -->
</section>












    


@push('customJs')

<script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>

<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>





 @endpush
    





@endsection