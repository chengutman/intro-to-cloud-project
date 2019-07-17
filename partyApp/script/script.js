

// arrays for json input
var food = [];
var drinks = [];
var massage = [];
var resturants = [];
var spa = [];
var dj = [];
var clubs = [];
var rent = [];
var guestdata = [];

var checkingBeforeSubmit=[];

var accordionFirstSelect;
// saving the the json array we are currently working on
var currentArray = [];
//index of the json data we are displayind in the collapsible
var infoIndex = 0;
//saving the clicked class of the costomised list
var currentClickedSecond;
// saving number of items added to each constumized list 
var divItemCount = [0,0,0];
// saving the current class of the costumize list we are working on
var currentDivCountIndex = 0 ;
//saving the current modal id we are showing 
var modalIdToShow;

var partyInfoData = [];
var currentClicked = 0;
window.onload = function() {
 var url = window.location.href;
 if(url.includes("party-info")){
   var pos = url.indexOf("=");
   var res =  url.slice(pos+1,url.length);
   $.post("./includes/partyinfo.php",{'pid':res} , function(data){
        partyInfoData  = JSON.parse(data);
        partyInfoFunction(partyInfoData);
   });

 }
 if(url.includes("partys-page")){
  $.ajax({
    type: "GET",
    url: './includes/partypage.php',
      success: function(data){
       var partyPageData  = JSON.parse(data);
       var table = document.getElementsByClassName("party-table")[0];
      for(var i=partyPageData.length-1;i >= 0;i--){
          var row = table.insertRow(1);
          row.className ="clickable-row " + partyPageData[i].pid;
          var cell1 = row.insertCell(0);
          var cell2 = row.insertCell(1);
          var cell3 = row.insertCell(2);
          cell1.innerHTML = partyPageData[i].pc;
          cell2.innerHTML = partyPageData[i].psdt;
          cell3.innerHTML = partyPageData[i].ped;
          
          
      }
    }

   
  });
  
  }
 
 if(url.includes("details")){
  JSONFunction("data/food.JSON" , food,"food");
  JSONFunction("data/drinks.JSON" , drinks,"drinks");
  JSONFunction("data/massage.JSON" , massage ,"massage");
  JSONFunction("data/resturants.JSON" , resturants,"resturants");
  JSONFunction("data/clubs.JSON" , clubs,"clubs");
  JSONFunction("data/Dj.JSON" , dj ,"dj");
  JSONFunction("data/spa.JSON" , spa,"spa");
  $.ajax({
    type: "GET",
    url: './includes/guestjson.php',
      success: function(data){
        guestdata  = JSON.parse(data);
      }
  });
 }
};


function JSONFunction(JSONpath,array,type){
  $.getJSON(JSONpath, function (data) {
    var index = 0 ;
    $.each(data, function (key, entry) {
      if(type == "massage"){
        array[index] = {name: entry.name, about: entry.about, Tel: entry.Tel};
      }
      if(type == "dj" || type == "drinks"){
      array[index] = {name: entry.name, thmb:entry.thumbnail , web: entry.website , Tel : entry.Tel};
      }
      if(type == "food"){
        array[index] = {name: entry.name, thmb:entry.thumbnail , web: entry.website , rating : entry.rating};
      }
      if(type == "resturants"){
        array[index] = {name: entry.name, thmb:entry.thumbnail , web: entry.website ,Tel : entry.Tel, address: entry.address, rating : entry.rating};
      }
      if(type == "spa"){
        array[index] = {name: entry.name, thmb:entry.thumbnail , web: entry.website ,Tel : entry.Tel, address: entry.address};
      }
      if(type == "clubs"){
        array[index] = {name: entry.name, thmb:entry.thumbnail , web: entry.website , address: entry.address};
      }
      if(type == "rent"){
        array[index] = { thmb:entry.thumbnail , web: entry.website ,Tel : entry.Tel, address: entry.address};
      }
      index ++;
    })
  });
};

