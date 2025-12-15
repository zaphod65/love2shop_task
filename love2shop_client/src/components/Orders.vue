<template>
  <div class="greetings">
    <ul>
      <li v-for="order in orders">Order ID: {{ order.id }} <button @click="getOrder(order.id)">Show</button></li>
    </ul>
    <div v-if="order">
        <h4>Order {{order.id}} items</h4>
        <ul>
            <li v-for="item in order.items">item: {{item.id}}, quantity: {{item.quantity}}</li>
        </ul>
    </div>
  </div>
</template>

<style scoped>
h1 {
  font-weight: 500;
  font-size: 2.6rem;
  position: relative;
  top: -10px;
}

h3 {
  font-size: 1.2rem;
}

.greetings h1,
.greetings h3 {
  text-align: center;
}

@media (min-width: 1024px) {
  .greetings h1,
  .greetings h3 {
    text-align: left;
  }
}
</style>

<script>
export default {
    data() {
        return {
            orders: [],
            order: null
        }
    },
    methods: {
        getOrder(id) {
            fetch(`http://localhost:8000/api/orders/${id}`)
                .then(res => res.json())
                .then(data => this.order = data)
                .catch(err => console.log(err.message))
        }
    },
    mounted() {
        fetch('http://localhost:8000/api/orders')
            .then(res => res.json())
            .then(data => this.orders = data)
            .catch(err => console.log(err.message))
    }
}
</script>
