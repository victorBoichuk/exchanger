<template>
  <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-9">
        <div class="card">
            <div class="card-header">
              <div class="hidden-center font-weight-bold">
                Поповнення
              </div>
            </div>
            <div class="card-body">
              <div class="form-inline mt-2 justify-content-center">
                <input class="form-control mx-2 mt-2" type="number" ref="amount" v-on:input="cash_amount = $event.target.value" pattern="^\d+(?:\.\d{1,2})?$">
                <select class="custom-select mx-2 mt-2" v-on:change="getCurrentCurrency" ref="current_rate_select">
                  <option selected>Оберіть...</option>
                  <option value="1" title="Українська гривня">UAH</option>
                  <option v-for="(jsn, ind) in json_data" :key="ind" v-if="jsn['cc']!='XAU'&&jsn['cc']!='XAG'&&jsn['cc']!='XPD'&&jsn['cc']!='XPT'&&jsn['cc']!='HRK'&&jsn['cc']!='DKK'" :title="jsn['txt']" :value="jsn['rate']">{{jsn['cc']}}</option>
                </select>
              </div>
              <form id="test-form" class="form-inline mt-2 justify-content-center" method="post" action="https://secure.wayforpay.com/pay" accept-charset="utf-8">
                  <input  type="hidden" name="merchantAccount" ref="merchantAccount" value="freelance_user_5f423b7780c06">
                  <input  type="hidden" name="merchantAuthType" value="SimpleSignature">
                  <input  type="hidden" name="merchantDomainName" ref="merchantDomainName" value="test">
                  <input  type="hidden" name="orderReference" ref="orderReference" :value="transactionId">
                  <input  type="hidden" name="orderDate" ref="orderDate" :value="today">
                  <input type="hidden" name="amount" :value="cash_amount">
                  <input  type="hidden" name="currency" ref="currency" :value="current_currency">
                  <input  type="hidden" name="orderTimeout" value="49000">
                  <input  type="hidden" name="productName" ref="productName" value="Поповнення рахунку">
                  <input  type="hidden" name="productPrice" ref="productPrice" :value="cash_amount">
                  <input  type="hidden" name="productCount" ref="productCount" value="1">
                  <input  type="hidden" name="defaultPaymentSystem" value="card">
                  <input type="hidden" name="merchantSignature":value="signature">
                  <input type="submit" value="Внести кошти" class="btn btn-primary w-50">
            </form>
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
              userID:document.querySelector('meta[name="user-id"]').getAttribute('content'),
              cash_amount: 0,
              string:'',
              signature:'',
              current_currency: '',
              current_rate:1,
              transactionId:0,
              today: ''
         };
        },
        watch:{
            cash_amount: function(){
              if (this.cash_amount>149999/this.current_rate){
                this.cash_amount=(149999/this.current_rate).toFixed(2);
              }
              this.getString();
            }
        },
        mounted() {
          this.update(),
          this.getTransactionId(),
          this.getPaymentStatus()
        },
        computed: {
        },
        methods:{
          getSignature: function(){
            axios.post('/getsignature',{string: this.string})
                .then((response) => {
                  this.signature = response.data.hash;
                  //console.log(this.signature);
                });
          },
          update: function() {
                 axios.get('/getexchangerates')
                     .then((response) => {
                       this.json_data = JSON.parse(response.data.response.rates);
                       //console.log(this.json_data);
                     });
        },
        getCurrentCurrency:function(){
          var current_rateID = this.$refs.current_rate_select.options.selectedIndex;
          this.current_currency = this.$refs.current_rate_select.options[current_rateID].text;
          this.current_rate = this.$refs.current_rate_select.options[current_rateID].value;
          console.log(this.current_rate);
          this.getString();
        },
        getString:function(){
          this.string = this.$refs.merchantAccount.value+";"+this.$refs.merchantDomainName.value+";"+this.$refs.orderReference.value+";"+this.today+";"+this.$refs.amount.value+";"+this.current_currency+";"+this.$refs.productName.value+";"+this.$refs.productCount.value+";"+this.$refs.amount.value;
          this.$refs.amount.value=this.cash_amount;
          this.getSignature();
        },
        getTransactionId: function(){
          axios.get('/gettransactionid', {params:{userID: this.userID}})
              .then((response) => {
                this.transactionId = response.data.transactionId+1;
                this.today = response.data.today;
                //console.log(this.today);
              });
        },
        setPaymentData: function(amount, currency){
          axios.post('/settransaction', {userID: this.userID, amount: amount, currency: currency})
              .then((response) => {
              });
              console.log(amount);
        },
        getPaymentStatus: function(){
          axios.get('/getpaymentstatus', {params:{userID: this.userID}})
              .then((response) => {
                var paymentStatus = JSON.parse(response.data.response);
                console.log(response.data.response);
                if (paymentStatus['amount']>0){
                  //console.log(paymentStatus['amount']);
                  this.setPaymentData(paymentStatus['amount'], paymentStatus['currency']);
                }
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
