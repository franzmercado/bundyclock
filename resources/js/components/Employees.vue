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
                  <button type="button" class="btn btn-primary " v-on:click="showModal"><i class="fas fa-user-plus"> Add Employee </i></button>
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
                  <tr v-for="employee in employees">
                    <td>{{employee.employeeID}}</td>
                    <td>{{employee.first_name}}</td>
                    <td>{{employee.dept_name}}</td>
                    <td>{{employee.employeeID}}</td>
                    <td>
                      <a href="#" v-on:click="editModal(employee)"><i class="fa fa-edit fa-lg cyan"></i></a>
                      <a href="#" v-on:click="delEmployee(employee.id)"><i class="fa fa-trash-alt fa-lg red"></i></a>

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
        <h5 v-show="!isEditMode" class="modal-title" id="addModalLabel">Add Employee</h5>
        <h5 v-show="isEditMode" class="modal-title" id="addModalLabel">Edit Employee's Info</h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form @submit.prevent="isEditMode ? uptEmployee() : addEmployee()" @keydown="form.onKeydown($event)" >
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            <input type="file" name="prof" v-on:change="uploadProfile" value="">

          </div>
        </div>
        <br>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label class="mb-0" for="employeeID"><font color="red">*</font>Employee ID:</label>
                <input v-model="form.employeeId" type="text" name="employeeId" id="employeeId"
                        class="form-control" :class="{ 'is-invalid':
                        form.errors.has('employeeId') }">
                        <has-error :form="form" field="employeeId"></has-error>

            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label class="mb-0" for="department"><font color="red">*</font>Department:</label>
              <select v-model="form.department" name="department" id="department"
              class="form-control" :class="{ 'is-invalid':
              form.errors.has('department') }">
                      <option value=""></option>
                      <option value="1">HR</option>
                      <option value="2">IT</option>
                      <option value="3">Sales</option>
              </select>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label class="mb-0" for="first_name"><font color="red">*</font>Firstname:</label>
                <input v-model="form.firstname" type="text" name="firstname" id="firstname"
                        class="form-control" :class="{ 'is-invalid':
                        form.errors.has('firstname') }">
                        <has-error :form="form" field="firstname"></has-error>

            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label class="mb-0" for="middlename">Middlename:</label>
                <input v-model="form.middlename" type="text" name="middlename" id="middlename"
                        class="form-control" :class="{ 'is-invalid':
                        form.errors.has('middlename') }">
                        <has-error :form="form" field="middlename"></has-error>

            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label class="mb-0" for="lastname"><font color="red">*</font>Lastname:</label>
                <input v-model="form.lastname" type="text" name="lastname" id="lastname"
                        class="form-control" :class="{ 'is-invalid':
                        form.errors.has('lastname') }">
                        <has-error :form="form" field="lastname"></has-error>

            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label class="mb-0" for="employeeID">Suffix:</label>
              <select v-on:change="showSpecify" v-model="form.suffix" name="suffix" id="suffix"
              class="form-control" :class="{ 'is-invalid':
              form.errors.has('suffix') }">
                      <option value=""></option>
                      <option value="Jr">Jr</option>
                      <option value="Sr">Sr</option>
                      <option value="II">II</option>
                      <option value="III">III</option>
                      <option value="1">Other</option>
              </select>
                <has-error :form="form" field="suffix"></has-error>
            </div>
          </div>
          <div class="col-md-3">
            <div v-show="pickOther" class="form-group">
              <label class="mb-0" for="specify">Specify:</label>
                <input v-model="form.specify" type="text" name="specify" id="specify"
                        class="form-control" :class="{ 'is-invalid':
                        form.errors.has('specify') }">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-3">
            <div class="form-group">
              <label class="mb-0" for="Gender"><font color="red">*</font>Gender:</label>
                  <select v-model="form.gender" name="gender" id="gender"
                  class="form-control" :class="{ 'is-invalid':
                  form.errors.has('gender') }">
                        <option value=""></option>
                        <option value="0">Female</option>
                        <option value="1">Male</option>
                  </select>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label class="mb-0" for="Shift"><font color="red">*</font>Shift:</label>
              <select v-model="form.shift" name="shift" id="shift"
              class="form-control" :class="{ 'is-invalid':
              form.errors.has('shift') }">
                    <option value=""></option>
                    <option value="1">8:00am to 5:00pm (M T W TH F)</option>
                    <option value="2">6:00am to 3:00pm (T W TH F S)</option>
              </select>
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
          employees : {},
          form: new Form({
            id : '',
            employeeId : '',
            firstname : '',
            middlename : '',
            lastname : '',
            suffix : '',
            gender : '',
            department : '',
            shift : ''
          }),
          pickOther : false,
          isEditMode: false
        }
      },
      methods: {
        getEmployees(){
          axios.get('api/employee').then(({data}) => (this.employees = data.data)).catch(()=>{
            console.log('error');
          });
      },
      uploadProfile(e){
        // console.log(e);
        let file = e.files[0];
        // console.log(file);
      },
        editModal(emp){
        this.isEditMode = true;
        this.form.clear();
        this.form.reset();
        // this.form.fill(emp);
        this.form.employeeId = emp.employeeID;
        this.form.id = emp.id;

        this.form.firstname =  emp.first_name;
        this.form.middlename = emp.middle_name;
        this.form.lastname = emp.last_name;
        if (emp.suffix != null) {
          if(emp.suffix == 'Jr' || emp.suffix == 'Sr' || emp.suffix == 'II' || emp.suffix == 'III'){
            this.form.suffix = emp.suffix;
            this.pickOther = false;
          }else{
            this.form.suffix = 1;
            this.form.specify = emp.suffix;
            this.pickOther = true;
          }
        }else {
          this.form.suffix = emp.suffix;
          this.pickOther = false;

        }
        this.form.gender = emp.gender;
        this.form.department = emp.dept_id;
        this.form.shift= emp.shift;

        $('#addModal').modal('show');

      },
      showModal(){
        this.form.clear();
        this.form.reset();
        this.isEditMode = false;
        this.pickOther = false;
        $('#addModal').modal('show');
      },
        showSpecify(){
          if(this.form.suffix == 1){
            this.pickOther = true;
          }else{
            this.pickOther = false;
          }
        },
        addEmployee(){
          Swal.fire({
            title: 'Are you sure?',
            text: "This will store employee's record.",
            icon: 'info',
            showCancelButton: true,
            confirmButtonColor: '#6cb2eb',
            confirmButtonText: 'Confirm'
          }).then((result) => {
            if (result.value) {
              this.form.post('api/employee').then(()=>{
                Fire.$emit('refreshTable');
                $('#addModal').modal('hide');
                toastr.success('New employee added.', 'Success!');
              }).catch(()=>{
                toastr.error('Something went wrong.', 'Error!');

              });
            }
          });

        },
        delEmployee(id){
          Swal.fire({
            title: 'Are you sure?',
            text: "This employee's record will be deleted.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            confirmButtonText: 'Confirm'
          }).then((result) => {
            if (result.value) {
                this.form.delete('api/employee/' + id).then((response)=>{
                  Fire.$emit('refreshTable');
                  toastr.success(response.data, 'Success!');
                }).catch(()=>{
                  toastr.error('Something went wrong.', 'Error!');
                });
            }
          });
        },
        uptEmployee(){
          Swal.fire({
            title: 'Are you sure?',
            text: "This will save changes.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            confirmButtonText: 'Confirm'
          }).then((result) => {
            if (result.value) {
              this.form.put('api/employee/'+ this.form.id).then((response) =>{
                Fire.$emit('refreshTable');
                toastr.success(response.data, 'Success!');
                $('#addModal').modal('hide');

              }).catch(() =>{
                toastr.error('Something went wrong.', 'Error!');

              });
            }
          });


        }

      },
        created() {
            this.getEmployees();
            Fire.$on('refreshTable', () => {
              this.getEmployees()
            });
        },
    }
</script>
