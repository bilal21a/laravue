<template>
  <div class="card text-center">
    <div class="card-header">
      Featured
    </div>
    <div class="card-body">
      <h5 class="card-title">Special title treatment</h5>
      <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
      <button class="btn btn-primary" @click="logout">Logout</button>
    </div>
    <div class="card-footer text-muted">
      2 days ago
    </div>
  </div>
</template>

<script>
import {useRouter} from "vue-router";

export default {
    setup(){
      const router=useRouter()
      function logout(){
        localStorage.removeItem('token')
        router.push({name:"Login"})
      }
      return {logout}
    }
  }
</script>

