<template>

  <form class="form-signin" @submit.prevent="register">
    <img class="mb-4" src="https://w7.pngwing.com/pngs/628/224/png-transparent-bootstrap-plain-wordmark-logo-icon.png" alt="" width="72" height="72">
    <h1 class="h3 mb-3 font-weight-normal">Register</h1>
    <label for="inputEmail" class="sr-only">Name</label>
    <input type="text" id="inputEmail" class="form-control mb-2" placeholder="Name" required autofocus v-model="form.name">
    <label for="inputEmail" class="sr-only">Email address</label>
    <input type="email" id="inputEmail" class="form-control mb-2" placeholder="Email address" required autofocus v-model="form.email">
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" id="inputPassword" class="form-control" placeholder="Password" required v-model="form.password">
    <label for="inputPassword" class="sr-only">Confirm Password</label>
    <input type="password" id="inputPassword" class="form-control" placeholder="Confirm Password" required v-model="form.c_password">
    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me"> Remember me
      </label>
    </div>
    <p v-bind:class="'alert-' + type" >{{error}}</p>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign Up</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2017-2022</p>
  </form>
</template>

<script>
import {reactive,ref} from "vue";
import {useRouter} from "vue-router";
export default {
  setup(){
    let form =reactive({
      name:'',
      email:'',
      password:'',
      c_password:'',
    });
    const router=useRouter()


    let error=ref('')
    let type=ref('')
    const register =async()=>{
      await axios.post('/api/register',form)
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
    return {form,register,error,type}
  }
}
</script>