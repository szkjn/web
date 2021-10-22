<template>
  <div v-if="$store.state.currentCard !== null">
    <transition name="modal">
      <div class="card-mask">
        <div class="card-wrapper">
          <div class="card-container">
            <header>
              <div @click="hideCardById" class="close">
                <svg
                  @click="toggleListForm"
                  class="button cancel h-6 w-6"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M6 18L18 6M6 6l12 12"
                  />
                </svg>
              </div>
            </header>
            <body>
              <div class="card-title">
                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"
                  />
                </svg>
                <h2
                  name="header"
                  v-if="!titleClicked"
                  @click="titleClicked = true"
                >
                  {{ strippedTitle }}
                </h2>
                <input
                  v-else
                  type="text"
                  name="newTitle"
                  v-model="newTitle"
                  v-click-away="onClickAway"
                  @keyup.enter="
                    updateTitle();
                    titleClicked = false;
                  "
                  class="title"
                />
              </div>

              <div class="in-list">
                in list <a href="#">{{ $store.state.currentList.name }}</a>
              </div>

              <div class="card-description">
                <div class="card-description-header">
                  <svg fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M4 6h16M4 12h16M4 18h7"
                    />
                  </svg>
                  <h3>Description</h3>
                  <button @click="toggleEdit" id="edit">Edit</button>
                </div>

                <div v-show="showEdit" class="card-edit">
                  <div>
                    <textarea
                      type="text"
                      name="cardDescription"
                      v-model="cardDescription"
                    ></textarea>
                  </div>
                  <div class="card-edit-buttons">
                    <button @click="updateCardDesc" id="save">Save</button>
                    <svg
                      @click="toggleEdit"
                      id="close"
                      fill="none"
                      viewBox="0 0 24 24"
                      stroke="currentColor"
                    >
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M6 18L18 6M6 6l12 12"
                      />
                    </svg>
                  </div>
                </div>
                <div name="body" v-show="!showEdit">
                  {{ strippedContent }}
                </div>
              </div>

              <div class="card-comment">
                <div class="card-comment-header">
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-6 w-6"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z"
                    />
                  </svg>
                  <h3>Activity</h3>
                </div>
                <CommentAdd />
                <Comments />
              </div>

              <div class="card-footer">
                <div
                  @click="
                    deleteCard();
                    hideCardById();
                  "
                  class="delete-btn"
                >
                  <div class="delete">
                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M18 12H6"
                      /></svg
                    >Delete
                  </div>
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
import { mixin as VueClickAway } from "vue3-click-away";
import CommentAdd from "./CommentAdd.vue";
import Comments from "./Comments.vue";

export default {
  name: "CardDiv",
  mixins: [VueClickAway],
  data() {
    return {
      showEdit: false,
      cardDescription: "",
      titleClicked: false,
      newTitle: "",
    };
  },
  components: {
    CommentAdd,
    Comments,
  },
  computed: {
    strippedContent() {
      let regex = /(<([^>]+)>)/gi;
      let apost = "&#8217;";
      return this.$store.state.currentCard.content.rendered
      .replace(regex, "")
      .replace(apost, "'");
    },
    strippedTitle() {
      let apost = "&#8217;";
      let newStr = this.$store.state.currentCard.title.rendered.replace(apost, "'");
      return newStr;
    },
  },
  methods: {
    hideCardById() {
      this.$store.state.showCard = false;
      this.showEdit = false;
    },
    deleteCard() {
      if (confirm("Delete card?")) {
        this.$store.dispatch("deleteCard");
        window.location.reload();
      }
    },
    toggleEdit() {
      this.showEdit = !this.showEdit;
      if (this.showEdit === true) {
        this.cardDescription = this.strippedContent;
      }
    },
    updateCardDesc() {
      this.$store.state.currentCard.content.rendered = this.cardDescription;
      // console.log("updating...");
      // console.log(this.$store.state.currentCard.content.rendered);
      this.$store.dispatch("updateCardDesc");
      this.toggleEdit();
    },
    updateTitle() {
      this.$store.state.currentCard.title.rendered = this.newTitle;
      // console.log("updating...");
      // console.log(this.$store.state.currentCard.title.rendered);
      this.$store.dispatch("updateCardTitle");
    },
    onClickAway() {
      this.titleClicked = false;
    },
  },
  updated() {
    this.newTitle = this.$store.state.currentCard.title.rendered;
  },
};
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
.card-mask {
  position: fixed;
  /* z-index: 9998; */
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
}

.card-container {
  width: 92vw;
  max-width: 750px;
  margin: 10px auto;
  /* padding: 20px 30px; */
  background-color: #fff;
  border-radius: 3px;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.33);
  transition: all 0.3s ease;
  font-family: Helvetica, Arial, sans-serif;
}

header {
  background: orange;
  height: 120px;
  opacity: 0.5;
  display: flex;
  flex-direction: row-reverse;
}

.close svg {
  height: 22px;
  padding: 10px;
  margin: 5px;
  border-radius: 100%;
  background: rgba(0, 0, 0, 0);
}

.close svg:hover {
  background: rgba(0, 0, 0, 0.1);
  cursor: pointer;
}

body {
  background-color: inherit;
  padding: 20px 10px;
}

svg {
  height: 20px;
  padding-right: 10px;
}

.card-title {
  display: flex;
  align-items: center;
  text-align: left;
  font-weight: bold;
  font-size: 1.25rem;
}

.in-list {
  text-align: left;
  color: #999;
  font-size: 0.9rem;
  padding: 6px 30px;
}

.card-description-header {
  display: flex;
  align-items: center;
}

.card-description-header h3 {
  padding-right: 10px;
}

#edit {
  height: 33px;
  background: #eee;
  border-radius: 3px;
  border: none;
  padding: 0 12px;
  font-size: 0.9rem;
}

#edit:hover {
  background: #ddd;
  cursor: pointer;
}

.card-description {
  margin: 20px 0;
  text-align: start;
}

.card-edit textarea {
  width: 96%;
  height: 100px;
  padding: 10px;
}

.card-edit-buttons {
  display: flex;
  align-items: center;
  justify-content: flex-start;
}

.card-edit-buttons button {
  margin-right: 8px;
  height: 33px;
  border-radius: 3px;
  border: none;
  padding: 0 12px;
  font-size: 0.9rem;
}

#save {
  background: #0079bf;
  color: white;
}

#save:hover {
  background: #026aa7;
  cursor: pointer;
}

#close {
  color: #777;
  background: transparent;
}

#close:hover {
  color: #333;
  cursor: pointer;
}

.card-comment-header {
  display: flex;
  align-items: center;
}

.card-comment-body {
  display: flex;
  align-items: center;
}

.card-comment-body div {
  border-radius: 100%;
  border: 1px solid #ccc;
  height: 33px;
  width: 33px;
  margin-right: 10px;
}

.card-comment-body input {
  height: 30px;
  border: 1px solid #ccc;
  flex: 1;
  padding-left: 10px;
  font-size: 0.9rem;
}

.card-footer {
  margin: 15px 0;
  padding-top: 20px;
  border-top: 1px solid #ddd;
}

.delete-btn {
  display: flex;
  flex-direction: column;
  width: 45%;
  background: rgb(200, 0, 0);
  justify-content: center;
  color: white;
  height: 33px;
  border-radius: 3px;
}

.delete-btn:hover {
  background: rgb(180, 0, 0);
  cursor: pointer;
}

.delete {
  display: flex;
  align-items: center;
  padding-left: 10px;
}

.card-default-button {
  float: right;
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
</style>