<template>
   <div class="footer">
        <h2 class="titre">#IAPAU</h2>
        <div class="disposition">
            <a class="footer_class" href="https://iapau.org/">L'association IA Pau</a>
            <router-link class="footer_class" :to="webmaster.lien" v-for="webmaster in webmasters" :key="webmaster.id">{{ webmaster.name }}</router-link>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            webmasters: [
                { id: 1, name: "Des questions ?",lien:"/faq"},
                { id: 2, name: 'Nous contacter',lien:"/contact"}
            ]
        }
    }
}
</script>

<style>
.footer {
    padding:30px;
    background-color:#0e8769;
    background-size:100%;
    height: 100px;
    clear: both;
    text-align: center;
    margin-bottom: 0;
}

.titre{
    margin-bottom:40px;
}

.disposition{
    display:flex;
    justify-content: center;
}

.footer_class{
    font-size: 20px;
    text-decoration: none;
    margin-right: 100px;
    margin-left:100px;
    align-items: center;
    color:black;
}
</style>
