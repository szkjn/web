<template>
   <div>
			<form @submit.prevent="updateUser">
				<div class="modal-header">						
					<h4 class="modal-title">Edit user</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				</div>
				<div class="modal-body">					
					<div class="form-group">
						<label>Name</label>
						 <input class="form-control" type="text" name="name" v-model="user.name">
						<label>Email</label>
						 <input class="form-control" type="text" name="name" v-model="user.email">
                        <label>Password</label>
						 <input class="form-control" type="text" name="name" v-model="user.password">
                        <label>Admin</label>
						 <input class="form-control" type="text" name="name" v-model="user.is_admin">
					</div>				
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default"  value="Cancel">
					<input type="submit" class="btn btn-info" value="Save">
				</div>
			</form>
	</div>
    	
</template>

<script>
  
    export default {
        data() {
            return {
                user: {
					name: '',
                    email: '',
                    password:'',
                    is_admin: '',
				},
				userId: this.$route.params.id,
		
            }
        },
         created() {
             axios
                 .get(`/api/users`)
                 .then((response) => {
                    // this.user = response.data;
		 		   this.user = response.data.filter((user) => user.id == this.userId)[0];
                      //console.log(response.data);
                });
         },
         methods: {

        
         }
    }
</script>

