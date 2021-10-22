<template>
  <div>
    
      <div class="container">
         <div class="album d-flex"> 
        <div class="content d-flex flex-column container">
        <div
          v-for="post in $store.state.postsByCat"
          :key="post.id"
          class="card card-body mb-2 p-0"
        >
          <Post :post="post"/>
        </div>
        </div>
      
       
      </div>
       
    </div>
  </div>
</template>

<script>
import Post from '../posts/Post.vue'
//import AsideCategories from "../home/AsideCategories.vue";

export default{
 
  name: "Posts",
  components: {
    Post,
   //AsideCategories,
  },
    data(){
    return{
      q:''
    }
  },
  created() {
    this.$store.state.currentCatId = this.$route.params.id;
    this.$store.dispatch("fetchPostsByCat")
    
  },
  methods:{
    
  }
  
};
</script>
