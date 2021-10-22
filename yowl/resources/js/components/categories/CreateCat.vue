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
			<form @submit="addNewCategory" method="POST" class="catForm">
				<div class="modal-header">						
					<h4 class="modal-title">Create Category</h4>
				</div>
				<div class="modal-body">					
					<div class="form-group">
						<label>Name</label>
						 <input class="form-control" type="text" name="name" v-model="category.name">
					</div>				
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default"  value="Cancel" @click="$emit('hideForm')">
					<input type="submit" class="btn btn-info" value="Save" >
				</div>
			</form>
			<router-view></router-view>
			</body>
          </div>
        </div>
      </div>
    </transition>
	</div>
    	
</template>

<script>
import { mixin as clickaway } from "vue-clickaway";


export default {
	 mixins: [clickaway],
	name: 'CreateCat',

	data(){
		return{
			category :{
				name: ''
			}	
		}
	},
	methods:{

	async addNewCategory(e){

		e.preventDefault()

         if(!this.category.name){
           alert('Please add a name')
           return
           }
		this.$store.state.currentCategory = this.category
        this.$store.dispatch('createCat')
		 alert('The category has been created')
			this.$emit('catSaved')
		this.category.name = ''
    },

    }

}

</script>

<style scoped>
body {
  background: #ddd;
}
a {
  color: #666;
}
a:hover {
  cursor: pointer;
  color: #333;
}
h2,
.title {
  font-size: 1.4rem;
  padding: 0;
  margin: 0;
}
svg {
  width: 25px;
}
#close svg {
  position: absolute;
  width: 35px;
  color: #eee;
}
#close svg:hover {
  cursor: pointer;
  color: #ccc;
}

.card-mask {
  position: fixed;
	z-index: 9998;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5);
  display: table;
  transition: opacity 0.3s ease;
}

.card-wrapper {
  display: table-cell;
  vertical-align: middle;
  height: auto;
}

.card-container {
  width: 92vw;
  max-width: 750px;
  margin: 10px auto;
  background-color: #fff;
  border-radius: 3px;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.33);
  transition: all 0.3s ease;
  font-family: Helvetica, Arial, sans-serif;
  height: auto;
  overflow-y: scroll;
}

/* Hide scrollbar for Chrome, Safari and Opera */
.card-container::-webkit-scrollbar {
  display: none;
}

/* Hide scrollbar for IE, Edge and Firefox */
.card-container {
  -ms-overflow-style: none; /* IE and Edge */
  scrollbar-width: none; /* Firefox */
}

header {
  background: orange;
  height: 120px;
  opacity: 0.5;
  display: flex;
  flex-direction: row-reverse;
}

body {
  background-color: inherit;
  /* padding: 20px 10px; */
}

.card-title {
  display: flex;
  align-items: center;
  text-align: left;
  font-weight: bold;
  font-size: 1.25rem;
}

.card-comment-header {
  display: flex;
  align-items: center;
}

/*
 * The following styles are auto-applied to elements with
 * transition="card" when their visibility is toggled
 * by Vue.js.
 *
 * You can easily play with the card transition by editing
 * these styles.
 */

.card-enter {
  opacity: 0;
}

.card-leave-active {
  opacity: 0;
}

.card-enter .card-container,
.card-leave-active .card-container {
  -webkit-transform: scale(1.1);
  transform: scale(1.1);
}

.catform{
    margin: 2rem 0 !important;
}
</style>