function MenuClick(){
  if(!ShowAccount){
    document.getElementById("DropMenu").classList.toggle("dropdown-content-show");
  }
}

var ShowAccount = false;

function AccountClick(){
  //document.getElementById("AccountDropMenu").classList.toggle("dropdown-content-show");

  ShowAccount = !ShowAccount;

  if(ShowAccount){
    var xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("account-div").innerHTML =
        this.responseText;
        console.log(this.responseText);
      } else {
        console.warn("Error"+this.readyState+" "+this.status);
      }
    };

    xhttp.open("GET", "konto.php", true);
    xhttp.send();
  }else {
    document.getElementById("account-div").innerHTML = "";
  }
}

function AccountClick2(){
  MenuClick();
  AccountClick();
}
