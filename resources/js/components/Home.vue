<template>
    <div class="container">
      <div class="row justify-content-center">
        <img src="img/booze.jpg" height="80" alt="Logo"> <h5 class="company-name">{{ companyname }}</h5>
      </div>
      <div class="row">
        <div class="col-md-6 clock-wrapper">
            <div class="row">
              <div class="col-md-8 month-year">
                <b>{{ yearMonthString }}</b>
              </div>

              <div class=" col-md-4 day-string">
              <b>  {{ dayString }}</b>
            </div>
            </div>
            <hr>
              <p class="date-time">
              <b>  {{ dateTimeString }}</b>
            </p>
            <hr>
        </div>
        <div class="col-md-6">
          <div class="log-info">

          </div>
        </div>

      </div>

    </div>
</template>

<style>
.clock-wrapper{
  border: 1px solid black;
  box-shadow: 1px;
  margin: 0px;
}
.company-name{
  font-size: 24px;
  font-family: sans-serif;
  color: #000;
  margin-top: 30px;
}
.month-year{
  font-size: 45px;
}
.day-string{
  margin-top: 20px;
  font-size: 28px;
}
.date-time{
  font-size: 80px;
  font-family: sans-serif;
  color: #000;
  margin-top: 20px;
  text-align: center;
}
.log-info{
  border: 1px solid black;
  height: 450px;
}
</style>

<script>
import moment from 'moment';

    export default {
        data() {
          return{
            yearMonthString: '',
            dateTimeString : '',
            dayString: '',
            companyname: 'ABC Corporation'
          }
        },
        created(){
          this.dateTimeString = moment().format('h:mm:ss A');
          this.dayString = moment().format('dddd');
          this.yearMonthString = moment().format('MMMM D, YYYY');

          setInterval(() => {
            this.dateTimeString = moment().format('h:mm:ss A');
          },1000);

          setInterval(() => {
            this.dayString = moment().format('dddd');
            this.yearMonthString = moment().format('MMMM D, YYYY');
          },60000);
        }
    }
</script>
