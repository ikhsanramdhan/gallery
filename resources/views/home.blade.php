@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justlify-content-between">
                        <div>images</div>
                        <div>

                                <form class="form-inline">
                                    <select class="form-control">
                                        <option>Oldest<option>                                                                           
                                        <option>Latest<option>                                                                      
                                    </select> 
                                </form>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
          
                    <div class="row">
                        <div class="col-md-3">
                            <div class="list-group">
                                <a href="#" class="list-group-item list-group-item-action">Personal</a>
                                <a href="#" class="list-group-item list-group-item-action">Friends</a>
                                <a href="#" class="list-group-item list-group-item-action">Family</a>
                              </div>
                        </div>
                        <div class="col-md-9">

                            <div class="row">
                                <div class="col-md-12">

                                </div>
                            </div>
                            <button data-toggle="collapse" class=" btn btn-success" data-target="#demo">Add images</button>

                            <div id="demo" class="collapse">
                            
                                <form action="/action_page.php">
                                    <div class="form-group">
                                      <label for="caption">Image caption</label>
                                      <input type="caption" class="form-control" placeholder="Enter caption" id="caption">
                                    </div>
                                    <div class="form-group">
                                        <label for="sel1">Select Category</label>
                                        <select class="form-control" id="sel1">
                                          <option>Select a Category</option>
                                          <option>Personal</option>
                                          <option>Friends</option>
                                          <option>Family</option>
                                        </select>
                                       <div> 
                                    <label class="control-label">Upload image</label>
                                    <div class="preview-zone hidden">
                                    <div class="box box-solid">
                                        <div class="box-header with-border">
                                        <div><b>Preview</b></div>
                                        <div class="box-tools pull-right">
                                            <button type="button" class="btn btn-danger btn-xs remove-preview">
                                            <i class="fa fa-times"></i> Reset This Form
                                            </button>
                                        </div>
                                        </div>
                                        <div class="box-body"></div>
                                    </div>
                                    </div>
                                    <div class="dropzone-wrapper">
                                    <div class="dropzone-desc">
                                        <i class="glyphicon glyphicon-download-alt"></i>
                                        <p>Choose an image file or drag it here.</p>
                                    </div>
                                    <input type="file" name="img_logo" class="dropzone">
                                    </div>
                                </div>
        </div>
      </div>
        <div class="col-md-12 mt-4">
            <div class="row">
            <div class="col-md-3 mb-4">
                <a href="#">
                    <img src="https://placehold.co/600x400/000000/FFF" height="100%" width="100%">
                </a>
            </div>
            <div class="col-md-3 mb-4">
                <a href="#">
                    <img src="https://placehold.co/600x400/000000/FFF"  height="100%" width="100%">
                </a>
            </div>
            <div class="col-md-3 mb-4">
                <a href="#">
                    <img src="https://placehold.co/600x400/000000/FFF" height="100%" width="100%">
                </a>
                </div>
            <div class="col-md-3 mb-4">
                <a href="#">
                    <img src="https://placehold.co/600x400/000000/FFF" height="100%" width="100%">
                </a>
            </div>


        </div>
      </div>
    </div>
  </form>
</section>

<script src="assets/app.js"></script>
                                      </div>
                                    
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                  </form>
                            </div>
                        </div>



                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script type="text/javascript">
function readFile(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      var htmlPreview =
        '<img width="200" src="' + e.target.result + '" />' +
        '<p>' + input.files[0].name + '</p>';
      var wrapperZone = $(input).parent();
      var previewZone = $(input).parent().parent().find('.preview-zone');
      var boxZone = $(input).parent().parent().find('.preview-zone').find('.box').find('.box-body');

      wrapperZone.removeClass('dragover');
      previewZone.removeClass('hidden');
      boxZone.empty();
      boxZone.append(htmlPreview);
    };

    reader.readAsDataURL(input.files[0]);
  }
}

function reset(e) {
  e.wrap('<form>').closest('form').get(0).reset();
  e.unwrap();
}

$(".dropzone").change(function() {
  readFile(this);
});

$('.dropzone-wrapper').on('dragover', function(e) {
  e.preventDefault();
  e.stopPropagation();
  $(this).addClass('dragover');
});

$('.dropzone-wrapper').on('dragleave', function(e) {
  e.preventDefault();
  e.stopPropagation();
  $(this).removeClass('dragover');
});

$('.remove-preview').on('click', function() {
  var boxZone = $(this).parents('.preview-zone').find('.box-body');
  var previewZone = $(this).parents('.preview-zone');
  var dropzone = $(this).parents('.form-group').find('.dropzone');
  boxZone.empty();
  previewZone.addClass('hidden');
  reset(dropzone);
});

</script>
@endsection
