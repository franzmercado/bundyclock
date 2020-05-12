<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-2">
              <br>
              <div class="row">
                <div class="col-md-10">
                  <h5><i class="fas fa-users"></i> Departments</h5>
                </div>
                <div class="col-md-2">
                  <button type="button" class="btn btn-primary " v-on:click="showModal"><i class="fas fa-plus"> New </i></button>
                </div>
              </div>
              <hr>
                 <table id="dept_tbl" class="table table-bordered table-striped">
                   <thead>
                   <tr>
                     <th>ID</th>
                     <th>Department Name</th>
                     <th>Action</th>
                   </tr>
                   </thead>
                   <tbody>
                  <tr v-for="dept in departments">
                    <td>{{dept.id}}</td>
                    <td>{{dept.dept_name}}</td>
                    <td>
                      <a href="#" v-on:click="editModal(dept)"><i class="fa fa-edit fa-lg cyan"></i></a>
                      <a href="#" v-on:click="delDepartment(dept.id)"><i class="fa fa-trash-alt fa-lg red"></i></a>

                    </td>

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
        <h5 class="modal-title" id="addModalLabel">New Department</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form @submit.prevent="isEditMode ? uptDepartment() : addDepartment()" @keydown="form.onKeydown($event)" >
      <div class="modal-body">
        <div class="row">
          <div class="col-md-8 offset-2">
            <div class="form-group">
              <label class="mb-0" for="employeeID"><font color="red">*</font>Department:</label>
                <input v-model="form.departmentName" type="text" name="departmentName"
                        class="form-control" :class="{ 'is-invalid':
                        form.errors.has('departmentName') }">
                        <has-error :form="form" field="departmentName"></has-error>

            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button v-show="!isEditMode" type="submit" class="btn btn-primary">Submit</button>
        <button v-show="isEditMode" type="submit" class="btn btn-warning">Update</button>
      </div>
      </form>
    </div>
  </div>
  </div>
    </div>
</template>

 <script>
    export default {
      data(){
        return {
          departments : {},
          isEditMode: false,
          form: new Form({
            id : '',
            departmentName : ''
          })
        }
      },
      methods: {
        getDepartments(){
          axios.get('api/department').then(({data}) => (this.departments = data.data));

      },
      editModal(dept){
      this.isEditMode = true;
      this.form.clear();
      this.form.reset();
      this.form.id = dept.id;
      this.form.departmentName = dept.dept_name;

      $('#addModal').modal('show');

    },
        showModal(){
        this.form.clear();
        this.form.reset();
        this.isEditMode = false;
        $('#addModal').modal('show');
      },
        uptDepartment(){
          Swal.fire({
            title: 'Are you sure?',
            text: "This employee's record will be deleted.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            confirmButtonText: 'Confirm'
          }).then((result) => {
            if (result.value) {
              this.form.put('api/department/'+ this.form.id).then((response) =>{
                Fire.$emit('refreshTable');
                toastr.success(response.data, 'Success!');
                $('#addModal').modal('hide');

              }).catch(() =>{
                toastr.error('Something went wrong.', 'Error!');

              });
            }
          });
        },
        addDepartment(){
          Swal.fire({
            title: 'Are you sure?',
            text: "This department will be added.",
            icon: 'info',
            showCancelButton: true,
            confirmButtonColor: '#6cb2eb',
            confirmButtonText: 'Confirm'
          }).then((result) => {
            if (result.value) {
              this.form.post('api/department').then(()=>{
                Fire.$emit('refreshTable');
                $('#addModal').modal('hide');
                toastr.success('New department added.', 'Success!');
              }).catch(()=>{
                // toastr.error('Something went wrong.', 'Error!');

              });
            }
          });
        },
        delDepartment(id){
          Swal.fire({
            title: 'Are you sure?',
            text: "This employee's record will be deleted.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            confirmButtonText: 'Confirm'
          }).then((result) => {
            if (result.value) {
                this.form.delete('api/department/' + id).then(()=>{
                  Fire.$emit('refreshTable');
                  toastr.success('errormsg', 'success!');
                }).catch(()=>{
                  toastr.error('errormsg', 'Error!');
                });
            }
          });
        }
      },
        created() {
            this.getDepartments();
            Fire.$on('refreshTable', () => {
              this.getDepartments()
            });
        },
    }
 </script>
