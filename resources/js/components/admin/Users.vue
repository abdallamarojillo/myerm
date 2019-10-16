<template>
    <div class="container pt-2">
        <div class="row justify-content-center">
          <!-- /.row -->
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Users</h3>
                  <div class="card-tools">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add-user-modal">
                      <i class="fa fa-user-plus"></i> Add User
                    </button>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0" style="height: 300px;">
                  <table class="table table-head-fixed">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Access Level</th>
                        <th>Designation</th>
                        <th>Date Registered</th>
                        <th>Edit</th>
                        <th>Delete</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="user in users" v-bind:key="user.id">
                        <td>{{user.id}}</td>
                        <td>{{user.name}}</td>
                        <td>{{user.email}}</td>
                        <td>{{user.access_level}}</td>
                        <td>{{user.designation}}</td>
                        <td>{{user.created_at | UserFriendlyDate}}</td>
                        <td>
                          <button type="button" class="btn btn-warning" @click="OpenEditUserModal(user)" data-toggle="modal" data-target="#edit-user-modal">
                            <i class="fa fa-edit"></i>
                          </button>
                       </td>
                       <td>
                         <button type="button" class="btn btn-danger" @click="DeleteUser(user.id)" >
                           <i class="fa fa-trash"></i>

                         </button>
                      </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
          </div>
          <!-- /.row -->

          <!-- start Add User Modal -->
          <div class="modal fade" id="add-user-modal" tabindex="-1" role="dialog" aria-labelledby="add-user-modal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
              <div class="modal-content">
                <form @submit.prevent="CreateUser">
                <div class="modal-header">
                  <h5 class="modal-title" id="add-user-modal">Add Users</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                      <label for="name">Name</label>
                      <input v-model="form.name" type="text" class="form-control" :class="{ 'is-invalid': form.errors.has('name') }"
                        id="name" aria-describedby="name" placeholder="Enter Name">
                        <has-error :form="form" field="name"></has-error>
                    </div>
                    <div class="form-group">
                      <label for="email">Email address</label>
                      <input v-model="form.email" type="email" class="form-control" :class="{ 'is-invalid':form.errors.has('email')}"
                       id="email" aria-describedby="email" placeholder="Enter email">
                       <has-error :form="form" field="email"></has-error>
                    </div>
                    <div class="form-group">
                      <label for="password">Password</label>
                      <input v-model="form.password" type="password" class="form-control" :class="{'is-invalid':form.errors.has('password')}"
                        id="password" placeholder="Password">
                        <has-error :form="form" field="password"></has-error>
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button :disabled="form.busy" type="submit" class="btn btn-primary">Save</button>
                </div>
                </form>
              </div>
            </div>
          </div>
          <!-- end of Add User modal -->

          <!-- start Edit User Modal -->
          <div class="modal fade" id="edit-user-modal" tabindex="-1" role="dialog" aria-labelledby="edit-user-modal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
              <div class="modal-content">
                <form @submit.prevent="EditUser()">
                <div class="modal-header">
                  <h5 class="modal-title" id="edit-user-modal">Edit User</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                      <label for="name">Name</label>
                      <input v-model="form.name" type="text" class="form-control" :class="{ 'is-invalid': form.errors.has('name') }"
                        id="name" aria-describedby="name" placeholder="Enter Name">
                        <has-error :form="form" field="name"></has-error>
                    </div>
                    <div class="form-group">
                      <label for="email">Email address</label>
                      <input v-model="form.email" type="email" class="form-control" :class="{ 'is-invalid':form.errors.has('email')}"
                       id="email" aria-describedby="email" placeholder="Enter email">
                       <has-error :form="form" field="email"></has-error>
                    </div>
                    <div class="form-group">
                      <label for="designation">Designation</label>
                      <input v-model="form.designation" type="text" class="form-control" :class="{ 'is-invalid':form.errors.has('designation')}"
                       id="designation" aria-describedby="designation" placeholder="Enter designation">
                       <has-error :form="form" field="designation"></has-error>
                    </div>
                    <div class="form-group">
                      <label for="access_level">Access Level</label>
                      <select v-model="form.access_level" class="form-control" :class="{ 'is-invalid': form.errors.has('access_level')}"
                        id="access_level">
                        <option value="admin">Admin</option>
                        <option value="superuser">Superuser</option>
                        <option value="standard">Standard</option>
                      </select>
                    </div>

                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button :disabled="form.busy" type="submit" class="btn btn-primary">Save</button>
                </div>
                </form>
              </div>
            </div>
          </div>
          <!-- end of Edit User modal -->
    </div>
</template>

<script>

    export default {
      data(){
        return {
          users: {},
          form: new Form({
            id:'',
            name: '',
            email: '',
            password: '',
            designation:'',
            access_level:'',
            remember: false
          })
        }
      },
      methods:{
        DisplayUsers(){
          axios.get('api/user').then(({ data})=> (this.users = data.data));
        },
        CreateUser(){
          this.$Progress.start()
            this.form.post('api/user')
            .then((response) => {
              Toast.fire({
                type: 'success',
                title: 'User Added Successfully'
              })
              this.$Progress.finish()
              $('#add-user-modal').modal('hide');
              Fire.$emit('AfterCreateUsers');
              this.form.reset();

            },
            (response) => {
              this.$Progress.fail()
                Toast.fire({
                  type: 'error',
                  title: 'Failed. Please check the errors and try again'
                })
            });



        },
        OpenEditUserModal(user){
          this.form.reset();
          this.form.fill(user);
        },

        EditUser(){
          this.$Progress.start()
            this.form.put('api/user/'+this.form.id)
            .then((response) => {
              Toast.fire({
                type: 'success',
                title: 'User Edited Successfully'
              })
              this.$Progress.finish()
              $('#edit-user-modal').modal('hide');
              Fire.$emit('AfterCreateUsers');
            },
            (response) => {
              this.$Progress.fail()
                Toast.fire({
                  type: 'error',
                  title: 'Failed. Please check the errors and try again'
                })
            });

        },
        DeleteUser(id){
          swalWithBootstrapButtons.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'YES, DELETE!',
            cancelButtonText: 'NO, KEEP!',
            reverseButtons: true
          }).then((result) => {
            if (result.value) {
              this.$Progress.start()
              this.form.delete('api/user/'+id)
              .then(()=>{
                this.$Progress.finish()
                Toast.fire({
                  type: 'success',
                  title: 'User Deleted Successfully'
                })
                Fire.$emit('AfterCreateUsers');
              })
              .catch(()=>{
                this.$Progress.fail()
                Toast.fire({
                  type: 'error',
                  title: 'Failed. An Error occured. Please try again'
                })
              })
            } else if (
              /* Read more about handling dismissals below */
              result.dismiss === Swal.DismissReason.cancel
            ) {
              swalWithBootstrapButtons.fire(
                'Cancelled',
                'User Not Deleted :)',
                'error'
              )
            }
          })
        },
      },
      created(){
        this.DisplayUsers();
        Fire.$on('AfterCreateUsers', ()=>{
          this.DisplayUsers();
        })
      },
      mounted() {
            console.log('Component mounted.')
      }
    }
</script>
