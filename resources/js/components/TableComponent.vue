<template>
    <div>
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Gender</th>
            <th>Birthday</th>
            <th>Created At</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="user in users" :key="user.id">
            <td>{{ user.id }}</td>
            <td>{{ user.name }}</td>
            <td>{{ user.email }}</td>
            <td>{{ user.gender }}</td>
            <td>{{ formatDate(user.birthday) }}</td>
            <td>{{ formatDate(user.created_at) }}</td>
            <td>
              <button @click="deleteUser(user.id)">Delete</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </template>
  
  <script>
  import axios from "axios";
  
  export default {
    data() {
      return {
        users: [],
      };
    },
    methods: {
      async fetchUsers() {
        try {
          const response = await axios.get("/table");
          this.users = response.data.users;
        } catch (error) {
          alert("Error fetching users: " + error.message);
        }
      },
      async deleteUser(id) {
        if (confirm("Are you sure you want to delete this user?")) {
          try {
            await axios.delete(`/delete/${id}`);
            this.fetchUsers();
            alert("User deleted successfully!");
          } catch (error) {
            alert("Error deleting user: " + error.message);
          }
        }
      },
      formatDate(date) {
        const options = { year: "numeric", month: "2-digit", day: "2-digit" };
        return new Date(date).toLocaleDateString(undefined, options);
      },
    },
    mounted() {
      this.fetchUsers();
    },
  };
  </script>
  