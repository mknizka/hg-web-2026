<main>
  <section id="slide">
    <div class="cover" style="background:url(<?php echo ($content['ogimg'] ? $content['ogimg'] : '/img/system/ogimg.jpg' ); ?>) 50% 50% no-repeat;cursor:pointer;background-size:cover">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-2"></div>
          <div class="col-md-8">
            <div class="heading">

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section id="conte">
    <div class="container-fluid">
      <div class="row center-md">

        <div class="col-md-10">
          <article>
            <div class="container-fluid">
              <div class="row top-md">
                <div class="col-md-12">
                  <h1><?=$content['name'];?></h1>
                  <div class="line"><span></span><span></span><span></span></div>
                  <?=$content['text'][0];?>

                </div>
              </div>
             </div>
          </article>
        </div>
      </div>
    </div>
  </section>
  <section id="likesvote">
     <div class="container-fluid">
                    <div class="row center-md">
                      <div class="col-md-10">
                        <div class="row center-md">
                               <?php
                      // gallery
                      $gal = gallery(1, 'likevote', 'rs');
                      foreach($gal['content'] as $k => $v) {
                       echo "<div class='col-md-4'>";
                        echo "<div class='gal-img-box'>";
                            echo "<div class='gal-img'>";
                              echo $v['img'];
                            echo "</div>";
                            echo "<div class='gal-img-name'>".$v['name']."</div>";
                            echo "<div class='gal-img-like-box js-id-".$k."'>";
                              likeVote($k);
                            echo "</div>";
                          echo "</div>";
                        echo "</div>";
                      }
                    ?>
                    <script>
                      $( ".gal-img-like-box" ).on( "click touchstart", ".like-button", function() {
                        if($( this ).hasClass( "ivoted" ) == false) {
                          var id = $(this).data('id');
                          $.get( "/utility/likefoto/", { id: id} ).done(function( data ) {
                            $('.js-id-' + id).html( data );
                          });
                        }
                      });
                    </script>
                        </div>
                      </div>
                    </div>
                  </div>
  </section>
