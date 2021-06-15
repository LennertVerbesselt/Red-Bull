<template>
    <div class="container">
        <h1>{{Event.name}}</h1>
    </div>
</template>

<script>
export default {
    props: {
        EventSetID: Number,
    },
     data: function () {
        return {
            id: [],
            Event: [],

        }   
    },
methods: {
        getEventDescription(){
            axios.post('api/getevents', {eventsetid: this.id }).then(response => {
                this.Event=response.data.event;
                console.log(response);
            }).catch(error => {
                console.log("Error, Challenges not obtained");
            });
        },

        },
    created() {
        if(this.ChallengeSetID){
            this.id = this.ChallengeSetID;
        }
        
	},
	mounted() {
		this.getEventDescription();
	}

}
</script>

<style>

</style>