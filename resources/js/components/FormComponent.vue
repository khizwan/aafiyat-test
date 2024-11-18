<template>
    <form @submit.prevent="submitForm">
      <div>
        <label>Name:</label>
        <input type="text" v-model="form.name" required />
      </div>
      <div>
        <label>Email:</label>
        <input type="email" v-model="form.email" required />
      </div>
      <div>
        <label>Password:</label>
        <input type="password" v-model="form.password" required />
      </div>
      <div>
        <label>Gender:</label>
        <select v-model="form.gender" required>
          <option value="Male">Male</option>
          <option value="Female">Female</option>
        </select>
      </div>
      <div>
        <label>Birthday:</label>
        <input type="date" v-model="form.birthday" required />
      </div>
      <div>
        <label>
          <input type="checkbox" v-model="form.status_active" /> Active
        </label>
      </div>
      <button type="submit">Submit</button>
    </form>
  </template>
  
  <script>
  import axios from "axios";
  
  export default {
    data() {
      return {
        form: {
          name: "",
          email: "",
          password: "",
          gender: "Male",
          birthday: "",
          status_active: false,
        },
      };
    },
    methods: {
      async submitForm() {
        try {
          await axios.post("/store", this.form);
          alert("User added successfully!");
          this.resetForm();
        } catch (error) {
          alert("Error submitting form: " + error.response.data.message);
        }
      },
      resetForm() {
        this.form = {
          name: "",
          email: "",
          password: "",
          gender: "Male",
          birthday: "",
          status_active: false,
        };
      },
    },
  };
  </script>
  