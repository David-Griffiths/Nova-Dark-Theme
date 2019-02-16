<template>
    <button
            @click="toggle()"
            class="block no-underline text-90 hover:bg-30 p-3 w-full text-left">
        <icon-toggle
                v-if="darkThemeOn"
                class="w-4 text-black align-baseline ml-1 mr-4"
                style="margin-bottom: -2px; color: #298f5d;"></icon-toggle>
        <icon-toggle
                v-else
                class="w-4 text-black align-baseline ml-1 mr-4"
                style="margin-bottom: -2px; transform: rotate(180deg); color: rgb(171, 79, 79);"></icon-toggle>
        {{ label }}
    </button>
</template>

<script>
    import IconToggle from './icons/IconToggle.vue';

    export default {
        name: "NovaDarkThemeToggle",

        props: {
            label: {
                type: String,
                required: false,
                default: function () {
                    return 'Dark Theme'
                }
            }
        },

        data: () => ({
            darkThemeOn: false
        }),

        components: {
            IconToggle
        },

        mounted() {
            this.darkThemeOn = localStorage.darkThemeOn === "true";
            if (localStorage.darkThemeOn === "true") {
                document.querySelector('html').classList.add('nova-dark-theme');
            }
        },

        methods: {
            toggle() {
                this.darkThemeOn = !this.darkThemeOn;
                localStorage.darkThemeOn = this.darkThemeOn.toString();
                document.querySelector('html').classList.toggle('nova-dark-theme');
            }
        }

    }
</script>

<style scoped>

</style>