$('a[href*="#explore"]').on('click', function(e) {
    e.preventDefault()
  
    $('html, body').animate(
      {
        scrollTop: $($(this).attr('href')).offset().top,
      },
      500,
      'linear'
    )
  });


 $("#add-guest").on("click",function(){
    // div contianer for the new guest checkbox
    var guestItemContainer = document.createElement("div");
    guestItemContainer.className = "guest-item-container";
    document.getElementsByClassName("guest-form")[0].insertBefore(guestItemContainer,document.getElementsByClassName("guest-form")[0].childNodes[0]);

    //create a new checkbox input
    var fname = document.getElementsByName("firstname")[0].value;
    var lname = document.getElementsByName("lastname")[0].value;
    var newGuest = document.createElement("INPUT");
    newGuest.setAttribute("type", "checkbox");
    newGuest.setAttribute("name","guest[]");
    newGuest.setAttribute("value",fname + " " + lname);
    newGuest.checked = 'true';
    var numOfCurrentGuests = document.getElementsByClassName("guest-form")[0].length;
    var guestID = "guest" + numOfCurrentGuests;
    newGuest.id = guestID;

    //create a lable for the new checkbox
    var labelForGuest = document.createElement("label");
    labelForGuest.setAttribute("for",guestID);
    labelForGuest.innerHTML = fname + " " + lname;

    guestItemContainer.appendChild(newGuest);
    guestItemContainer.appendChild(labelForGuest);
  });
  

  $(".choose-layout").click(function(event) {
    if(event.target.className!= "image")
      return;
    $(".next-heading").show();
    var bordercolor;
    
    var title = document.getElementsByClassName("title")[0].textContent;
    
     if(document.getElementsByClassName("selected_image").length != 0){
       document.getElementsByClassName("selected_image")[0].className="image";
     }
     
    event.target.className = "selected_image";
    if(title == "CATEGORY"){
      bordercolor = "#5680E9";
      selectedCategory = document.getElementsByClassName("selected_image")[0].parentElement.getElementsByTagName("p")[0].textContent;  
      document.getElementById("chosen").setAttribute("value",selectedCategory);
    }
    else if(title =="THEME"){
      bordercolor = "#5AB9EA";
      selectedTheme = document.getElementsByClassName("selected_image")[0].parentElement.getElementsByTagName("p")[0].textContent;
      document.getElementById("chosen").setAttribute("value",selectedTheme);
    }
    else if(title == "LOCATION"){
      bordercolor ="#84CEEB";
      selectedLoaction = document.getElementsByClassName("selected_image")[0].parentElement.getElementsByTagName("p")[0].textContent;
      document.getElementById("chosen").setAttribute("value",selectedLoaction);
    }
      event.target.style.borderColor = bordercolor;
      event.target.style.borderStyle ="solid";
      event.target.style.borderWidth="5px";
      event.target.style.opacity="1";
      
    var allImages = document.getElementsByClassName("image");
    for(var i=0 ;i<5;i++){
      allImages[i].style.borderStyle ="none";
      allImages[i].style.opacity ="0.5";
    }
  });
  /*------------------------------------------------------------------*/
  
  var openDetails = 0;
  var chosenDetails = " ";

  $(".accordion-first").click(function(event){

    var clickedButton = event.target.innerHTML;
    var parentName = event.target.parentElement.className;
    pos = parentName.indexOf("-");
    res = parentName.slice(0,pos);
    accordionFirstSelect = res ;
    detailsClassName = "details "+res ;
      if( openDetails == 0 ){
        chosenDetails = detailsClassName;
        detailsClass = document.getElementsByClassName(detailsClassName)[0];
        detailsClass.style.opacity = "1";
        detailsClass.style.maxHeight = "200px";
        openDetails =1;
        infoIndex =0;
        chooseDisplay(res);

      }
      else if( openDetails == 1){
        if(chosenDetails == detailsClassName){
        detailsClass = document.getElementsByClassName(detailsClassName)[0];
        detailsClass.style.opacity = "0";
        detailsClass.style.height = "0px";
        detailsClass.style.maxHeight = "0px";
        chosenDetails = " ";
        infoIndex =0;
        openDetails = 0;
        }
      else{
        var chosenClass = document.getElementsByClassName(chosenDetails)[0];
        chosenClass.style.opacity = "0";
        chosenClass.style.height = "0px";
        chosenClass.style.maxHeight = "0px";
        detailsClass = document.getElementsByClassName(detailsClassName)[0];
        detailsClass.style.opacity = "1";
        detailsClass.style.maxHeight = "200px";
        chosenDetails = detailsClassName;
        infoIndex =0;
        chooseDisplay(res);
      }
    }
  
});


