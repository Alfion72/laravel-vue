    <template>
        <div class="todo-container">
        <h1 class="title">Mimi List</h1>
        <input
            type="text"
            v-model="mimiStore.newMimi"
            @keyup.enter="mimiStore.addMimi"
            placeholder="Add a mimi"
            class="mimi-input"
        />

        <ul class="mimi-list">
            <li v-for="mimi in mimiStore.mimis" :key="mimi.id" class="mimi-item">
            <input
                type="checkbox"
                v-model="mimi.completed"
                @change="mimiStore.updateMimi(mimi)"
                class="mimi-checkbox"
            />

            <span :class="{ completed: mimi.completed }">{{ mimi.mimi }}</span>
            <button @click="mimiStore.deleteMimi(mimi.id)" class="delete-btn">
                Delete
            </button>
            </li>
        </ul>
        </div>
    </template>
    
    <script setup>
    import { useMimiStore } from "@/stores/mimiStore";
    import { onMounted } from "vue";
    
    const mimiStore = useMimiStore();
    
    onMounted(() => {
        mimiStore.getMimis();
    });
    </script>