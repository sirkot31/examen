<template>
    <div class="row">
        <div class="col-sm-4">
       <form @submit.prevent="create">
            <label for="fname">escaneo:</label><br>
            <input type="text" class="form-control" maxlength="15" v-model="register.ticket"><br>
           <button type="submit" class="btn btn-primary">Guardar</button>

      </form>
        </div>
        <div class="col-sm-8">
        <graphic-component></graphic-component>
        </div>
    </div>

</template>
<script>
import axios from 'axios'
export default ({
    name:"submitTicket",
    data(){
        return {
            register:{}
        }
    },
    methods: {
             create(){
                var  year,month,day,p,a,b,c;
                year=this.register.ticket.slice(0,4);
                month=this.register.ticket.slice(4,6);
                day=this.register.ticket.slice(6,8);
                p=this.register.ticket.substr(8);
                if(parseInt(year) && parseInt(month) && parseInt(day)){
                    a=parseInt(year);
                    b=parseInt(month);
                    c=parseInt(day);
                    if(a==2022 && b<=12 && c<=31){
                        if(p.indexOf('*')==0){
                            this.register.date=year+'-'+month+'-'+day;
                            console.log(this.register.date);
                            axios.post("/api/b",{register:this.register}).then(response=>{
                               alert(response.data);}
                              ).catch(error=>{
                              alert(error);
                            })
                        }else{
                        alert('El caracter * no se encuentra en el lugar indicado en la cadena');
                        }

                    }else{
                        alert('La fecha tiene valores no permitidos o fuera de los limites permitidos');
                    }
                }else{
                    alert('Los valores de las primeras secciones no incluyen numeros');
                }

        }
    },
})
</script>

