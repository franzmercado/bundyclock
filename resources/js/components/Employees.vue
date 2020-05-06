<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
              <br>
              <div class="row">

                <div class="col-md-10">
                  <h5><i class="fas fa-users"></i> Employee List</h5>
                </div>
                <div class="col-md-2">
                  <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#addModal">Add Employee <i class="fas fa-user-plus"></i></button>
                </div>
              </div>
              <hr>
                 <table id="employee_tbl" class="table table-bordered table-striped">
                   <thead>
                   <tr>
                     <th>Employee ID</th>
                     <th>Name</th>
                     <th>Department</th>
                     <th>Shift</th>
                     <th>Action</th>
                   </tr>
                   </thead>
                   <tbody>
                   <tr>
                     <td>Trident</td>
                     <td>Internet
                       Explorer 4.0
                     </td>
                     <td>Win 95+</td>
                     <td> 4</td>
                     <td>X</td>
                   </tr>

                   </tbody>
                 </table>
            </div>
        </div>
  <!--Add Modal -->
  <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addModalLabel">Add Employee</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </div>
  </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
