<script setup>
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
</script>

<template>
    <div>
        <div
            class="p-6 lg:p-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700"
        >
            <div class="flex items-center">
                <ApplicationLogo
                    class="block h-12 w-auto fill-current text-gray-500"
                />
                <h2
                    class="ml-3 text-2xl font-bold leading-7 text-gray-900 dark:text-white sm:leading-9 sm:truncate"
                >
                    Welcome to Jetstream
                </h2>

                <div v-for="$input in $ipunts">
                    <p>{{ $input.quantity }}</p>
                </div>
            </div>
        </div>
    </div>
</template>
