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

        <div class="" id="listMedia">
          {!! View::make('angkorcms/medias/listMedia')->with(array('folders' => $folders, 'images' => $images)) !!}
        </div>

        <!-- List of script -->
        {!! View::make('angkorcms/medias/script') !!}
        {!! View::make('angkorcms/medias/form/modalscript') !!}
      </div>
    </div>
  </div>
</div>
