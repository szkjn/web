<template>
  <div id="nav">
    <h1>Trello Clone</h1>
  </div>
  <router-view />
</template>

<style>
body {
  /* background: #1980c5; */
  margin: 0;
  padding: 0;
}
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
}
#nav {
  background: #000;
  opacity: 0.3;
  height: 40px;
  width: 100%;
  margin-bottom: 20px;
  display: flex;
  justify-content: center;
  align-items: center;
  position: fixed;
}
#nav a {
  font-weight: bold;
  color: #2c3e50;
}
#nav a.router-link-exact-active {
  color: #42b983;
}
h1 {
  font-size: 1.35rem;
  color: #fff;
  margin: 0;
  letter-spacing: 0.5px;
}
</style>
