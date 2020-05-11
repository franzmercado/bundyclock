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
                  <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#addModal"><i class="fas fa-plus"> New </i></button>
                </div>
              </div>
              <hr>
                 <table id="employee_tbl" class="table table-bordered table-striped">
                   <thead>
                   <tr>
                     <th>ID</th>
                     <th>Department Name</th>
                     <th>Action</th>
                   </tr>
                   </thead>
                   <tbody>
                  <tr v-for="employee in employees">
                    <td>{{employee.employeeID}}</td>
                    <td>{{employee.employeeID}}</td>
                    <td>
                      <a href="#"><i class="fa fa-edit fa-lg cyan"></i></a>
                      <a href="#" v-on:click="delEmployee(employee.id)"><i class="fa fa-trash-alt fa-lg red"></i></a>

                    </td>

                  </tr>
                   </tbody>
                 </table>
            </div>
        </div>
  <!--Add Modal -->
  <!-- <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addModalLabel">Add Employee</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form @submit.prevent="addEmployee" @keydown="form.onKeydown($event)" >
      <div class="modal-body">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label class="mb-0" for="employeeID"><font color="red">*</font>Employee ID:</label>
                <input v-model="form.employeeId" type="text" name="employeeId"
                        class="form-control" :class="{ 'is-invalid':
                        form.errors.has('employeeId') }">
                        <has-error :form="form" field="employeeId"></has-error>

            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label class="mb-0" for="department"><font color="red">*</font>Department:</label>
              <select v-model="form.department" name="department"
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
                <input v-model="form.firstname" type="text" name="firstname"
                        class="form-control" :class="{ 'is-invalid':
                        form.errors.has('firstname') }">
                        <has-error :form="form" field="firstname"></has-error>

            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label class="mb-0" for="middlename">Middlename:</label>
                <input v-model="form.middlename" type="text" name="middlename"
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
                <input v-model="form.lastname" type="text" name="lastname"
                        class="form-control" :class="{ 'is-invalid':
                        form.errors.has('lastname') }">
                        <has-error :form="form" field="lastname"></has-error>

            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label class="mb-0" for="employeeID">Suffix:</label>
              <select v-on:change="showSpecify" v-model="form.suffix" name="suffix"
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
                <input v-model="form.specify" type="text" name="employeeID"
                        class="form-control" :class="{ 'is-invalid':
                        form.errors.has('specify') }">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-3">
            <div class="form-group">
              <label class="mb-0" for="Gender"><font color="red">*</font>Gender:</label>
                  <select v-model="form.gender" name="gender"
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
              <select v-model="form.shift" name="shift"
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
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
      </form>
    </div>
  </div>
  </div> -->
    </div>
</template>

// <script>
//     export default {
//       data(){
//         return {
//           employees : {},
//           form: new Form({
//             employeeId : '',
//             firstname : '',
//             middlename : '',
//             lastname : '',
//             suffix : '',
//             gender : '',
//             department : '',
//             shift : ''
//           }),
//           pickOther : false
//         }
//       },
//       methods: {
//         getEmployees(){
//           axios.get('api/employee').then(({data}) => (this.employees = data.data));
//       },
//         showSpecify(){
//           if(this.form.suffix == 1){
//             this.pickOther = true;
//           }else{
//             this.pickOther = false;
//           }
//         },
//         addEmployee(){
//           this.form.post('api/employee').then(()=>{
//             Fire.$emit('refreshTable');
//             $('#addModal').modal('hide');
//             toastr.success('errormsg', 'success!');
//           });
//         },
//         delEmployee(id){
//           Swal.fire({
//             title: 'Are you sure?',
//             text: "This employee's record will be deleted.",
//             icon: 'warning',
//             showCancelButton: true,
//             confirmButtonColor: '#d33',
//             confirmButtonText: 'Confirm'
//           }).then((result) => {
//             if (result.value) {
//                 this.form.delete('api/employee/' + id).then(()=>{
//                   Fire.$emit('refreshTable');
//                   toastr.success('errormsg', 'success!');
//                 }).catch(()=>{
//                   toastr.error('errormsg', 'Error!');
//                 });
//             }
//           });
//         }
//       },
//         created() {
//             this.getEmployees();
//             Fire.$on('refreshTable', () => {
//               this.getEmployees()
//             });
//         },
//     }
// </script>
