<template>
    <div class="contact-us">
        <div class="container">

            <div v-if="success">Grazie per averci contattato, email inviata</div>

            <form action="">
                <label for="name">Come ti chiami?</label>
                <input v-model="name" type="text" name="name" id="name">

                <div v-if="errors.name">
                    <p v-for="(error, index) in errors.name" :key="index">{{ error }}</p>
                </div>

                <label for="email">Qual è la tua email?</label>
                <input v-model="email" type="email" name="name" id="name">

                <div v-if="errors.email">
                    <p v-for="(error, index) in errors.email" :key="index">{{ error }}</p>
                </div>

                <label for="message">Come possiamo aiutarti?</label>
                <textarea v-model="message" name="message" id="message" cols="40" rows="10"></textarea>
                
                <div v-if="errors.message">
                    <p v-for="(error, index) in errors.message" :key="index">{{ error }}</p>
                </div>

                <button @click.prevent="sendMessage()" type="submit">Invia</button>
            </form>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'ContactUs',
        data: function(){
            return{
                name: '',
                email: '',
                message: '',
                success: false,
                errors: {}
            };
        },
        methods: {
            sendMessage: function(){
                axios.post('/api/leads/store', {
                    name: this.name,
                    email: this.email,
                    message: this.message,
                })
                .then((response) =>{
                    if (response.data.success) {
                        this.name = '',
                        this.email = '',
                        this.message = '',
                        this.success = true,
                        this.error = {}
                    } else {
                        this.success = false,
                        this.errors = response.data.errors
                    }
                });
            }
        },
        created: function(){

        },
    }
</script>

<style lang="scss" scoped>
.contact-us{
    background-color: #f2f5fb;
    color: #4f5a64;
    height: calc(100% - 160px);
    padding: 150px 0;

    form{
        display: flex;
        flex-direction: column;

        label{
            margin-bottom: 15px;
            font-size: 30px;
        }

        input, textarea{
            margin-bottom: 25px;
            border: 1px solid #6c30bb;
        }

        input, button{
            height: 50px;
        }

        button{
            display: inline;
            background-color: #6c30bb;
            color: white;
            margin-bottom: 20px;
        }
    }
}
</style>