function chooseDisplay(dname){
  if(dname == "food"){
    currentArray = food;
      displayInfo(food,"food");
  }
  if(dname == "drinks"){
    currentArray = drinks;
    displayInfo(drinks,"drinks");
  }
  if(dname == "spa"){
    currentArray = spa;
    displayInfo(spa,"spa");
  }
  if(dname == "extra"){
    currentArray = dj;
    displayInfo(dj,"extra");
  }
  if(dname == "resturants"){
    currentArray = resturants;
    displayInfo(resturants,"location");
  }
  if(dname == "clubs"){
    currentArray = clubs;
    displayInfo(clubs,"location");
  }
  if(dname == "dj"){
    currentArray = dj;
    displayInfo(dj,"dj");
  }
  if(dname == "massage"){
    currentArray = massage;
    displayInfo(massage,"massage");
  }
 
};

function displayInfo(array,name){
    parentName  = "details " + name
    currentItemContainer = document.getElementsByClassName(parentName)[0].children[2];
    itemIndex = 0;
    if(infoIndex == 0){
     
    }
    
    if(infoIndex < array.length-3){
    
    for( i= infoIndex ; i< infoIndex + 4 ; i++){
        currentItemContainer.children[itemIndex].children[0].setAttribute("src",array[i].thmb);
        currentItemContainer.children[itemIndex].children[1].textContent = array[i].name;
        itemIndex ++;
    }
  }
  else{
  
  }

};
/*--------------------------------------------------------------------------------------------*/
$(".accordion-second").click(function(event){
   currentClickedSecond = event.currentTarget.parentElement.className.slice(0,event.currentTarget.parentElement.className.indexOf("-"));
   if(currentClickedSecond == "food"){
     currentDivCountIndex = 0;
   }
   else if(currentClickedSecond == "drinks"){
    currentDivCountIndex = 1;
  }
  else if(currentClickedSecond == "extra"){
    currentDivCountIndex = 2;
  }
    modalIdToShow = "#myModal-list" + "-" + currentClickedSecond;
  $(modalIdToShow).show();
});

$(".add-btn").click(function(event){
  modalBodyId = "modal-body-id-list-"+currentClickedSecond;

  //fetching the current modal body to where we want to add inputs
  var currModel = document.getElementById(modalBodyId);

  //creating new div elemet to where we will add the new input to 
  var newDiv = document.createElement("DIV");
  newDiv.className = currentClickedSecond+"-item "+divItemCount[currentDivCountIndex];
  currModel.appendChild(newDiv);

  //creating text input
  var textInputName = "input"+currentClickedSecond+"[]";
  var textInput = document.createElement("INPUT");
  textInput.setAttribute("type","text");
  textInput.setAttribute("name",textInputName);
  textInput.setAttribute("value","");

  //creating select input

  selectInputName = "guestList"+currentClickedSecond+"[]";
  var selectInput = document.createElement("SELECT");
  selectInput.setAttribute("name",selectInputName);

  //adding options to select input
  for(var i=0;i<guestdata.length;i++){
    var o = document.createElement("option");
    o.text = guestdata[i].fn + " " + guestdata[i].ln;
    o.setAttribute("value",guestdata[i].id);
    selectInput.add(o,i);
  }

  //appending text input and select input to the created div 
  newDiv.appendChild(textInput);
  newDiv.appendChild(selectInput);

  divItemCount[currentDivCountIndex]++;
});

$(".glider-next").click(function(event){
  var parentName = event.target.parentElement.parentElement.className;
  var x=document.getElementsByClassName(parentName)[0].className;
  var y=x.slice(x.indexOf(" ")+1,x.length);
  infoIndex+=1;
  chooseDisplay(y);
});

