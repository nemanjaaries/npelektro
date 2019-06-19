<template>
  <div class="contact-section">
    <v-container>
      <v-layout wrap>
        <v-flex xs12 md6 class="px-3">
          <h2>Contact info</h2>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio
            est nesciunt quas ducimus perferendis sequi iste itaque totam ex hic
            veniam dolorem, fuga nobis sunt repudiandae dolore maiores, fugiat
            nihil quibusdam asperiores laboriosam, consequatur ut. At possimus a
            quidem ipsa.
            <br />

            <br />Lorem ipsum dolor sit amet consectetur adipisicing elit.
            Distinctio est nesciunt quas ducimus perferendis sequi iste itaque
            totam ex hic veniam dolorem, fuga nobis sunt repudiandae dolore
            maiores.
          </p>
          <ul>
            <li>
              <div class="icon-round">
                <v-icon>location_on</v-icon>
              </div>
              <h6>Address</h6>
              <p>Freedom Way, Jersey City, NJ 07305, USA</p>
            </li>
            <li>
              <div class="icon-round">
                <v-icon>phone</v-icon>
              </div>
              <h6>Phone</h6>
              <p>+88 01911854378</p>
            </li>
            <li>
              <div class="icon-round">
                <v-icon>email</v-icon>
              </div>
              <h6>Email</h6>
              <p>backpiper.com@gmail.com</p>
            </li>
          </ul>
        </v-flex>
        <v-flex xs12 md6 class="px-3">
          <h2>Our location</h2>
          <div class="map">
            <iframe
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2000.6817927000748!2d20.412989250971137!3d44.83396343024129!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x475a65a024f1f51f%3A0xf48fdbcda60f0047!2z0I_QvtC90LAg0JrQtdC90LXQtNC40ZjQsA!5e0!3m2!1ssr!2srs!4v1556662390627!5m2!1ssr!2srs"
              width="100%"
              height="100%"
              frameborder="0"
              style="border:0"
              allowfullscreen
            ></iframe>
          </div>
        </v-flex>
      </v-layout>
    </v-container>
  </div>
</template>

<script>
export default {}
</script>

<style scoped>
h2 {
  text-transform: uppercase;
  margin: 95px 0 35px 0;
  font-size: 35px;
}
p {
  color: #6f6f6f;
  line-height: 26px;
}
ul {
  list-style-type: none;
  margin-top: 70px;
  padding: 0;
}
li {
  position: relative;
  padding-left: 85px;
  margin-bottom: 50px;
  display: list-item;
}
.icon-round * {
  position: absolute;
  top: -5px;
  left: 0px;
  border: 1px solid #d73e4d;
  border-radius: 50%;
  font-size: 40px;
  padding: 9px;
  background-color: #d73e4d;
  color: #fff;
  transition: all 0.5s;
}
ul h6 {
  font-size: 14px;
  margin-bottom: 8px;
  color: #292929;
  text-transform: uppercase;
  font-weight: 700;
}
ul p {
  line-height: 26px;
}
li:hover .icon-round * {
  color: #d73e4d;
  background-color: #fff;
}
.map {
  height: 500px;
}
/* Extra small (small to large handset) */
@media only screen and (max-width: 600px) {
  h2 {
    margin: 50px 0 30px 0;
  }
  .map {
    height: 400px;
  }
}
/* Small (small to medium tablet) */
@media only screen and (max-width: 959px) {
  h2 {
    margin: 50px 0 30px 0;
  }
  .map {
    height: 400px;
  }
}
</style>
