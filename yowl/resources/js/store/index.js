import Vue from "vue";
import Vuex from "vuex";
import axios from "axios";

Vue.use(Vuex);

const state = {
    users: [],
    categories: [],
    posts: [],
    comments: [],
    postsByCat: [],
    currentUserPosts: [],
    currentPost: {},
    currentCategory: {},
    currentUser: {},
    currentComment: {},
    currentCatId: "",
    showPost: false,
    fixedNav: true,
    showForm: false
};

export default new Vuex.Store({
    state,
    actions: {
        fetchPosts({ state }) {
            axios.get("api/posts").then(res => {
                state.posts = res.data;
            });
        },

        fetchCats({ state }) {
            axios.get("api/categories").then(res => {
                // console.log(res);
                state.categories = res.data;
            });
        },

        fetchUsers({ state }) {
            axios.get("api/users").then(res => {
                // console.log(res);
                state.users = res.data;
            });
        },

        fetchComments({ state }) {
            axios.get("/api/comments").then(res => {
                state.comments = res.data;
                // console.log(state.comments);
            });
        },

        updateVotes({ state }) {
            let id = state.currentPost.id;
            // console.log("post id :" + id);
            axios
                .put("api/post/" + id, { post: state.currentPost })
                .then(res => {
                    console.log(res);
                    state.posts = res.data;
                });
        },

        createCat({ state }) {
            axios
                .post("/api/category/store", {
                    category: state.currentCategory
                })
                .then(res => {
                    console.log(res);
                })
                .then(location.reload())
                .catch(error => {
                    console.log(error);
                });
        },

        deleteCat({ state }) {
            axios
                .delete(`/api/category/${state.currentCategory.id}`)
                .then(response => {
                    let i = state.categories
                        .map(item => item.id)
                        .indexOf(state.currentCategory.id); // find index of your object
                    state.categories.splice(i, 1);
                })
                .catch(function(err) {
                    console.log(err);
                });
        },

        deleteCom({ state }) {
            axios
                .delete(`/api/comment/${state.currentComment.id}`)
                .then(response => {
                    let i = state.comments
                        .map(item => item.id)
                        .indexOf(state.currentComment.id); // find index of your object
                    state.comments.splice(i, 1);
                })
                .catch(function(err) {
                    console.log(err);
                });
        },

        deleteUser({ state }) {
            axios
                .delete(`/api/user/${state.currentUser.id}`)
                .then(response => {
                    let i = state.users
                        .map(item => item.id)
                        .indexOf(state.currentUser.id); // find index of your object
                    state.users.splice(i, 1);
                })
                .catch(function(err) {
                    console.log(err);
                });
        },

        updateCat({ state }) {
            axios
                .put(`/api/category/${state.currentCategory.id}`, {
                    category: state.currentCategory
                })
                .then(response => {
                    console.log(response);
                })
                .then(location.reload())
                .catch(error => {
                    console.log(error);
                });
        },

        fetchPostsByCat({ state }) {
            console.log(state.currentCatId);
            axios.get(`/api/posts/${state.currentCatId}`).then(res => {
                console.log(res.data);
                state.postsByCat = res.data;
            });
        },

        addUser({ state }) {
            console.log(state.currentUser);
            axios
                .post("http://localhost:8000/api/user/store", state.currentUser)
                .then(
                    response => (
                        console.log(response.data),
                        alert("The user has been created")
                    )
                )
                .catch(error => console.log(error))
                .finally(() => (this.loading = false));
        },

        fetchPostsByUserId({ state }) {
            axios.get("api/categories").then(res => {
                // console.log(res);
                state.categories = res.data;
            });

            axios
                .get("api/posts")
                .then(res => {
                    state.posts = res.data;
                })
                .then(() => {
                    for (let i = 0; i < state.posts.length; i++) {
                        // console.log(state.posts[i]);
                        if (state.posts[i].user_id === state.currentUser.id) {
                            state.currentUserPosts.push(state.posts[i]);
                        }
                    }
                });
        },

        createPost({}, newPost) {
            // console.log("testing : " + newPost.content);
            let formData = new FormData()

            for (const [key, value] of Object.entries(newPost)) {
                formData.append(key,value)
              }
                axios.post('/api/post/store', formData, {
                    headers: {
                      'Content-Type': "multipart/form-data; charset=utf-8;"
                    }
                  })
                .then(res => {
                    console.log(res);
                })
                .then(location.reload())
                .catch(error => {
                    console.log(error);
                });
        },

        deletePost({ state }, postId) {
            axios
                .delete(`/api/post/${postId}`)
                .then(response => {
                    let i = state.posts
                        .map(item => item.id)
                        .indexOf(state.currentPost.id); // find index of your object
                    state.posts.splice(i, 1);
                })
                .then(location.reload())
                .catch(function(err) {
                    console.log(err);
                });
        },

        updateUser({ state }) {
            axios
                .put(`/api/user/${state.currentUser.id}`, {
                    user: state.currentUser
                })
                .then(response => {
                    console.log(response);
                })
                .then(location.reload())
                .catch(error => {
                    console.log(error);
                });
        }
    }
});
