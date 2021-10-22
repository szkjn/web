<template>
<div class="comment-box">
    <span class="comment-author">
        <b>{{ getUserName(comments.users_id)}}</b>
    </span>
    <div class="comment-text">
        {{comments.comment}}
    </div>
    <div class="comment-footer">
        <div class= "comment-vote">
            <div>
                <svg @click="voteComment(comments.id,'up')"
                    fill="white"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    class="thumb up"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="1"
                        d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5"
                    />
                
                </svg> 
            </div>
            <div>
                <p class="font-weight-bold my-0 disable-select" id="vote">
                    {{ comments.votes }}
                </p>
            </div>
            <div>
                <svg @click="voteComment(comments.id,'down')"
                    fill="white"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    class="thumb down"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="1"
                        d="M10 14H5.236a2 2 0 01-1.789-2.894l3.5-7A2 2 0 018.736 3h4.018a2 2 0 01.485.06l3.76.94m-7 10v5a2 2 0 002 2h.096c.5 0 .905-.405.905-.904 0-.715.211-1.413.608-2.008L17 13V4m-7 10h2m5-10h2a2 2 0 012 2v6a2 2 0 01-2 2h-2.5"
                    />
                </svg>
            </div>
        </div>
    </div>
</div>
</template>

<script>

export default {

    name: "Comment",

    props: {
        comments: Object,
    },

    computed: {
         
    },

    methods: {
       getUserName(id){
            let e = this.$store.state.users
            // console.log(this.userId)
            return e.find((user)=>user.id==id).name

        },
        voteComment(commentId, voteType) {
            if(voteType=="up"){
                this.comments.votes++
            };
            if(voteType=="down"){
                this.comments.votes--
            };
            axios
                .put("/api/comment/" + voteType + "/"+ commentId, {
                    users_id: "2", })
                .then(res => {
                    console.log(res);
                });     
        },
    },
}

</script>
<style scoped>
    .comment-box{
        
        margin:10px;
    }
    .comment-text{

        border-left: #5846DA solid 0.5px;
        padding:  10px 0  10px 10px;
        
    }
    .comment-vote{
        display:flex;
        opacity: 0.8;
    }

    #vote {
        color:#5846DA;
    }
    
    .comment-author{
        color: #5846DA;
    }

    #big svg {
        width: 22px;
        cursor: pointer;
    }
</style>
