<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
<style media="screen">
 .container {
   background-image: url(http://orig01.deviantart.net/a278/f/2010/357/9/7/seamless___gold_coins_by_bartalon-d35iydr.jpg);
   height: 750px;
 }
  .place {
    width:175px;
    height:175px;
    border: 1px solid black;
    display: inline-block;
    position: relative;
    left: 40px;
    padding: 50px;
    margin-left: 10px;

  }
  .green {
    color:green;
  }
  .red {
    color:red;
  }
p {
  font-weight: bolder;
  font-family: serif;
  font-size: 15px;
  color: white;
  text-shadow: 1px 1px black;
}
.title{
  font-weight: bolder;
  font-family: sans-serif;
  font-size: 30px;
}

  .danger {
    color: #990000;
    font-weight: bold;
    font-family: serif;
  }


  #farm {
    background-image: url(http://hdwallpaperia.com/wp-content/uploads/2013/12/Farm-Wallpaper-1080p.jpg);
  }

  #cave {
    background-image: url(http://img09.deviantart.net/5001/i/2011/322/d/e/ice_cave_by_kaddikt94-d2ly3i0.jpg);
  }
  #house {
    background-image: url(http://i35.photobucket.com/albums/d178/fmaalbum/Fruits%20Basket/eps%205%20and%206/1shigureshouse.jpg);
  }
  #casino {
    background-image: url(http://www.circusreno.com/images/casino/casinoPromotionsHeader.jpg);
  }

  .activities{
    width: 1200px;
    height: 200px;
    border: 1px solid black;
    margin: 0 auto;
    background-color: beige;
    overflow-y: scroll;
  }
  .gold {
    padding-left: 60px;
    padding-top: 1px;
  }

  h4 {
    padding-left: 60px;
    font-family: sans-serif;
    font-size: 20px;
    color: yellow;
    text-decoration: underline;
    text-shadow: 2px 2px black;
  }
h3 {
  font-family: serif;
  color: yellow;
  font-size: 30px;
  text-shadow: 3px 3px black;
}
  #log {
    padding-left: 30px;
  }

  #startover {
    background-color: lightblue;
    color: white;
    font-family: monospace;
  }
</style>
  <body>

   <div class="container">
     <div class="gold">
      <h3>Your Gold</h3>
    <input type="text" name="gold" value="<?= $this->session->userdata('gold_count');?>"><br><br>
    <form class="restart-form" action="/survey/process" method="post">
      <input type="hidden" name="action" value="restart_form">
      <input id="startover" type="submit" value="Start Over">
    </form><br>
    </div>

    <form class="place" id="farm" action="/survey/process" method="post">
      <label class="title">Farm</label>
      <p>(earns 10-20 golds)</p>
      <input type="hidden" name="building" value="farm">
      <input type="submit" value="Find Gold!">
    </form>
    <form class="place" id="cave" action="/survey/process" method="post">
      <label class="title">Cave</label>
      <p >(earns 5-10 golds)</p>
      <input type="hidden" name="building" value="cave">
      <input type="submit" value="Find Gold!">
    </form>
    <form class="place" id="house" action="/survey/process" method="post">
      <label class="title">House</label>
      <p>(earns 2-5 golds)</p>
      <input type="hidden" name="building" value="house">
      <input type="submit" value="Find Gold!">
    </form>
    <form class="place" id="casino" action="/survey/process" method="post">
      <label class="title">Casino</label>
      <p>(earns/takes 0-50 golds)</p>
      <input type="hidden" name="building" value="casino">
      <input type="submit" value="Find Gold!">
    </form><br>

    <h4>Activities</h4>
    <div class="activities">
    <input type="hidden" name="activites" value="">
    <div id="log"><?= ($this->session->userdata('activity') != false) ? implode(" ",array_reverse($this->session->userdata('activity'))) : ""; ?> </div>
    </div>
    </div>
  </div>
  </body>
</html>
