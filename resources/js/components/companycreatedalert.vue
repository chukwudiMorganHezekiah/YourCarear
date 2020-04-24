
<template>
    <div class="container">

    </div>
</template>

<script>
    export default {
        mounted() {
            if(!"Notification" in window){
                alert('Your browser does not support notifications,consider upgrading')

            }else if(Notification.permission =='granted'){
                this.notify();

            }else if(Notification.permission !=='denied'){
                Notification.requestPermission(function(permission){
                    if(permission =='granted'){
                       this.notify();
                    }
                })

            }
        },
        methods:{
            notify:function(){
                var notification=new Notification('YoourCareer.com,says',{
                    body:'Your company was created successfully',
                    icon:'http://127.0.0.1:8000/assets/ads.jpg'
                });
                notification.onclick=function(){
                    notification.close.bind(notification)
                }
                setTimeout(notification.close.bind(notification),9000);
            }
        }
    }
</script>
