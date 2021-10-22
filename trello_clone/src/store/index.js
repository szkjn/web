import { createStore } from "vuex";

// enter USERNAME and PASSWORD

const WPAPI = require("wpapi");
const wp = new WPAPI({
  endpoint: "http://localhost/blog/index.php/wp-json",
  username: '',
  password: '',
  auth: true,
});

export default createStore({
  state: {
    lists: [],
    cards: [],
    comments: [],
    showCard: false,
    showActions: false,
    currentCard: null,
    currentList: null,
    currentCategory: null,
    newComment: null,
    currentComments: null,
    currentComment: null,
  },
  getters: {
    getCardsByList: (state) => (id) => {
      return state.cards.filter((card) => !card.categories.indexOf(id));
    },
    getList: (list) => {
      return this.state.cards.value.filter((card) => card.list == list);
    },
  },
  mutations: {
    setLists(state, lists) {
      state.lists = lists;
    },
    setCards(state, cards) {
      state.cards = cards;
    },
    setComments(state, comments) {
      state.comments = comments;
    },
  },
  actions: {
    getLists({ commit }) {
      return new Promise((resolve) => {
        wp.categories()
          .order("asc")
          .orderby("id")
          .then((data) => {
            commit("setLists", data);
            // console.log(data);
          })
          .catch(function(err) {
            console.log(err.message);
          });
        resolve();
      });
    },
    addList(context, list) {
      return new Promise((resolve) => {
        wp.categories()
          .create({
            name: list.name,
            slug: list.name.toLowerCase,
            status: "publish",
          })
          .then(function(response) {
            console.log(response.id);
            context.dispatch("getLists");
          });
        resolve();
      });
    },
    getCards({ commit }) {
      return new Promise((resolve) => {
        wp.posts()
          .order("asc")
          .orderby("id")
          .perPage(100)
          .then((data) => {
            commit("setCards", data);
            // console.log("What is it");
            //         console.log(data);
          })
          .catch(function(err) {
            console.log(err.message);
          });
        resolve();
      });
    },
    addCardToList(context, card) {
      return new Promise((resolve) => {
        console.log(card.listId);
        wp.posts()
          .create({
            title: card.title,
            content: card.content,
            categories: card.listId,
            status: "publish",
          })
          .then(function(response) {
            console.log(response.id);
            context.dispatch("getCards");
          });
        resolve();
      });
    },
    deleteCard() {
      return new Promise((resolve) => {
        console.log(this.state.currentCard.id);

        wp.posts()
          .id(this.state.currentCard.id)
          .delete()
          .then(function(response) {
            console.log(response.id);
          });
        resolve();
      });
    },
    deleteList() {
      return new Promise((resolve) => {
        // console.log(this.state.currentList);
        wp.posts()
          .categories(this.state.currentList.id)
          .then(function(response) {
            for (let i = 0; i < response.length; i++) {
              console.log(response[i].id);
              wp.posts()
                .id(response[i].id)
                .delete()
                .then(function(response) {
                  console.log(response.id);
                });
            }
          });
        wp.categories()
          .id(this.state.currentList.id)
          .param({ force: true })
          .delete()
          .then(location.reload())
          .then(function(response) {
            console.log(response.id);
          });
        resolve();
      });
    },
    updateList() {
      return new Promise((resolve) => {
        // console.log(this.state.currentList);
        wp.categories()
          .id(this.state.currentList.id)
          .update({
            name: this.state.currentList.name,
          })
          .then(function(response) {
            console.log(response.id);
          });
        resolve();
      });
    },
    updateCardTitle() {
      return new Promise((resolve) => {
        wp.posts()
          .id(this.state.currentCard.id)
          .update({
            title: this.state.currentCard.title.rendered,
          })
          .then(function(response) {
            console.log(response.id);
          });
        resolve();
      });
    },
    updateCardDesc() {
      return new Promise((resolve) => {
        wp.posts()
          .id(this.state.currentCard.id)
          .update({
            content: this.state.currentCard.content.rendered,
          })
          .then(function(response) {
            console.log(response.id);
          });
        resolve();
      });
    },
    updateCardCategorie() {
      return new Promise((resolve) => {
        wp.posts()
          .id(this.state.currentCard.id)
          .update({
            categories: this.state.currentCategory,
          })
          .then(function(response) {
            console.log(response.id);
          })
          .then(location.reload());
        resolve();
      });
    },
    addCommentToCard() {
      return new Promise((resolve) => {
        console.log();
        wp.comments()
          .param({ post: this.state.currentCard.id })
          .create({
            content: this.state.newComment,
            status: "publish",
          })
          .then(location.reload())
          .then(function(response) {
            console.log(response.id);
          });
        resolve();
      });
    },
    getCommentsByPost({ commit }) {
      return new Promise((resolve) => {
        wp.comments()
          .param({ post: this.state.currentCard.id })
          .order("asc")
          .orderby("id")
          .then((data) => {
            commit("setComments", data);
          })
          .catch(function(err) {
            console.log(err.message);
          });
        resolve();
      });
    },
    editComment() {
      return new Promise((resolve) => {
        wp.comments()
          .id(this.state.currentComment.id)
          .update({
            content: this.state.currentComment.content.rendered,
          })
          .then(function(response) {
            console.log(response.id);
          });
        resolve();
      });
    },
    deleteComment() {
      return new Promise((resolve) => {
        wp.comments()
          .id(this.state.currentComment.id)
          .delete()
          .then(function(response) {
            console.log(response.id);
          })
          .then(location.reload());
        resolve();
      });
    },
  },
  modules: {},
});
