<div id="vue">
  <input type="text" v-model="texttt" name="person" class="m-5 border w-20 " />
  <button type="submit" name="btn" v-on:click="insert()" class="btn btn-primary">INSERT</button>
  <div v-for="person in person" v-bind:key="person.id">
    {{ person }}
    <button v-on:click="dlt(person.id)" class="border">dlt</button>
  </div>
  <button v-on:click="fun()" class="border">read</button>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.2.3/axios.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
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
    watch: {
      person: function() {
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

    methods: {
      fun() {
        console.log(this.texttt);
      },
      insert() {
        const data = [
          this.texttt
        ]
        axios.post('./insert', data)
      },
      dlt(id) {
        const data = [
          id
        ]
        axios.post('./deleteperson', data)
        console.log(axios.post('./deleteperson', data))
      },
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