$(".glider-prev").click(function(event){
  var parentName = event.target.parentElement.parentElement.className;
  var x=document.getElementsByClassName(parentName)[0].className;
  var y=x.slice(x.indexOf(" ")+1,x.length);
  infoIndex-=1;
  chooseDisplay(y);
});

$(".item-s").click(function(event){
  var flag  = 0;
  index = 0
  var p = event.currentTarget.parentElement.children;
  for(var i = 0 ; i< 4 || flag == 0 ; i++){
    if(p[i] == event.currentTarget){
      flag =1;
      index = i;
    }
  }
  currentClicked = infoIndex + index;
  $(".thumb").attr("src",currentArray[currentClicked].thmb);
  $(".service-name").text(currentArray[currentClicked].name);
  $(".website-link").attr("href",currentArray[currentClicked].web);

  $("#myModal-services").show();
});

$(".close").click(function(){
  $("#myModal-services").hide();
  $(modalIdToShow).hide();
});

$("list-submit").click(function(event){
  divItemCount[currentDivCountIndex] = 0;
  $(modalIdToShow).hide();
});


$("#service-submit").click(function(event){
 if(accordionFirstSelect == "food"){
    $.post("includes/foodservice.php", {'name': currentArray[currentClicked].name} , function(data){
      var buttonParent = accordionFirstSelect+"-btn";
      document.getElementsByClassName(buttonParent)[0].children[0].className = "details-headings-done";
      document.getElementsByClassName(buttonParent)[0].children[1].className = "accordion-first-done";
      document.getElementsByClassName(buttonParent)[0].children[2].className = "accordion-second-disable";
      $("#myModal-services").hide();
      detailsClassName = "details "+accordionFirstSelect ;
      detailsClass = document.getElementsByClassName(detailsClassName)[0];
      detailsClass.style.opacity = "0";
      detailsClass.style.height = "0px";
      detailsClass.style.maxHeight = "0px";
      chosenDetails = " ";
      infoIndex =0;
      openDetails = 0;

  });
}
  if(accordionFirstSelect == "drinks"){
    $.post("includes/drinkservice.php", {'name': currentArray[currentClicked].name,'Tel':currentArray[currentClicked].Tel} , function(data){
      var buttonParent = accordionFirstSelect+"-btn";
      document.getElementsByClassName(buttonParent)[0].children[0].className = "details-headings-done";
      document.getElementsByClassName(buttonParent)[0].children[1].className = "accordion-first-done";
      document.getElementsByClassName(buttonParent)[0].children[2].className = "accordion-second-disable";
      $("#myModal-services").hide();
      detailsClassName = "details "+accordionFirstSelect ;
      detailsClass = document.getElementsByClassName(detailsClassName)[0];
      detailsClass.style.opacity = "0";
      detailsClass.style.height = "0px";
      detailsClass.style.maxHeight = "0px";
      chosenDetails = " ";
      infoIndex =0;
      openDetails = 0;

  });
}
});

$("#food-form").submit(function(event){
    var formValues = $(this).serialize();
    event.preventDefault();
    $.post("./includes/foodform.php", formValues, function(){
      document.getElementsByClassName("food-btn")[0].children[0].className = "details-headings-done";
      document.getElementsByClassName("food-btn")[0].children[1].className = "accordion-first-done";
      document.getElementsByClassName("food-btn")[0].children[2].className = "accordion-second-disable";
  });
});

$("#drinks-form").submit(function(event){
  var formValues = $(this).serialize();
  event.preventDefault();
  $.post("./includes/drinksform.php", formValues, function(){
    document.getElementsByClassName("drinks-btn")[0].children[0].className = "details-headings-done";
    document.getElementsByClassName("drinks-btn")[0].children[1].className = "accordion-first-disable";
    document.getElementsByClassName("drinks-btn")[0].children[2].className = "accordion-second-done";
    
});
});

