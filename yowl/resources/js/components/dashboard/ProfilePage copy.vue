<template>
  <div>
    <!-- <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin /> -->
    <div class="container bootstrap snippets bootdey">
      <div class="col-md-8">
        <div class="buttonBar">
          <button class="button">
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
                d="M17.657 18.657A8 8 0 016.343 7.343S7 9 9 10c0-2 .5-5 2.986-7C14 5 16.09 5.777 17.656 7.343A7.975 7.975 0 0120 13a7.975 7.975 0 01-2.343 5.657z"
              />
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M9.879 16.121A3 3 0 1012.015 11L11 14H9c0 .768.293 1.536.879 2.121z"
              />
            </svg>
            Best
          </button>
          <button class="button">New</button>
          <button class="buttonNewPost">
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
                d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"
              />
            </svg>
            New Post
          </button>
        </div>
      </div>
      <div class="row">
        <!-- posts -->
        <div class="col-md-8">
          <div class="panel blog-container">
            <div class="panel-body">
              <h4>TEST</h4>
              <small class="text-muted"
                >By <a href="#"><strong> John Doe</strong></a> | Post on Jan 8,
                2013 | 58 comments</small
              >

              <p class="m-top-sm m-bottom-sm">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam
                eros nibh, viverra a dui a, gravida varius velit. Nunc vel
                tempor nisi. Aenean id pellentesque mi, non placerat mi. Integer
                luctus accumsan tellus. Vivamus quis elit sit amet nibh lacinia
                suscipit eu quis purus. Vivamus tristique est non ipsum dapibus
                lacinia sed nec metus.
              </p>
              <a href="single_post.html"
                ><i class="fa fa-angle-double-right"></i> Continue reading</a
              >
              <span
                class="post-like text-muted tooltip-test"
                data-toggle="tooltip"
                data-original-title="I like this post!"
              >
                <i class="fa fa-heart"></i> <span class="like-count">25</span>
              </span>
            </div>
          </div>
          <div class="panel blog-container">
            <div class="panel-body">
              <h4>Bootstrap 3.0</h4>
              <small class="text-muted"
                >By <a href="#"><strong> John Doe</strong></a> | Post on Jan 8,
                2013 | 58 comments</small
              >

              <p class="m-top-sm m-bottom-sm">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam
                eros nibh, viverra a dui a, gravida varius velit. Nunc vel
                tempor nisi. Aenean id pellentesque mi, non placerat mi. Integer
                luctus accumsan tellus. Vivamus quis elit sit amet nibh lacinia
                suscipit eu quis purus. Vivamus tristique est non ipsum dapibus
                lacinia sed nec metus.
              </p>
              <a href="single_post.html"
                ><i class="fa fa-angle-double-right"></i> Continue reading</a
              >
              <span
                class="post-like text-muted tooltip-test"
                data-toggle="tooltip"
                data-original-title="I like this post!"
              >
                <i class="fa fa-heart"></i> <span class="like-count">25</span>
              </span>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <button class="avatar">
            Avatar TLAB
            <span class="line"></span>
          </button>
          <div class="media popular-post">
            <button class="media-body">
              Create avatar
              <svg fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"
                />
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"
                />
              </svg>
            </button>
          </div>
          <div class="media popular-post">
            <button class="media-body">Posts count</button>
          </div>
          <div class="media popular-post">
            <button class="media-body">Comments count</button>
          </div>
          <div class="media popular-post">
            <button class="media-body">Rewards</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "ProfilePage",
  props: {
    ['user']: {}
  },
  methods: {
    setCurrentUser() {
      console.log("test :" + this.user);
    },
  },
  created() {
    this.setCurrentUser();
  },
};
</script>

<style scoped>
body {
  padding-top: 0;
  font-size: 12px;
  color: #777;
  background: #f9f9f9;
  font-family: "Open Sans", sans-serif;
  margin-top: 20px;
}

.panel {
  position: relative;
  background: #fff;
}

.panel-body {
  border: solid 1rem #5846da;
  margin-bottom: 8rem;
  margin-top: 2rem;
}

.blog-container a:not(.btn) {
  color: #999;
  transition: all 0.2s linear;
  -webkit-transition: all 0.2s linear;
  -moz-transition: all 0.2s linear;
  -ms-transition: all 0.2s linear;
  -o-transition: all 0.2s linear;
}

.post-like {
  float: right;
  cursor: pointer;
}

.headline {
  margin: 20px 0;
  padding: 5px 0 10px;
  border-bottom: 1px solid #eee;
  font-weight: 500;
}

.buttonBar {
  height: 4rem;
  background-color: #5846da;
  margin-left: -1rem;
  margin-bottom: 3rem;
  border-radius: 1px;
}

.button {
  background-color: #5846da;
  border-color: #5846da;
  border-radius: 15px;
  height: 2rem;
  width: 5rem;
  color: white;
  margin-left: 3rem;
  justify-content: center;
  margin-top: 10px;
}

.buttonNewPost {
  float: right;
  justify-content: center;
  background-color: #5846da;
  border-color: #5846da;
  border-radius: 15px;
  height: 2rem;
  width: 3rem;
  color: white;
  padding: 0rem 4rem 0rem;
  margin-right: 6rem;
  margin-top: 10px;
}

.avatar {
  background-color: #ffd596;
  height: 7rem;
  width: 7rem;
  margin-bottom: 4rem;
  text-align: center;
  border-radius: 100%;
  border: solid;
}

h4,
.h4 {
  font-size: 18px;
}
.panel-body {
  margin-bottom: 2rem;
  border-left: solid 1rem #5846da;
  border-top: solid 1rem #5846da;
  border-right: solid 1rem #5846da;
  border-bottom: solid 2rem #5846da;
}

.media,
.media-body {
  overflow: hidden;
  zoom: 1;
  text-justify: center;
  height: 3rem;
  margin-bottom: 2rem;
  background-color: #5846da;
  border-radius: 5rem;
  color: white;
  font-size: 15px;
}
</style>