<template>

  <form class="form-signin" @submit.prevent="login">
    <img class="mb-4" src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b2/Bootstrap_logo.svg/1280px-Bootstrap_logo.svg.png" alt="" width="72" height="72">
    <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
    <label for="inputEmail" class="sr-only">Email address</label>

    <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required="" autofocus="" v-model="form.email">
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" id="inputPassword" class="form-control" placeholder="Password" required="" v-model="form.password">
    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me"> Remember me
      </label>
    </div>
    <p v-bind:class="'alert-' + type" >{{error}}</p>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    <p class="mt-5 mb-3 text-muted">© 2017-2022</p>
  </form>
</template>

<script>
import {reactive,ref} from "vue";
import {useRouter} from "vue-router";
export default {
  setup(){
    let form =reactive({
      email:'',
      password:'',
    });
    const router=useRouter()


    let error=ref('')
    let type=ref('')
    const login =async()=>{
      await axios.post('/api/login',form)
          .then(res=>{
            let data= res.data
            console.log(data)
            if (data.success){
              error.value=data.message
              type.value="success"
              localStorage.setItem('token',data.data.token)
              router.push({name:"Dashboard"})
            }else{
              error.value=data.message
              type.value="danger"
            }
          })
    }
    return {form,login,error,type}
  }
}
</script>
