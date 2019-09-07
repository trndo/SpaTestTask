<template>
    <div class="row">
        <div v-if="error" class="error">
            <p>{{ error }}</p>
        </div>
        <div class="col-12" v-for="conferenceRoom in conferenceRooms">
            <div class="card" style="width: 18rem;">
                <img :src="/uploads/+conferenceRoom.photo" class="card-img-top" alt="room_photo">
                <div class="card-body">
                    <h5 class="card-title">{{ conferenceRoom.title }}</h5>
                    <p class="card-text">{{ conferenceRoom.description }}</p>
                    <p class="card-text">Number of seats: {{ conferenceRoom.number_of_seats }}</p>
                    <a  @click="showModal(conferenceRoom.id)" class="btn btn-primary">Reserve</a>
                </div>
            </div>
        </div>
        <div class="pagination">
            <button :disabled="! prevPage" @click.prevent="goToPrev">Previous</button>
            {{ paginatonCount }}
            <button :disabled="! nextPage" @click.prevent="goToNext">Next</button>
        </div>
        <ReserveSeat :conference_room_id="id" v-if="id"></ReserveSeat>
    </div>
</template>

<script>
    import axios from 'axios';
    import ReserveSeat from "./ReserveSeat";

    const getConferenceRooms = (page, callback) => {
        const params = { page };

        axios
            .get('/api/conferenceRooms', { params })
            .then(response => {
                callback(null, response.data);
            }).catch(error => {
            callback(error, error.response.data);
        });
    };
    export default {
        name: "ConferenceRooms",
        components: {
           ReserveSeat
        },
        data() {
            return {
                 conferenceRooms: null,
                 meta: null,
                 links: {
                     first: null,
                     last: null,
                     next: null,
                     prev: null
                 },
                error: null,
                id: null
            }
        },
        computed: {
            nextPage() {
                if (! this.meta || this.meta.current_page === this.meta.last_page) {
                    return;
                }
                return this.meta.current_page + 1;
            },
            prevPage() {
                if (! this.meta || this.meta.current_page === 1) {
                    return;
                }

                return this.meta.current_page - 1;
            },
            paginatonCount() {
                if (!this.meta) {
                    return;
                }

                const { current_page, last_page } = this.meta;

                return `${current_page} of ${last_page}`;
            },
        },
        beforeRouteEnter (to, from, next) {
            getConferenceRooms(to.query.page, (err, data) => {
                next(vm => vm.setData(err, data));
            });
        },
        beforeRouteUpdate (to, from, next) {
            this.conferenceRooms = this.links = this.meta = null;
            getConferenceRooms(to.query.page, (err, data) => {
                this.setData(err, data);
                next();
            });
        },
        methods: {
            goToNext() {
                this.$router.push({
                    query: {
                        page: this.nextPage,
                    },
                });
            },
            goToPrev() {
                this.$router.push({
                    name: 'conferenceRooms',
                    query: {
                        page: this.prevPage,
                    }
                });
            },
            setData(err, { data: conferenceRooms, links, meta }) {
                if (err) {
                    this.error = err.toString();
                } else {
                    this.conferenceRooms = conferenceRooms;
                    this.links = links;
                    this.meta = meta;
                }
            },
            showModal(id) {
                this.id = id;
            }
        }
    }

</script>

<style scoped>

</style>
