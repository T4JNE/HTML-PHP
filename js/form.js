function FormValidation(){
  const area = document.getElementById("farea");
  var errortext = document.getElementById("fareaErr");
  var had_err = true;

  if(area.value==""){
    errortext.innerText = "Proszę wpisać powierzchnie!";
  }
  else if(area.value < 0){
    errortext.innerText = "Powierzchnia nie może być ujemna!";
  }
  else{
    errortext.innerText = "";
    had_err = false;
  }

  var radio1 = document.getElementsByName("fhousetype");
  var errordiv = document.getElementById("HouseTypeErrorDiv");
  errortext = document.getElementById("HouseTypeErrorP");

  var hasChecked = false;

  for (let i = 0; i < radio1.length; i++) {
    if (radio1[i].checked) {
      hasChecked = true;
    }
  }
  if(hasChecked){
    errortext.innerText = "";
    errordiv.style.border = "0px";
    had_err = false;
  } else{
    errortext.innerText = "Proszę wybrać rodzaj domu!";
    errordiv.style.border = "2px solid red";
  }

  radio1 = document.getElementsByName("frooftype");
  errordiv = document.getElementById("RoofTypeErrorDiv");
  errortext = document.getElementById("RoofTypeErrorP");

  var hasChecked = false;

  for (let i = 0; i < radio1.length; i++) {
    if (radio1[i].checked) {
      hasChecked = true;
    }
  }
  if(hasChecked){
    errortext.innerText = "";
    errordiv.style.border = "0px";
    had_err = false;
  } else{
    errortext.innerText = "Proszę wybrać rodzaj dachu!";
    errordiv.style.border = "2px solid red";
  }

  if(had_err==false){
    document.forms["oferta-form"].submit();
  }
}
