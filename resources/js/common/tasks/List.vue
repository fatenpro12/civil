<template>
    <TasksList :id="project_id" :backBtn="backBtn" :show-all-task="show_all_task"></TasksList>
</template>
<script>
import TasksList from '../projects/tasks/List';
export default {
    components: {
        TasksList,
    },
      props:{
backBtn: true
    },
    data() {
        return {
            project_id: null,
            show_all_task: true,
        };
    },
    methods: {
        tasks() {
            const self = this;
            self.$eventBus.$emit('updateTaskTable');
        },
    },
};
</script>
