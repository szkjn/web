<template>
   <div>
	   <transition name="modal">
      <div class="card-mask">
        <div class="card-wrapper">
          <div class="card-container" v-on-clickaway="hidePostDetails">
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
			<form @submit.prevent="updateCategory">
				<div class="modal-header">						
					<h4 class="modal-title">Edit Category</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				</div>
				<div class="modal-body">					
					<div class="form-group">
						<label>Name</label>
						 <input class="form-control" type="text" name="name" v-model="category.name">
						 
					</div>				
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default"  value="Cancel">
					<input type="submit" class="btn btn-info" value="Save">
				</div>
			</form>
			</body>
          </div>
        </div>
      </div>
    </transition>
	</div>
    	
</template>

<script>
    export default {

		name: 'UpdateCat',

        data() {
            return {
              category: Object,
            }
        },
         created() {
            //  axios
            //      .get(`/api/categories`)
            //      .then((response) => {
		 	// 	   this.category.name = response.data.filter((category) => category.id == this.catId)[0].name;
			// 		this.category.id = this.catId
            //     });

				console.log(this.category)
         },
         methods: {

     updateCategory(e) {
				 e.preventDefault()
				if(!this.category.name){
				alert('Please add a note')
				return
				}

				this.$emit('updateCat')
				
             }
         }
    }
</script>

