<div class="container" >
    <div class="row">
        <div class="col-lg-2">Choose the date:</div>
        <div class="col-lg-2"><input type="date" id="pdate" name="pdate" ></div>
        <div class="col-lg-3">and choose an available hour</div>
    </div>
    <div class="row">
       
    </div>
    <div class="row" id="div_hours">        
    </div>
</div>

<div class="modal" tabindex="-1" role="dialog" id="mbook">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Book an appoinment <span id="ms_h"></span></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <input type="hidden" id="mih_hour" name="mih_hour">
          <div class="row">
              <div class="col-sm-4">
              Search SIN: 
              </div>
              <div class="col-sm-8">
              <input type="text" id="sbysin" name="sbysin" placeholder="000000000" maxlenght="9">
              </div>
          </div>
          <hr>
          <div class="row">
              <div class="col-sm-4">Name:</div>
              <div class="col-sm-8" id="mbt_name"></div>
          </div>
          <div class="row">
              <div class="col-sm-4">Address:</div>
              <div class="col-sm-8" id="mbt_address"></div>
          </div>
          <div class="row">
              <div class="col-sm-4">eMail:</div>
              <div class="col-sm-8" id="mbt_email"></div>
          </div>
          <div class="row">
              <div class="col-sm-4">Phone:</div>
              <div class="col-sm-8" id="mbt_phone"></div>
          </div>
          <div class="row">
              <div class="col-lg-12">Reason for Visiting</div>
          </div>
          <div class="row">
              <div class="col-lg-12"><textarea id="mbt_reason" rows="3" width="100%" style="width: 100%;"></textarea></div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" id="bregister" data-toggle="modal" data-target="#mpatient">New Patient</button>
        <button type="button" class="btn btn-primary" id="bsbook">Book now</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal" tabindex="-1" role="dialog" id="mpatient">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">New Patient</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="row">
              <div class="col-sm-4">SIN:</div>
              <div class="col-sm-8"><input type="text" id="mpi_sin" name="mpi_sin" placeholder="000000000"></div>
          </div>
          <hr>
          <div class="row">
              <div class="col-sm-4">Name:</div>
              <div class="col-sm-8"><input type="text" id="mpi_name" name="mpi_name" placeholder="Jonh Doe"></div>
          </div>
          <div class="row">
              <div class="col-sm-4">Address:</div>
              <div class="col-sm-8" ><input type="text" id="mpi_address" placeholder="Vancouver, BC"></div>
          </div>
          <div class="row">
              <div class="col-sm-4">eMail:</div>
              <div class="col-sm-8"><input type="text" id="mpi_email" placeholder="fake@email.com"></div>
          </div>
          <div class="row">
              <div class="col-sm-4">Phone:</div>
              <div class="col-sm-8"><input type="text" id="mpi_phone" placeholder="6006009000"></div>
          </div>
      </div>
      <div class="modal-footer">        
        <button type="button" class="btn btn-primary" id="bspatient">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>