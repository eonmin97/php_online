<div class="container text-center" >    
  <div class="row" >
    <div class="col-sm-3 well" style=' background-image: linear-gradient(black,red,white);'>
      <div class="well" style=' background-image: linear-gradient(white,gray);'>
        <p><a href="#"><?php echo $_SESSION['name'];?></a></p>
        
      <img src="https://graph.facebook.com/<?php echo $_SESSION['fbid']?>/picture" height="65" width="65" style="border-radius: 50%"/>
      </div>
      <div class="well" style=' background-image: linear-gradient(gray,black);'>
        <p style='color:white;'>search</p>
        <p>
          <span class="label label-default" ><a href='#bbq'>bbq</a></span>
          <span class="label label-primary" ><a href='#bbq' style='color:white;'>bbq</a></span>
          <span class="label label-success">Labels</span>
          <span class="label label-info">Football</span>
          <span class="label label-warning">Gaming</span>
          <span class="label label-danger">Friends</span>
        </p>
      </div>
      <div class="alert alert-success fade in">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
        <p><strong>Ey!</strong></p>
        People are looking at your profile. Find out who.
      </div>
      <p><a href="#">Link</a></p>
      <p><a href="#">Link</a></p>
      <p><a href="#">Link</a></p>
    </div>