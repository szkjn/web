<template>
    <div>
         <transition name="modal">
      <div class="card-mask">
        <div class="card-wrapper">
          <div class="card-container">
            <body class="d-flex flex-column">
              <div>
                <div @click="$emit('hideForm')" id="close">
                  <svg
                    class="m-2"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"
                    />
                  </svg>
                </div>
              </div>
         <h3 class="text-center userAdd">Add user</h3>
        <div class="row userForm">
            <div class="col-md-6">
                <form @submit.prevent="addUser">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" v-model="user.name">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" v-model="user.email">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="text" class="form-control" v-model="user.password">
                    </div>
                    <div class="form-group">
                        <label>Admin</label>
                        <input type="text" class="form-control" v-model="user.is_admin">
                    </div>
                    <div class="d-flex addButton">
                    <input type="button" class="btn btn-default"  value="Cancel" @click="$emit('hideForm')">
					<input type="submit" class="btn btn-info" value="Save" >
                    </div>
                </form>
            </div>
        </div>
         </body>
          </div>
        </div>
      </div>
    </transition>
    </div>
</template>

<script>
    export default {

        name: 'CreateUser',

        data() {
            return {
                user: {},
            }
        },
        methods: {
            addUser() {
                this.$store.state.currentUser = this.user
                this.$store.dispatch('addUser')
                this.$emit('userSaved')
                this.user.name = '',
                this.user.email = '',
                this.user.password = '',
                this.user.is_admin = ''
            }
        }
    }
</script>