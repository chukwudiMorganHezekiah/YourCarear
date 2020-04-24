

<template>
    <div class="container">

<button type="button"  id="togglerbutton" class="btn btn-small btn-secondary" data-toggle="modal" data-target="#coverletter">
    view
    </button>


<div v-if="true" class="modal fade" id="coverletter" tabindex="-1" role="dialog" aria-labelledby="coverletter" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content" style="max-height: 550px;overflow-y:scroll">
        <div class="modal-header">
          <h5 class="modal-title" id="coverletter">Cover Letter</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>


        <div class="modal-body">

                <textarea rows="5" cols="53" class="ml-5" disabled v-model="text"></textarea>

        </div>
        <div class="modal-footer">
          <button type="button" id="application_toggler" class="btn btn-secondary" data-dismiss="modal">Close</button>

        </div>
      </div>
    </div>
  </div>
    </div>
</template>

<script>
    export default {
        props:{
            letter:{
                required:true

            }
        },
        data:function(){
            return {
                text:'',

            }
        },
        mounted() {
            this.text=this.letter
        },
        methods:{
            modalclicked:function(){
                document.getElementById('togglerbutton').click()
            }
        }
    }
</script>
