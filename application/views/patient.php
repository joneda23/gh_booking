<div class="container" >
    <div class="row">
        <div class="col-md-12"><h2>List of all patients</h2></div>
    </div>    
    <div class="row">
        <div class="col-lg-12">
            
        </div>
    </div>
    <div class="row" id="">
        <div class="col-lg-12">
        <table id="list_all" class="display" style="width:100%">
        <thead>
            <tr>
                <th>SIN</th>
                <th>Name</th>
                <th>Address</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Incoming</th>
                <th>&nbsp;</th>                
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>SIN</th>
                <th>Name</th>
                <th>Address</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Incoming</th>
                <th>&nbsp;</th>
            </tr>
        </tfoot>
    </table>
        </div>        
    </div>
</div>


<div class="modal" tabindex="-1" role="dialog" id="mpatientview">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Patient <span id="ms_h"></span></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <input type="hidden" id="mph_sin" name="mph_sin">
          <div class="row">
            <div class="col-sm-4">SIN:</div>
            <div class="col-sm-8"><input type="text" id="mpi_sin" maxlenght="9"></div>
          </div>
          <div class="row">
            <div class="col-sm-4">Name:</div>
            <div class="col-sm-8"><input type="text" id="mpi_name"> </div>
          </div>
          <div class="row">
              <div class="col-sm-4">Address:</div>
              <div class="col-sm-8"><input type="text" id="mpi_address"> </div>
          </div>
          <div class="row">
              <div class="col-sm-4">eMail:</div>
              <div class="col-sm-8"><input type="text" id="mpi_email"> </div>
          </div>
          <div class="row">
              <div class="col-sm-4">Phone:</div>
              <div class="col-sm-8"><input type="text" id="mpi_phone"> </div>
          </div>
          <hr>
          <div class="row">
              <div class="col-sm-12"><center>Appointments</center></div>
          </div>
          <div class="row">
              <div class="col-sm-12" >
                <table id="div_appo" width="100%"></table>
              </div>
          </div>
      </div>
      <div class="modal-footer ">
        <button type="button" class="btn btn-default" id="rm_patient">Remove Patient</button>
        <button type="button" class="btn btn-primary" id="up_patient">Modify Patient</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>