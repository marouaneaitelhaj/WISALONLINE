// const vue = new Vue({
//     data(){
//         return {
//             person : [],
//             text : 'hello'
//         }
//     },
//     mounted() {
//         axios.get('./data')
//             .then(response => {
//                 const data = response.data
//                 this.person = data;
//             })
//             .catch(error => {
//                 console.log(error);
//             });

//     }
// }).$mount('#vue')