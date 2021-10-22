<template>
    
        <div class="input-group rounded">
                    <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search"
                      aria-describedby="search-addon" v-model="q"/>
                    <span class="input-group-text border-0" id="search-addon">
                      <i class="fas fa-search"></i>
                    </span>
        </div>

</template>

<script>

export default {

   data(){
    return{
    posts:[],
      q:''
    }
  },

  mounted(){ 
      this.$store.state.quest = this.q
  },
  computed:{
      getList(){
           return this.$store.state.posts.filter(post=>{
               return post.title.toLowerCase().includes(this.q.toLowerCase())
           })
      },  
  },
  method: {
  
  }
}

</script>