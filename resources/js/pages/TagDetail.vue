<template>
    <div class="tag">
        <div class="container">
            <div class="details">
                <div class="titolo">
                    {{tag.name}}
                    <span class="icon" v-if="tag.name === 'pesce'">
                        <i class="fas fa-fish"></i>
                    </span>
                    <span class="icon" v-if="tag.name === 'carne'">
                        <i class="fas fa-drumstick-bite"></i>
                    </span>
                    <span class="icon" v-if="tag.name === 'piatto veloce'">
                        <i class="fas fa-stopwatch-20"></i>
                    </span>
                    <span class="icon" v-if="tag.name === 'vegetariano'">
                        <i class="fas fa-carrot"></i>
                    </span>
                </div>
                <div class="descrizione">
                    <div v-if="tag.name === 'pesce'">
                        Con il termine pesce, inteso in senso alimentare, si comprendono gli alimenti derivanti dalla pesca, comprendenti sia l'eterogeneo gruppo dei pesci (sia ossei che cartilaginei), sia tutti gli animali marini o di acqua dolce, selvatici o di allevamento, quali ad esempio molluschi cefalopodi (calamari, totani, polpi, seppie, moscardini), crostacei (gamberi, scampi, aragoste, astici, granchi e granseole, canocchie) e tutte le forme, parti e prodotti commestibili di tali animali spesso denominati frutti di mare, se da esso derivanti.
                    </div>
                    <div v-if="tag.name === 'carne'">
                        La carne rappresenta uno degli alimenti più consumati e considerati da chi segue un comune regime nutrizionale. Nel tempo, il suo utilizzo ha subito profondi cambiamenti, influenzati soprattutto dalle variazioni socio economiche che si sono susseguite storicamente. In Italia, grazie all’innalzamento del tenore di vita, dagli anni settanta è stata sempre più presente nell’alimentazione base della popolazione.
                    </div>
                    <div v-if="tag.name === 'piatto veloce'">
                        Carne o pesce? Non importa, l’essenziale è che sia veloce e gustoso! Se questo è quello che cercate da un primo piatto siete nel posto giusto. Autunno, inverno, primavera ed estate: ad ogni stagione il suo piatto! Durante i periodi più freddi coccolatevi con un’appetitosa pasta alla gricia, preparata ad arte come da tradizione. In primavera lasciatevi tentare dagli spaghetti integrali con pesto di piselli freschi, pomodori secchi e stracciatella, un vero trionfo dell’orto dal gusto delicato. L’estate richiamerà sapori più freschi da portare in tavola con le farfalle con salmone, rucola e pomodorini, dove aromi e profumi si fondono in un primo piatto di pesce dal gusto unico!
                    </div>
                    <div v-if="tag.name === 'vegetariano'">
                        Quali sono gli alimenti vegetariani? Gli alimenti vegetariani consistono principalmente in cibi vegetali. A seconda della forma di vegetarianismo sono considerati cibi vegetariani anche il miele, le uova, il latte e i latticini. I vegetariani si astengono dal mangiare carne, pesce e frutti di mare.
                    </div>
                </div>
                <div class="post">
                    <div class="correlati">
                        Post correlati
                    </div>
                    <div>
                        <router-link
                        class="post-title" 
                        :to="{name:'show', params: { slug: post.slug}}" 
                        v-for="(post, index) in tag.posts" 
                        :key="index">
                            {{post.title}}
                        </router-link>
                    </div>
                </div>
            </div>    
        </div>
    </div>
</template>

<script>
    export default {
        name: 'TagDetail',
        data: function(){
            return{
                tag: [],
            };
        },
        methods: {
            getTag: function(){
                axios.get('/api/tags/' + this.$route.params.slug)
                .then((response) => {
                    this.tag = response.data.tag;
                });
            }
        },
        created: function(){
            this.getTag();
        }
    }
</script>

<style lang="scss" scoped>
.tag{
    background-color: #f2f5fb;
    color: #4f5a64;
    height: calc(100% - 160px);
    padding: 300px 0;

    .details{

        .titolo{
            text-transform: uppercase;
            font-size: 55px;
            margin-bottom: 20px;

            .icon{
                color: #8d42eb;
                margin-left: 10px;
            }
        }

        .descrizione{
            font-size: 26px;
            margin-bottom: 30px;
        }

        .post{

            .correlati{
                display: inline-block;
                font-size: 25px;
                margin-bottom: 10px;
                padding: 5px;
                border: 1px solid #4f5a64;
                border-radius: 10px;
                background-color: white;
            }

            .post-title{
                margin-right: 20px;
                font-size: 24px;
                color: #8d42eb;
                text-decoration: none;
            }
        }
    }
}
</style>