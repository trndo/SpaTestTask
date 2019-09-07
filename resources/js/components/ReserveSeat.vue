<template>
    <div id="overlay">
        <div id="modal">
            <h1>Reserve your seat</h1>
            <form @submit.prevent="submit" enctype="multipart/form-data">
                <div>
                    <input type="text" v-model="customer_name">
                </div>
                <div>
                    <input type="text" v-model="customer_last_name">
                </div>
                <div>
                    <input type="date" v-model="reserved_at">
                </div>
                <div>
                    <input type="text" v-model="phone_number">
                </div>
                <div>
                    <input type="file" v-on:change="imageUpload" ref="file">
                </div>
                <div>
                    <button>Reserve</button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';

    export default {
        name: "ReserveSeat",
        props: [
            'conference_room_id'
        ],
        data() {
            return {
                customer_name: null,
                customer_last_name: null,
                reserved_at: null,
                phone_number: null,
                file: null,
                error: null
            }
        },
        methods: {
            imageUpload() {
                this.file = this.$refs.file.files[0];
            },

            submit() {

                const config = {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                };

                let data = this.gatherFormData();

                axios
                    .post('/api/seats', data, config)
                    .then(response => {
                        console.log(response)
                    })
                    .catch(error => {
                        console.log(error.response)
                    });
            },
            gatherFormData() {
                let formData = new FormData();

                formData.append('customer_name', this.customer_name);
                formData.append('customer_last_name', this.customer_last_name);
                formData.append('reservedAt', this.reserved_at);
                formData.append('phone_number', this.reserved_at);
                formData.append('file', this.file);
                formData.append('conference_room_id', this.conference_room_id);

                return formData;
            }
        },


    }
</script>

<style scoped>
    #overlay {
        position: fixed;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 2;
        cursor: pointer;
    }
</style>
