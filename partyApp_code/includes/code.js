var selectedCategory , selectedLoaction, selectedTheme;
var clicked_btn =0;
var currentContainer="container1";
var index =0;
var firstTimeFlag=0;
var prevBtnClass ="prevBtn1";
var nextBtnClass ="nextBtn1";
var itemsClass ="items1";
var allChildren;
var NameArray=[];
var websiteArray=[];
var ratingArray=[];
var selectedIndex;
var finalSelectedName;
var thumbnailArray=[];
var JSONIndex=0;
var numberOfItemsInData =12;
var arrJSONFlag =[0,0,0];



$( ".grid-container" ).click(function( event ) {
  console.log(event.target); 
  if(event.target.className!= "image")
    return;
  var color;
  
  var title = document.getElementsByClassName("title")[0].textContent;
   if(document.getElementsByClassName("selected_image").length != 0){
    console.log(title);
     document.getElementsByClassName("selected_image")[0].className="image";
   }
   
   event.target.className = "selected_image";
  if(title == "category"){
    color = "#5680E9";
    selectedCategory = document.getElementsByClassName("selected_image")[0].parentElement.getElementsByTagName("h1")[0].textContent;  
  }
  else if(title =="Theme"){
    color ="#84CEEB";
    selectedTheme = document.getElementsByClassName("selected_image")[0].parentElement.getElementsByTagName("h1")[0].textContent;
  }
  else if(title == "location"){

    color = "#5AB9EA";
    selectedLoaction = document.getElementsByClassName("selected_image")[0].parentElement.getElementsByTagName("h1")[0].textContent;
  
  }
    event.target.style.borderColor=color;
    event.target.style.borderStyle ="solid";
    event.target.style.borderWidth="5px";
    event.target.style.opacity="1";
    
  allImages = document.getElementsByClassName("image");
  for(var i=0 ;i<5;i++){
    allImages[i].style.borderStyle ="none";
    allImages[i].style.opacity ="0.5";
  }

});

$("#party-summary").ready(function(){
  $.getJSON("data/finalData.JSON", function(data){
    $.each(data, function(key, entry){
      var newPar = document.createElement("p");
      console.log(entry.category);
      console.log(entry.theme);
      console.log(entry.location);
      newPar.textContent="Category: " + entry.category + "Theme: "+ entry.theme + "Location: "+ entry.location;
      $("#party-summary").append(newPar);
    });
  });
});
$(document).ready(function(){
    $(".collapsible1").click(function(){
   
        if(currentContainer!="container1"&&clicked_btn!=0){
            $("."+currentContainer).css("display","none");
            firstTimeFlag=0;
            index=0;
        }
        currentContainer="container1";
        JSONFunction("data/food.JSON","container1", "items1","prev_Btn_1","next_Btn_1");
    });
    $(".collapsible2").click(function(){
        if(currentContainer!="container2"&&clicked_btn!=0){
            $("."+currentContainer).css("display","none");
            firstTimeFlag=0;
            index=0;
        }
        currentContainer="container2";
        JSONFunction("data/food.JSON","container2", "items2","prev_Btn_2","next_Btn_2");
        
    });
    $(".collapsible3").click(function(){
        if(currentContainer!="container3"&&clicked_btn!=0){
            $("."+currentContainer).css("display","none");
            firstTimeFlag=0;
            index=0;
        }
        currentContainer="container3";
        JSONFunction("data/food.JSON","container3", "items3","prev_Btn_3","next_Btn_3");
    });
    $(".collapsible4").click(function(){
        if(currentContainer!="container4"&&clicked_btn!=0){
            $("."+currentContainer).css("display","none");
            firstTimeFlag=0;
            index=0;
        }
        currentContainer="container4";
        JSONFunction("data/food.JSON","container4", "items4","prev_Btn_4","next_Btn_4");
    });
   
   
});


function JSONFunction(JSONpath,_containerClass,_items,_prev,_next){
    $.getJSON(JSONpath, function (data) {
        $.each(data, function (key, entry) {
         NameArray[JSONIndex]=entry.name;
         console.log(entry.name);
         thumbnailArray[JSONIndex]=entry.thumbnail;
         console.log(entry.thumbnail);
         ratingArray[JSONIndex]=entry.rating;
         websiteArray[JSONIndex]=entry.website;
            JSONIndex++;
        })
        if(JSONIndex>=12)
        {
            console.log("hello");
            firstTimeFlag=1;
        }
        console.log("hello2");
      if(firstTimeFlag==1){
      myFunction(_containerClass,_items,_prev,_next);
      }
      });
      
    };

