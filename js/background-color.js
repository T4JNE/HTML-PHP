$(document).ready(function(){
  const d = new Date();
  let hour = d.getHours();

  if (hour > 17 && hour <= 20){
    //wieczor 18-20
    $(".Mid").css("background-color", "rgba(255,120,120,1)");
  }else if(hour > 10 && hour <= 17){
    //poludnie 11-16
    $(".Mid").css("background-color", "rgba(111,136,255,1)");
  }  else if(hour > 5 && hour <= 10){
    //rano 6-10
    $(".Mid").css("background-color", "rgba(227,255,158,1)");
  } else {
    //noc
    $(".Mid").css("background-color", "rgba(9,10,78,1)");
  }
});
