
<template>
    <div class="d-flex" id="search_cover">

        <form  class="navbar-form  form-inline" v-on:submit="handleSubmit">
            <div class="form-group">
                <input type="text" placeholder="Search Jobs" ref="search_value" v-on:change="handleChange" class="px-5 form-control">

            </div>
            <div class="form-group">
                <input type="submit" placeholder="Search Jobs" class="ml-1 btn btn-primary form-control">

            </div>

        </form>

        <div class="search_results" v-if="show">
            <button type="button" v-on:click="closesearch" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
            <p v-bind:class="{'text-center':true, 'text-primary':true}" v-bind:id="{'no_result':true}" v-if="noreault">No result found</p>
  <div v-if="result">
      <div class="result_result" v-for="datum in data" v-bind:key="datum.id">
         <p class="text-primary"> {{ datum.job_description }}</p>
         <hr />
        </div>
      </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        data(){
            return{
                show:false,
                data:[],
                value:'',
                noreault:false,
                result:false

            }
        },
        methods:{
            handleChange:function(e){
               this.value=this.$refs.search_value.value;



            },
            closesearch:function(){
                this.show=false;
            },
            handleSubmit:function(e){
                e.preventDefault();
                var vue=this;
                axios.get('/api/search_jobs/'+this.value).then(function(res){

                    if(res.data == 'No result found'){
                        vue.noreault=true;
                        vue.result=false;

                    }else{
                        vue.noreault=false;
                        vue.result=true;
                        vue.data=res.data;


                    }

                })
                .catch(function(err){
                    alert('An error occured'+ err.data)

                })
                .then(function(){
                    vue.show=true;
                })

            }
        }
    }
</script>


<style lang="scss" scoped>
#search_cover{
    display:flex;
    color:white;
    align-content: space-around;
    flex-direction: column;
    .search_results{
        position:absolute;
        top:55px;
        width:400px;
        overflow-x:hidden;
        height:200px;
        overflow-y:scroll;
        color:white;
        padding-right:10px;
        padding-left:10px;
        z-index:5000 !important;
        background: rgba(219,219,219,4);
        border:2px grey solid;
        #no_result{
            padding-top:20px;

         }

    }
    @media(max-width: 796px){
         .search_results{
        position:absolute;
        top:85px;
        width:340px;
        height:300px;
         }

    }
}

</style>
