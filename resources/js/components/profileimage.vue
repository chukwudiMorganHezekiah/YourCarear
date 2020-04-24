<template>
    <div>
        <div v-for="profile_array in profile_arrays" v-bind:key="profile_array.id" v-bind:class="{'mt-5':true}">



            <img v-bind:src="'/storage/profile_images/'+profile_array.profile_image"  style="border:1px solid brown" class="rounded-circle profile_image w-100">

            </div>



    </div>
</template>

<script>
    export default {
        props:['user'],
        data:function(){
            return{
                profile_arrays:[],

            }
        },
        mounted() {


             var vue=this;
             axios.post('/api/select_profile_image',{'user_id':this.user}).then(function(res){
                vue.profile_arrays=res.data

             })
        }
    }
</script>