function finalDataFuncton(){
  $.getJSON("data/finalData.JSON", function (data) {
      $.each(data, function (key, entry) {
        if(arrJSONFlag[0]==1){
          entry.category=selctedCategory;
          console.log(entry.category);
    
          arrJSONFlag[0]=0;
        }
        if(arrJSONFlag[2]==1){
          entry.location=selctedLoaction;
          arrJSONFlag[2]=0;
         
          console.log(entry.location);
        }
        if(arrJSONFlag[1]==1){
          entry.theme=selctedTheme;
          console.log(entry.theme);
          arrJSONFlag[1]=0;
        }
      })
    }
  )};
    
  
function myFunction(containerClass,items,prev,next){
    prevBtnClass=prev;
    nextBtnClass=next;
    itemsClass=items;
    allChildren=$("."+items).children();
    if(clicked_btn==0&&index==0){
        for(var i=0;i<4;i++){
           allChildren[i].children[0].setAttribute("src",thumbnailArray[i]);
           console.log(thumbnailArray[i]) ;
           allChildren[i].children[1].textContent=NameArray[i];
           console.log(NameArray[i]) ;
        }
        index = i;
        console.log("end of first loop ,index number " + index);
        $("."+nextBtnClass).css("display","block");
        $("."+prevBtnClass).css("display","none");
        $("."+containerClass).css("display","block");
        document.getElementsByClassName(prevBtnClass)[0].addEventListener("click", prevClickFunction);
        document.getElementsByClassName(nextBtnClass)[0].addEventListener("click", nextClickFunction);
        console.log("clicked_btn at the end of first interaction" + clicked_btn);
        clicked_btn=1;
    }
    else if( clicked_btn ==1){
        $("."+containerClass).css("display","none");
        clicked_btn=0;
        index=0;
    }

}


function nextClickFunction(){
    if(index==numberOfItemsInData)//got to the end of data
        return;
    if(index==4){
        $("."+prevBtnClass).css("display","block");
    }
    for(var j=0;j<4;j++){
        allChildren[j].children[0].setAttribute("src",thumbnailArray[index]);
        console.log(thumbnailArray[index]) ;
        allChildren[j].children[1].textContent=NameArray[index];
        console.log(NameArray[index]) ;
        index++;
    }
    console.log("end of next loop ,index number " + index);

}
function prevClickFunction(){
    
    index =  index-8;
    for(var j=0;j<4;j++){
        allChildren[j].children[0].setAttribute("src",thumbnailArray[index]);
        console.log(thumbnailArray[index]) ;
        allChildren[j].children[1].textContent=NameArray[index];
        console.log(NameArray[index]) ;
        index++;
    }
    console.log("end of next loop ,index number " + index);
    if(index==4){
        $("."+prevBtnClass).css("display","none");
    }
}

$(".info").click(function(event){
    console.log(event.target.closest("span").children[1].textContent);
    var selectedName = event.target.closest("span").children[1].textContent;
    selectedIndex=NameArray.indexOf(selectedName);
    console.log(selectedIndex);
    var modalChildren = $(".modal-content").children();
    modalChildren[1].setAttribute("src",thumbnailArray[selectedIndex]);
    modalChildren[2].textContent=NameArray[selectedIndex];
    modalChildren[3].setAttribute("href",websiteArray[selectedIndex]);
    var starsChildren = $(".stars").children();
    for(var j=0;j<5;j++){
        if(j<parseInt(ratingArray[selectedIndex])){
        starsChildren[j].className="fa fa-star checked";
        }
        else{
            starsChildren[j].className="fa fa-star"

        }
    }
    document.getElementById("myModal").style.display ="block";
})

document.getElementsByClassName("book_btn")[0].onclick = function() {
    finalSelectedName=NameArray[selectedIndex];
    
    document.getElementById("myModal").style.display = "none";
    
  };

document.getElementsByClassName("close")[0].onclick = function() {
    document.getElementById("myModal").style.display = "none";
  };
  document.getElementsByClassName("close2")[0].onclick = function() {
    document.getElementById("myModal2").style.display = "none";
  };
$(".pass").click(function(){
    document.getElementById("myModal2").style.display = "block";
})

function openLeftMenu() {
    document.getElementById("leftMenu").style.display = "block";
  }
  
  function closeLeftMenu() {
    document.getElementById("leftMenu").style.display = "none";
  }
  

  $('#example2').calendar({
    type: 'date'
  });
  $('#example3').calendar({
    type: 'time'
  });


  