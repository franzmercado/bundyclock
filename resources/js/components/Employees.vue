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
                  <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#addModal"><i class="fas fa-user-plus"> Add Employee </i></button>
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
      <form @submit.prevent="addEmployee" >
      <div class="modal-body">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label class="mb-0" for="employeeID">Employee ID:</label>
                <input v-model="form.employeeID" type="text" name="employeeID"
                        class="form-control" :class="{ 'is-invalid':
                        form.errors.has('employeeID') }">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label class="mb-0" for="department">Department:</label>
              <select v-model="form.department" name="department" class="form-control" >
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
              <label class="mb-0" for="first_name">Firstname:</label>
                <input v-model="form.first_name" type="text" name="first_name"
                        class="form-control" :class="{ 'is-invalid':
                        form.errors.has('first_name') }">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label class="mb-0" for="middle_name">Middlename:</label>
                <input v-model="form.middle_name" type="text" name="middle_name"
                        class="form-control" :class="{ 'is-invalid':
                        form.errors.has('middle_name') }">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label class="mb-0" for="last_name">Lastname:</label>
                <input v-model="form.last_name" type="text" name="last_name"
                        class="form-control" :class="{ 'is-invalid':
                        form.errors.has('last_name') }">
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label class="mb-0" for="employeeID">Suffix:</label>
                  <select v-model="form.suffix" class="form-control" name="suffix">
                          <option value=""></option>
                          <option value="Jr">Jr</option>
                          <option value="Sr">Sr</option>
                          <option value="II">II</option>
                          <option value="III">III</option>
                          <option value="1">Other</option>

                  </select>
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label class="mb-0" for="specify">Specify:</label>
                <input v-model="form.specify" type="text" name="employeeID"
                        class="form-control" :class="{ 'is-invalid':
                        form.errors.has('specify') }">
            </div>
          </div>
        </div>
        <div class="row">

          <div class="col-md-6">
            <div class="form-group">
              <label class="mb-0" for="Shift">Shift:</label>
                  <select v-model="form.Shift" class="form-control" name="Shift">
                          <option value=""></option>
                          <option value="1">8:00am to 5:00pm</option>
                          <option value="2">6:00am to 3:00pm</option>
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
  </div>
    </div>
</template>

<script>
    export default {
      data(){
        return {
          form: new Form({
            employeeID : '',
            first_name : '',
            middle_name : '',
            last_name : '',
            suffix : '',
            gender : '',
            department : '',
            shift : ''
          })
        }
      },
      methods: {
        addEmployee(){
          this.form.post('api/employee');
        }
      },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
