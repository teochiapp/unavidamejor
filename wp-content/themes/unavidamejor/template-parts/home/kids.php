<div class="kids-container">
    <div class="row">
        <div class="col-12  col-md-4 col-lg-4 col-kids">
            <div class="kids-div-imgs">
                <img class="kids-kids-img" src="<?php the_field(selector: 'imagen_kids'); ?>" alt="kids">
                 <div class="kids-div-text">
                <h2>
                    UVM
                    <span>K</span>
                    <span>I</span>
                    <span>D</span>
                    <span>S</span>
                </h2>
            </div>
            </div>  
        </div>
        <div class="col-12 col-md-8 col-lg-8 col-babies">
            
            <img class="kids-img-babys" src="<?php the_field(selector: 'imagen_babies'); ?>" alt="">
            
        </div>

    </div>
</div>

<style>
.col-kids {
    padding: 0 !important;
}


.col-babies{
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    max-height: 550px;
    gap:20px;
}
.kids-img-babys{
width: 800px;

}

.kids-kids-img{
    max-height: 550px !important;
   width: 600px;
    object-fit: cover;
    width: 100% !important;
}
.kids-text-img .kids-img-fondo{
    
    width: 100%;
    max-width: 550px;
}
.kids-container{
    padding:0 !important;
    margin: 0 !important;
    overflow: hidden;
    background-image: url('<?php echo get_field('imagen_fondo'); ?>');
     background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    position: relative;
}

.kids-div-imgs{
    position: relative;
}

.kids-div-text {
    position: absolute;
    z-index: 2;
    text-align: center;
    z-index: 999999;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    color: white;
    width: 100%;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
}
.kids-div-text h2{
    font-weight: bold;
    font-size: 5rem;
    z-index: 999999;
}


.kids-div-text span:nth-child(1) { color: #fdd93a; } /* K rojo   */
.kids-div-text span:nth-child(2) { color: #ff0094; } /* K rojo   */
.kids-div-text span:nth-child(3) { color: #008d6f; } /* K rojo   */
.kids-div-text span:nth-child(4) { color: #004aad; } /* K rojo   */



@media ((min-width: 600px) and (max-width: 1920px)) {
  .kids-kids-img {
    width: clamp(200px, 36vw, 600px);
  }
  .kids-img-babys{
    width: clamp(400px, 40vw, 800px);
  }
  .kids-div-text h2 {
    font-size: clamp(2rem, 5vw, 5rem);
    font-family: var(--heading-font);
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
  }
}
@media (max-width: 765px) {
  .kids-kids-img {
    width: 100%;
    height: auto;
    object-fit: fill;
  }
  .kids-img-babys{
    width: 100%;
    height: auto;
  }
  .kids-div-text h2 {
    font-size: 3.5rem;
  }

  .col-babies{
    padding: 15px;
}
    
}
</style>