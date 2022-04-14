<template>
  <header>
    Head
  </header>
  <div class="content">
    <router-view/>
  </div>
  <footer>
    Footer
  </footer>
</template>

<script>

export default {
  name: 'App',

  setup () {
  },

  data () {
    return {}
  },
}
</script>