$(".final-submit").click(function(event){
  $.ajax({
    type: "GET",
    url: './includes/checkforsubmitdetails.php',
      success: function(data){
        checkingBeforeSubmit  = JSON.parse(data);
      }
  });
 
 if ( $("#inputAddress").val()  === ""||$("#ed").val()  === ""||$("#sdt").val()  === "" || checkingBeforeSubmit.food == 0 || checkingBeforeSubmit.drinks == 0 )
 {  
   alert("Please Enter All The Details Before You Submit");
 }
 else{
  $.post("includes/addressanddateinsert.php", {'address':$("#inputAddress").val(),'sdt':$("#sdt").val(),'ed':$("#ed").val()} , function(data){
    window.location.replace('/dev_204/partys-page.php?party=submitted');
  });
 }
});


$(document).on("click",".clickable-row",function(event){
  link = "/dev_204/party-info.php?party=" + event.currentTarget.classList[1];
  window.location.replace(link);
});

function partyInfoFunction(data){
  var w =document.getElementsByClassName("wrapper-party-info")[0].children;
  w[0].innerHTML= data['party'].pc;
  var pChildrenArray =  document.getElementsByClassName("party-info party")[0].children
  pChildrenArray[0].innerHTML ="Location: "+data['party'].pl;
  pChildrenArray[1].innerHTML = "Theme: "+data['party'].pt;  
  pChildrenArray[2].innerHTML = "Start Date & Time: "+data['party'].psdt;
  pChildrenArray[3].innerHTML = "End Date: "+data['party'].ped;
  pChildrenArray[4].innerHTML = "Address: "+data['details'].locationAddress;
 
  var pGuestList =  document.getElementsByClassName("party-info guests")[0];
  var header_guestL= document.createElement("p");
  header_guestL.innerHTML= "Guest List: ";
  pGuestList.appendChild(header_guestL);
  var guestByID = [];
  var obj = {};
  var guestList = document.createElement("SELECT");
  pGuestList.appendChild(guestList);
  for(var i = 0 ; i<data['guests'].length;i++){
    var guest = document.createElement("option");
    guest.text = data['guests'][i].gfn + " " + data['guests'][i].gln;
    guestList.add(guest,i);
    obj[data['guests'][i].gid] = data['guests'][i].gfn + " " + data['guests'][i].gln;
    guestByID.push(obj);
    
  }

  var food = document.getElementsByClassName("party-info food")[0];
  if(data['food'].type == 'service'){
    var header_f = document.createElement("p");
    header_f.innerHTML = "Food Service:"+" ";
    food.appendChild(header_f);
    var fService =  document.createElement("p");
    fService.innerHTML = data['foodservice'].fsname;
    food.appendChild(fService);
  }
    else{
      var header_f = document.createElement("p");
      header_f.innerHTML = "Food Items: ";
      food.appendChild(header_f);
      var FoodList = document.createElement("SELECT");
      food.appendChild(FoodList);

      for(var i = 0 ; i<data['fooditem'].length;i++){
        var fItem = document.createElement("option");
        fItem.text = data['fooditem'][i].fid +" " +  guestByID[0][data['fooditem'][i].gid];
        FoodList.add(fItem,i);
      }
    }


  var drink = document.getElementsByClassName("party-info drink")[0];
  if(data['drink'].type == 'service'){
    var header_d = document.createElement("p");
    header_d.innerHTML = "Drinks Service: ";
    drink.appendChild(header_d);
    var dService =  document.createElement("p");
    dService.innerHTML = data['drinkservice'].dsname;
    drink.appendChild(dService);
  }
  else{
    var header_d = document.createElement("p");
    header_d.innerHTML = "Drink Items: ";
    drink.appendChild(header_d);

    var DrinkList = document.createElement("SELECT");
    drink.appendChild(DrinkList);

    for(var i = 0 ; i<data['drinkitem'].length;i++){
      var dItem = document.createElement("option");
      dItem.text = data['drinkitem'][i].fid +" " +  guestByID[0][data['drinkitem'][i].gid];
     DrinkList.add(dItem,i);
  }
}
};
$(".delete-party").click(function(){
  $.post("./includes/deleteparty.php", function(data){
    window.location.replace('/dev_204/partys-page.php?party=deleted');  
  });
});