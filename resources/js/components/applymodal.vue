<template>
    <div class="container">

     <div >
         <form action="#" v-on:submit.prevent="submit" class="form-horizontal" enctype="multipart/form-data">
           <input type="text" class="form-control "  disabled v-model="title">
          <textarea v-model="textarea" disabled v-bind:class="{ 'form-control':true,'mt-3':true, }">  </textarea>
          <input type="text" disabled v-bind:class="{'form-control':true,'mt-3':true,} " v-model="industry">
          <input type="text"  v-bind:class="{'form-control':true,'mt-3':true,} " v-model="useremail">
          <p class="errors" v-if="useremailentered">Please,enter your email</p>
          <input type="number"  v-bind:class="{'form-control':true,'mt-3':true,} " v-model="number" placeholder="Mobile.no">
        <p class="errors" v-if="numberentered">Please,enter your phone number</p>
        <textarea v-model="letter"  v-bind:class="{ 'form-control':true,'mt-3':true, }" rows="5" placeholder="Cover Letter...  "></textarea>
         <p class="errors" v-if="letterentered">Please,enter your cover  letter</p>
        <span>Do You want To use your uploaded CV</span>
         <input type="checkbox"  v-bind:class="{'form-control':false,'mt-3':true,} " v-on:click="checkifchecked" v-model="ifchecked">
         <input type="file" v-if="!show" v-on:change="fileselected" v-bind:class="{'form-control':true,'mt-3':true,} " >
  <br/> <button t v-on:click.prevent="submit"  v-bind:class="{'form-control':false,'mt-3':true,'btn btn-primary':true,} " >Continue<span v-if="loading">...</span></button>

         </form>
    </div>


    </div>
</template>

<script>

    export default {
        props:['cv','jobindustry','jobtitle','jobdescription','email','user','job_id'],
        data:function (){
            return{
                letter:'',
                textarea:'',
                title:'',
                useremail:'',
                industry:'',
                number:'',
                loading:false,
                ifchecked:null,
                show:true,
                numberentered:false,
                letterentered:false,
                useremailentered:false,
                file:null,




            }
        },
        mounted() {
            this.textarea='Job Description:'+this.jobdescription
            this.title='Job Title: '+this.jobtitle
            this.industry='Job Industry: '+this.jobindustry
            this.useremail=this.email

        },
       methods:{
            checkifchecked:function(){
            if(this.ifchecked == false){

                this.show=true


            }else{
                this.show=false
            }
        },
        fileselected(e){
                 var filereader= new FileReader();

                 filereader.readAsDataURL(e.target.files[0]);

                 filereader.onload =(e)=>{
                 this.file = e.target.result;

            }

        },
        submit:function(){
            this.numberentered=false;
            this.letterentered=false;
            this.useremailentered=false;
            this.loading=true;

            if(this.number == ''){

                this.numberentered=true;
                this.loading=false;
                return ;

            }else if(this.letter== ''){
                this.letterentered=true;
                this.loading=false;
                return ;

            }else if(this.useremail== ''){
                this.useremailentered=true;
                this.loading=false;
                return ;

            }else{
                var vue=this;

               if(this.file==null){

                    axios.post('/api/submitjob',{'user_email':this.useremail,'job_id':this.job_id,'mobile_no':this.number,'cover_letter':this.letter,'user_id':this.user,'cv':this.cv,'file':false}).then(function(res){
                    if(res.data == 'saved'){

                        window.open('/application_saved?success=thanks '+ vue.useremail + ' for submiting ur application,');
                         document.getElementById('application_toggler').click();
                    }
                })
               }
               else{

                    axios.post('/api/submitjob',{'user_email':this.useremail,'job_id':this.job_id,'mobile_no':this.number,'cover_letter':this.letter,'user_id':this.user,'cv':this.file,'file':true}).then(function(res){
                    if(res.data == 'saved'){

                        window.open('/application_saved?success=thanks '+ vue.useremail + ' for submiting ur application,');
                       document.getElementById('application_toggler').click();
                    }
               }
                    )
               }

            }


        }
       }
    }
</script>
