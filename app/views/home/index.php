<div id="vue">
  <input type="text" v-model="texttt" name="person" class="w-20 " />
  <button type="submit" name="btn" v-on:click="insert()" class="btn btn-primary">Submit</button>
  <div v-for="person in person" v-bind:key="person.id">
    {{ person }}
    <button v-on:click="dlt()">dlt</button>
  </div>
  <button v-on:click="fun()">sjdhqkdhqs</button>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.2.3/axios.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
<!-- <script src="../app/views/home/main/main.js"></script> -->
<script>
  const vue = new Vue({
    data() {
      return {
        person: [],
        texttt: '',
        notif: ''
      }
    },
    methods: {
      fun() {
        console.log(this.texttt);
      },
      insert() {
        const data = [
          this.texttt
          ]
        axios.post('./insert', data)
        this.mnt()
      },
      mnt(){
        axios.get('./data')
        .then(response => {
          const data = response.data
          this.person = data;
        })
        .catch(error => {
          console.log(error);
        });
      }
    },
    mounted() {
      axios.get('./data')
        .then(response => {
          const data = response.data
          this.person = data;
        })
        .catch(error => {
          console.log(error);
        });
    }
  }).$mount('#vue')
</script>