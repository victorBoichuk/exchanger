<template>
  <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card">
                  <div class="card-header">
                    <div class="text-center font-weight-bold">
                      Курс валют
                    </div>
                    <div class="text-center font-weight-light">
                      данні НБУ на {{localeDate}}
                    </div>
                  </div>
                  <div class="card-body">
                        <table class="table">
                          <thead>
                            <tr>
                            <th>Код цифровий</th>
                            <th>Код літерний</th>
                            <th>Назва валюти</th>
                            <th>Офіційний курс</th>
                          </tr>
                          </thead>
                          <tbody>
                            <tr v-for="(jsn, ind) in json_data" :key="ind" v-if="jsn['cc']!='XAU'&&jsn['cc']!='XAG'&&jsn['cc']!='XPD'&&jsn['cc']!='XPT'">
                              <td>{{jsn['r030']}}</td>
                              <td>{{jsn['cc']}}</td>
                              <td>{{jsn['txt']}}</td>
                              <td>{{jsn['rate'].toFixed(3)}}</td>
                            </tr>
                          </tbody>
                        </table>
                  </div>
              </div>
          </div>
      </div>
  </div>
</template>

<script>
    export default {
        data: function () {
            return {
              json_data: [],
         };
        },
        mounted() {
            this.update()
        },
        computed: {
        localeDate() {
            return (new Date()).toLocaleDateString()
        },
    },
        methods: {
          update: function() {
                 axios.get('/getexchangerates')
                     .then((response) => {
                       this.json_data = JSON.parse(response.data.response.rates);
                     });
        }
    }
  }
</script>
