<template>
    <div>
       <select v-bind:name="name" id="industryInterest"  class="form-control">
           <option disabled>Company Interest </option>
           <option  v-bind:value="interestIndustry.career"  v-for="interestIndustry in interestIndustries" v-bind:key="interestIndustry">
               {{interestIndustry.career}}

           </option>

       </select>

    </div>
</template>

<script>
    export default {
        props:{
            name:{
                required:true
            }

        },

        data:function(){
            return{
                interestIndustries:[
                    {
                       career: 'IT and Software',

                    },
                    {
                        career:'education',

                    },
                    {
                         career:'medicine',

                    },
                    {
                          career:'Agriculture and Farming'
                    }
                ]


            }
        },
        mounted() {



        }
    }
</script>
