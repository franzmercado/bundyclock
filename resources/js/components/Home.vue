<template>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-1">
          <img src="img/booze.jpg" height="80" alt="Logo">
        </div>
        <div class="col-md-3">
          <h5 class="company-name">ABC Corporation</h5>
          <small>#21 Luna St. Alabang, Muntinlupa</small>

        </div>
      </div>
      <div class="row">
        <div class="col-md-6 clock-wrapper">
            <div class="row mb-0">
              <div class="col-md-8 month-year">
                <b>{{ yearMonthString }}</b>
              </div>
              <div class=" col-md-4 day-string">
              <b>  {{ dayString }}</b>
            </div>
            </div>
            <div class="row justify-content-center">
              <div class="col-md-12 p-0">
                <p class="date-time">
                <b>  {{ dateTimeString }}</b>
              </p>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <input type="text" name="" class="form-control" value="">
              </div>
            </div>
        </div>
        <div class="col-md-5 offset-1">
          <div class="log-info">

          </div>
        </div>

      </div>

    </div>
</template>

<style>
.clock-wrapper{
  border: 1px solid black;
  box-shadow: 2px 3px 8px 5px #888888;
  margin: 0px;
}
.company-name{
  font-size: 24px;
  font-family: sans-serif;
  color: #000;
  margin-top: 15px;
  margin-bottom: 0px;

}
.month-year{
  border: 1px solid black;

  margin-top: 0px;
  padding-top: 10px;
  text-align: center;
  font-size: 45px;
  margin-bottom: 0px;
}
.day-string{
  border: 1px solid black;
  padding-top: 25px;
  text-align: center;
  margin-top: 0px;
  font-size: 28px;
}
.date-time{
  border: 1px solid black;
  font-size: 85px;
  font-family: sans-serif;
  color: #000;
  padding: 0px;
  margin-top: 0px;
  text-align: center;
}
.log-info{
  border: 1px solid black;

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
          }
        },
        created(){
          this.dateTimeString = moment().format('hh:mm:ss A');
          this.dayString = moment().format('dddd');
          this.yearMonthString = moment().format('MMM DD, YYYY');

          setInterval(() => {
            this.dateTimeString = moment().format('hh:mm:ss A');
          },1000);

          setInterval(() => {
            this.dayString = moment().format('dddd');
            this.yearMonthString = moment().format('MMM DD, YYYY');
          },60000);
        }
    }
</script>
