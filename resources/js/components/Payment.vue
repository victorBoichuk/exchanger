<template>
  <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-9">
        <div class="card">
            <div class="card-header">
              <div class="text-center font-weight-bold">
                Данні оплати
              </div>
            </div>
            <div class="card-body">
              <form method="post" action="https://secure.wayforpay.com/pay" accept-charset="utf-8">
               <input name="merchantAccount" value="freelance_user_5f423b7780c06">
               <input name="merchantAuthType" value="SimpleSignature">
               <input name="merchantDomainName" value="www.marketdddd.ua">
               <input name="merchantSecretKey" value="77bd75340cb1347e89f326a3852becf867931834">
               <input name="orderReference" value="ghghghj666">
               <input name="orderDate" value="20200823">
               <input name="amount" value="1547.36">
               <input name="currency" value="UAH">
               <input name="orderTimeout" value="49000">
               <input name="clientFirstName" value="Вася">
               <input name="clientLastName" value="Пупкин">
               <input name="clientAddress" value="пр. Гагарина, 12">
               <input name="clientCity" value="Днепропетровск">
               <input name="clientEmail" value="some@mail.com">
               <input name="defaultPaymentSystem" value="card">
               <button type="submit">Оплатить</button>
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
         };
        },
        watch:{

        },
        mounted() {
          axios.post('/payment')
              .then((request) => {
                console.log(request);
              });
        },
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
