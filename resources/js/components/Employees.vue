<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
              <br>
              <h5>Employees</h5>
              <hr>
                 <table id="example1" class="table table-bordered table-striped">
                   <thead>
                   <tr>
                     <th>Employee ID</th>
                     <th>Name</th>
                     <th>Department(s)</th>
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
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
