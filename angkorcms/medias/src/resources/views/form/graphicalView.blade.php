<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#graphicalviewimageurl">
  Media Manager
</button>

<!-- Modal -->
<div class="modal fade" id="graphicalviewimageurl" tabindex="-1" role="dialog" aria-labelledby="graphicalviewimageurlLabel">
  <div class="modal-dialog"  style="width:90%;" role="document">
    <div class="modal-content" >
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="graphicalviewimageurlLabel">Media manager</h4>
      </div>
      <div class="modal-body">
        <div class="col-sm-offset-1 col-sm-10">
          <div class="panel panel-info">
            <div class="panel-heading">Upload a picture</div>
            <div class="panel-body">
              {!! Form::open(array('url' => '', 'files' => true, 'id' => 'uploadPicture')) !!}
              {!! Form::hidden('folder_id', '', array('class' => 'folder_id_current')) !!}
              <small class="text-danger"><div id='errorImage'></div></small>
              <div class="form-group" id='divImage'>
                {!! Form::file('image', array('class' => 'form-control', 'id' => 'image')) !!}
              </div>
              {!! Form::submit('Envoyer !', array('class' => 'btn btn-info pull-right hidden')) !!}
              {!! Form::close() !!}
            </div>
          </div>
        </div>

        <div class="col-sm-offset-1 col-sm-10" id="listMedia">
          {!! View::make('angkorcms\medias\listMedia')->with(array('folders' => $folders, 'images' => $images)) !!}
        </div>

        {!! Form::open(array('url' => '', 'files' => true, 'id' => 'delImage', 'method' => 'DELETE')) !!}
        {!! Form::hidden('image_id', '', array('id' => 'image_id_form')) !!}
        {!! Form::close() !!}

        {!! Form::open(array('url' => '', 'files' => true, 'id' => 'delFolder', 'method' => 'DELETE')) !!}
        {!! Form::hidden('folder_id', '', array('id' => 'folder_id_form')) !!}
        {!! Form::close() !!}

        {!! Form::open(array('url' => '', 'files' => true, 'id' => 'openFolder')) !!}
        {!! Form::hidden('folder_id', '', array('id' => 'folder_id_open')) !!}
        {!! Form::close() !!}

        {!! Form::open(array('url' => '', 'files' => true, 'id' => 'putImageFolder', 'method' => 'PUT')) !!}
        {!! Form::hidden('folder_id', '', array('id' => 'image_parent_folder_id')) !!}
        {!! Form::hidden('image_id', '', array('id' => 'image_id_to_move')) !!}
        {!! Form::close() !!}

        {!! Form::open(array('url' => '', 'files' => true, 'id' => 'putFolderParent', 'method' => 'PUT')) !!}
        {!! Form::hidden('folder_id', '', array('id' => 'folder_id_to_move')) !!}
        {!! Form::hidden('parent_folder_id', '', array('id' => 'folder_id_parent')) !!}
        {!! Form::close() !!}

        <!-- List of script -->
        {!! View::make('angkorcms\medias\script') !!}
        {!! View::make('angkorcms\medias\form\modalscript') !!}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="graphicalviewimageurl">Close</button>
      </div>
    </div>
  </div>
</div>