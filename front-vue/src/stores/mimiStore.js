import { defineStore } from "pinia";
import axios from "axios";

const apiUrl = import.meta.env.VITE_APP_API_URL;

export const useMimiStore = defineStore("mimi", {
    state: () => ({
        mimis : [],
        newMimi: "",
    }),
    actions: {
        async getMimis() {
            try {
                const response = await axios.get(apiUrl)
                this.mimis = response.data
            } catch (error) {
                console.error("Error fetching mimis: " +error);
            }
        },
        async addMimi() {
            if (this.newMimi.trim() === '') return;
            try {
                const response = await axios.post(apiUrl, {
                    mimi: this.newMimi
                });
                this.mimis.push(response.data);
                this.newMimi = "";
            }
            catch {
                console.error("Error edding mimi: " +error);
            }
        },
        async updateMimi(mimi) {
            try {
                await axios.put(`${apiUrl}/${mimi.id}`, mimi);
            } catch (error) {
                console.error("Error updating mimi: "+error);
            }
        },
        async deleteMimi(id) {
            try {
                await axios.delete(`${apiUrl}/${id}`);
                this.mimis = this.mimis.filter((mimi) => mimi.id !== id);
            } catch (error) {
                console.error("Error deleting mimi: "+error);
            }
        },
    }
})

