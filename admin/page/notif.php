  <?php
  if(isset($_POST['id'])){
      $id = addslashes($_POST['id']);
      $up = mysql_query("UPDATE log SET status='y' WHERE id='$id'");
  }
  ?>
  <body>
  <div class="container">
            <div id="main">
                <!-- start:breadcrumb -->

       
         <h4 class="modal-title" id="myModalLabel">Notif</h4>
        <div class="area-loading"></div>
      </div>
       <?php 
        $loadsiswa = mysql_query("SELECT * FROM log WHERE status='n'");
      ?>
      <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                               <h3>Notif</h3>
                               <?php
                               while($arr = mysql_fetch_array($loadsiswa)):
                                   ?>
                                   <div class="card">
                                       <div class="card body">
                                           <?= $arr['email']; ?>
                                           <p><?= $arr['act']; ?> - <?= $arr['tanggal'] ?></p>
                                           <form method="POST">
                                               <input type="hidden" name="id" value="<?= $arr['id'] ?>">
                                               <hr><button type="submit">Read</button>
                                           </form>
                                           
                                       </div>
                                   </div>
                                <?php   
                               endwhile;
                               ?>
                            </div>
                        </div>
                    </div>
        </div>
    </div>
</body>