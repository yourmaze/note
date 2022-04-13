<template>
    <div id="app">
        <div class="heading">
            <h1>Cruds</h1>
        </div>
        <note-component
            v-for="note in notes"
            v-bind="note"
            :key="note.id"
            @update="update"
            @delete="del"
        ></note-component>
        <div>
            <button @click="create">Add</button>
        </div>
    </div>
</template>

<script>
import NoteComponent from "./components/Note/NoteComponent";

function Note({ id, color, name}) {
    this.id = id;
    this.category_id = color;
    this.name = name;
}
export default {
    data() {
        return {
            notes: []
        }
    },
    methods: {
        async create() {
            // To do
        },
        async read() {
            const data = window.axios.get('/api/notes').then( response => {
                //if (this.firstLoad) this.firstLoad = false;
                console.log(response.data)
                const notes = response.data;
                notes.forEach(note => this.notes.push(new Note(note)));
            });
            //console.log(data);
        },
        async update(id, color) {
            // To do
        },
        async del(id) {
            // To do
        }
    },
    components: {
        NoteComponent
    },
    created() {
        this.read();
    }
}
</script>

<style scoped>

</style>
