<template>
  <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-9">
        <div class="card">
            <div class="card-header">
              <div class="text-center font-weight-bold">
                Обмін валют
              </div>
            </div>
            <div class="card-body">
              <form id="test-form" method="post" action="https://secure.wayforpay.com/pay" accept-charset="utf-8">
                <div class="row">
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <label><span>merchantAccount</span></label>
                        <input class="press-listen" type="text" name="merchantAccount" value="freelance_user_5f423b7780c06">
                    </div>

                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <label><span>merchantAuthType</span></label>
                        <input class="press-listen" type="text" name="merchantAuthType" value="SimpleSignature">
                    </div>

                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <label><span>merchantDomainName</span></label>
                        <input class="press-listen" type="text" name="merchantDomainName" value="www.market.ua">
                    </div>

                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <label><span>orderReference</span></label>
                        <input class="press-listen" type="text" name="orderReference" value="DH1598263017">
                    </div>

                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <label><span>orderDate</span></label>
                        <input class="press-listen" type="text" name="orderDate" value="1415379863">
                    </div>

                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <label><span>amount</span></label>
                        <input class="press-listen" type="text" name="amount" value="1547.36">
                    </div>

                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <label><span>currency</span></label>
                        <input class="press-listen" type="text" name="currency" value="UAH">
                    </div>

                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <label><span>orderTimeout</span></label>
                        <input class="press-listen" type="text" name="orderTimeout" value="49000">
                    </div>

                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <label><span>productName[]</span></label>
                        <input class="press-listen" type="text" name="productName[]" value="Процессор Intel Core i5-4670 3.4GHz">
                    </div>

                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <label><span>productName[]</span></label>
                        <input class="press-listen" type="text" name="productName[]" value="Память Kingston DDR3-1600 4096MB PC3-12800">
                    </div>

                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <label><span>productPrice[]</span></label>
                        <input class="press-listen" type="text" name="productPrice[]" value="1000">
                    </div>

                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <label><span>productPrice[]</span></label>
                        <input class="press-listen" type="text" name="productPrice[]" value="547.36">
                    </div>

                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <label><span>productCount[]</span></label>
                        <input class="press-listen" type="text" name="productCount[]" value="1">
                    </div>

                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <label><span>productCount[]</span></label>
                        <input class="press-listen" type="text" name="productCount[]" value="1">
                    </div>

                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <label><span>clientFirstName</span></label>
                        <input class="press-listen" type="text" name="clientFirstName" value="Вася">
                    </div>

                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <label><span>clientLastName</span></label>
                        <input class="press-listen" type="text" name="clientLastName" value="Пупкин">
                    </div>

                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <label><span>clientAddress</span></label>
                        <input class="press-listen" type="text" name="clientAddress" value="пр. Гагарина, 12">
                    </div>

                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <label><span>clientCity</span></label>
                        <input class="press-listen" type="text" name="clientCity" value="Днепропетровск">
                    </div>

                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <label><span>clientEmail</span></label>
                        <input class="press-listen" type="text" name="clientEmail" value="some@mail.com">
                    </div>

                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <label><span>defaultPaymentSystem</span></label>
                        <input class="press-listen" type="text" name="defaultPaymentSystem" value="card">
                    </div>

                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6 mt-3">
                                <label><span>merchantSignature</span></label>
                                <input type="text" name="merchantSignature" style="background-color: #ffe4c4;" readonly="readonly" value="327f7d9e5d2d2d2a228db3cc820f708e">
                                <input type="submit" value="Тест" style="width: 100px;">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
              <form action="https://secure.wayforpay.com/pay" method="post" accept-charset="utf-8">
                <input type="hidden" name="merchantAccount" ref="merchantAccount" value="test_merch_n1">
                <input type="hidden" name="merchantDomainName" ref="merchantDomainName" value="www.market.ua">
                <input type="hidden" name="orderReference" ref="orderReference" :value="orderReference">
                <input type="hidden" name="orderDate" ref="orderDate" :value="localeDate">
                <input type="hidden" name="productName[]" ref="productName1" value="Сумма для конвертації">
                <input type="hidden" name="productName[]" ref="productName2" value="Сумма для конвертації">
                <input type="hidden" name="productPrice[]" ref="productPrice1" :value="current_value">
                <input type="hidden" name="productPrice[]" ref="productPrice2" :value="0">
                <input type="hidden" name="currency" :value="current_currency">
                <input type="hidden" name="productCount[]" ref="productCount1" value="1">
                <input type="hidden" name="productCount[]" ref="productCount2" value="1">
                <input type="hidden" name="defaultPaymentSystem" value="card">
                <input type="hidden" name="merchantSignature" :value="signature">
                <input name="orderTimeout" value="49000">
                <input name="clientFirstName" value="Вася">
 <input name="clientLastName" value="Пупкин">
 <input name="clientAddress" value="пр. Гагарина, 12">
 <input name="clientCity" value="Днепропетровск">
 <input name="clientEmail" value="some@mail.com">
                <input type="hidden" name="_token" :value="csrf">
                  <div class="form-inline justify-content-center">
                    <input class="form-control mx-2 mt-2" type="text" name="amount" ref="amount" v-on:input="current_value = $event.target.value">
                    <select class="custom-select mx-2 mt-2" v-on:change="current_rate = $event.target.value" ref="current_rate_select">
                      <option selected>Оберіть...</option>
                      <option value="1" title="Українська гривня">UAH</option>
                      <option v-for="(jsn, ind) in json_data" :key="ind" v-if="jsn['cc']!='XAU'&&jsn['cc']!='XAG'&&jsn['cc']!='XPD'&&jsn['cc']!='XPT'" :title="jsn['txt']" :value="jsn['rate']">{{jsn['cc']}}</option>
                    </select>
                    <button type="button" name="button" class="btn btn-link mx-1 mt-2" @click="reverse"><i class="fa fa-arrows-h  fa-2x"></i></button>
                    <input class="form-control mx-2 mt-2" type="text" name="" v-bind:value="computed_value" disabled>
                    <select class="custom-select mx-2 mt-2" v-on:change="computed_rate = $event.target.value" ref="computed_rate_select">
                      <option selected>Оберіть...</option>
                      <option value="1" title="Українська гривня">UAH</option>
                      <option value="1" v-for="(jsn, ind) in json_data" :key="ind" v-if="jsn['cc']!='XAU'&&jsn['cc']!='XAG'&&jsn['cc']!='XPD'&&jsn['cc']!='XPT'" :title="jsn['txt']" :value="jsn['rate']">{{jsn['cc']}}</option>
                    </select>
                  </div>
              <div class="form-inline mt-2 justify-content-end">
                <small class="form-text text-muted">*по курсу НБУ на {{localeDate}}</small>
              </div>
              <div class="form-inline mt-2 justify-content-center">
                  <input type="submit" value="Обміняти" class="btn btn-primary w-50">
              </div>
              </form>
            </div>
        </div>
    </div>
          <div class="col-md-3">
              <div class="card">
                  <div class="card-header">
                    <div class="text-center font-weight-bold">
                      Курс валют
                    </div>
                    <div class="text-center font-weight-light">
                      на {{localeDate}}
                    </div>
                  </div>
                  <div class="card-body">
                        <table class="table">
                          <tbody>
                            <tr v-for="(jsn, ind) in json_data" :key="ind" v-if="jsn['cc']=='EUR'||jsn['cc']=='USD'||jsn['cc']=='RUB'">
                              <td>{{jsn['cc']}}</td>
                              <td>{{jsn['rate'].toFixed(3)}}</td>
                            </tr>
                          </tbody>
                        </table>
                        <a href="/exchangerates">Всі валюти</a>
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
              current_value:'',
              computed_value:'',
              current_rate:'',
              computed_rate:'',
              current_currency:'',
              computed_currency:'',
              csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
              orderReference: null,
              string: '',
              signature: ''
         };
        },
        watch:{
          current_value: function(){
              if (this.current_value.length>0){
                this.convert()
              }
            },
            current_rate: function(){
              if (this.current_rate.length>0){
                this.convert()
              }
            },
            computed_rate: function(){
              if (this.computed_rate.length>0){
                this.convert();
              }
            },
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
                       //console.log(this.json_data);
                     });
        },

        convert: function(){
          if (this.current_value.length>0&&this.current_rate.length&&this.computed_rate.length>0){
            this.computed_value = (this.current_value * this.current_rate / this.computed_rate).toFixed(3);
            this.orderReference = "DH783023";
            var current_rateID = this.$refs.current_rate_select.options.selectedIndex;
            this.current_currency = this.$refs.current_rate_select.options[current_rateID].text;
            this.string = this.$refs.merchantAccount.value+";"+this.$refs.merchantDomainName.value+";"+this.orderReference+";"+this.$refs.orderDate.value+";"+this.current_value+";"+this.$refs.current_rate_select.options[this.$refs.current_rate_select.options.selectedIndex].text+";"+this.$refs.productName1.value+";"+this.$refs.productName2.value+";"+this.$refs.productCount1.value+";"+this.$refs.productCount2.value+";"+this.$refs.productPrice1.value+this.$refs.productPrice2.value;
            this.getSignature();
          }
        },

        reverse: function(){
          var current_rateID = this.$refs.current_rate_select.options.selectedIndex;
          var computed_rateID = this.$refs.computed_rate_select.options.selectedIndex;
          var computed_select_value = this.$refs.computed_rate_select.options[computed_rateID].value;
          var current_select_value = this.$refs.current_rate_select.options[current_rateID].value;
          this.computed_currency = this.$refs.computed_rate_select.options[computed_rateID].text;
          this.current_currency = this.$refs.current_rate_select.options[current_rateID].text;
          this.$refs.current_rate_select.options[current_rateID].text = this.computed_currency;
          this.$refs.computed_rate_select.options[computed_rateID].text = this.current_currency;
          this.$refs.current_rate_select.options[current_rateID].value = computed_select_value;
          this.$refs.computed_rate_select.options[computed_rateID].value = current_select_value;
          this.current_rate = [this.computed_rate, this.computed_rate = this.current_rate][0];
          this.convert();
        },

        getSignature: function(){
          axios.post('/getsignature',{string: this.string})
              .then((response) => {
                this.signature = response.data.hash;
                console.log(this.signature);
              });
        }
    }
  }
</script>

<style>
  @media (max-width: 830px) {
  .form-inline {
    flex-direction: column;
    align-items: stretch;
  }
}
</style>
