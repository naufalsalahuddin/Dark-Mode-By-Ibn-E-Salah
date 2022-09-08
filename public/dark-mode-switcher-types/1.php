<?php
$checked;
if(isset($_COOKIE['darkmode']) && $_COOKIE['darkmode'] == "true" ){
  $checked="checked";
}
?>

<div class="darkmodeswitchwrapper">
    <input <?php echo $checked ?> name="darkmodeswitchIbn_E_Salah" type="checkbox" class="darkmodeswitchIbn_E_Salah" id="darkmodeswitchIbn_E_Salah">
  <label for="darkmodeswitchIbn_E_Salah" class="label">
    <i class="fas fa-moon"></i>
    <i class='fas fa-sun'></i>
    <div class='ball'>
  </label>
</div>

<style>
.darkmodeswitchwrapper
{
  width:100%;
}
.darkmodeswitchwrapper .darkmodeswitchIbn_E_Salah {
  opacity: 0;
  position: absolute;
}

.darkmodeswitchwrapper .label {
  width: 50px;
  height: 26px;
  background-color:#111;
  display: flex;
  border-radius:50px;
  align-items: center;
  justify-content: space-between;
  padding: 5px;
  position: relative;
  /* transform: scale(1.5); */
}

.darkmodeswitchwrapper .ball {
  width: 20px;
  height: 20px;
  background-color: white;
  position: absolute;
  top: 2px;
  left: 2px;
  border-radius: 50%;
  transition: transform 0.2s linear;
}

/*  target the elemenent after the label*/
.darkmodeswitchwrapper .darkmodeswitchIbn_E_Salah:checked + .label .ball{
  transform: translateX(24px);
}

.darkmodeswitchwrapper .fa-moon {
  color: #90c0df;
}

.darkmodeswitchwrapper .fa-sun {
  color: yellow;
}
</style>