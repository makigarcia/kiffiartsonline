/* pictures from the production/images/theme */
/* CALCULATION FOR THE CAKE */
/* in the cakeform */
/* 1 ---- Cake Theme = Wedding would be free, Bday & Occasion (no prize yet) */
/* 2 ---- Shape, Sizes, Icing, Flavor */
/* 3 ---- Layers */
/* 4 ---- Design */
/* 5 ---- Quantity */
/* 6 ---- Concerns (NO CHARGES) */


/* --- Variable to hold user selecttion --- */
var var_CakeTheme;
var var_Shape;
var var_CakeLalyers;
var var_Flavor;
var var_CoatingColor;
var var_FrostType;
/* --- End Variable to hold user selecttion --- */


function updateTotal() { 

var optionprice = parseFloat(0);
var price = parseFloat(0);
var layer_amount = parseFloat(0);


function layerAmount(){
    if($('.layer_amt').html() != 0 && $('.layer_amt').html() != null && $('.layer_amt').html() != "") {
        layer_amount = parseFloat($('.layer_amt').html());
        //optionprice += layer_amount;
    }
}


/* 1 --------- Cake Theme ---------- */
function cakeThemePrice(){
    //theme1 is based on the ID 
    if (document.getElementById('theme1').checked) { //triggers when you click the radio button
        price = $('#wedding_id').html().replace("₱", "");
        optionprice += parseFloat(price); 
    }

    if (document.getElementById('theme2').checked) {
        price = $('#birthday_id').html().replace("₱", "");
        optionprice += parseFloat(price); 
    }

    if (document.getElementById('theme3').checked) {
        price = $('#dedi_id').html().replace("₱", "");
        optionprice += parseFloat(price); 
    } 

    if (document.getElementById('theme4').checked) {
        price = $('#occ_id').html().replace("₱", "");
        optionprice += parseFloat(price); 

    }
} //end of cakeTHEMEprice


function cakeSizeCirclePrice(){
    if (document.getElementById('shape1').checked) {
        setShapeAndColor();
        price = ($('#size_select_C').val() == null)? 0 : $('#size_select_C').val();
        optionprice += parseFloat(price);
        var_Shape = "Circle";
    }
}

function textilePaintPrice(){
    if (document.getElementById('shape0').checked) {
        setShapeAndColor();
        price = ($('#shape0').val() == null)? 0 : $('#shape0').val();
        optionprice += parseFloat(price);
        var_Shape = "Circle";
    }
}


function cakeSizeRectPrice(){
    if (document.getElementById('shape2').checked) {
        setShapeAndColor();
        price = ($('#size_select_R').val() == null)? 0 : $('#size_select_R').val();
        optionprice += parseFloat(price);
        var_Shape = "Rectangle";
    }
}


function cakeSizeHeartPrice(){
    if (document.getElementById('shape3').checked) {
        setShapeAndColor();
        price = ($('#size_heart').val() == null)? 0 : $('#size_heart').val();
        optionprice += parseFloat(price);
        var_Shape = "Heart";
    }
}

// function weddeliver()
// {
//     var 

// }

function setShapeAndColor() {
    var shape_src = "";
    var shapecolor;
    
    if (var_Shape == "Circle") {
        shapecolor = "<img src='shapes/shape_circle.png' " + getStyleColor(var_CoatingColor) + "/>";
        shape_src = "shapes/shape_circle.png";
        showPatternOverlay("circle_pattern");
    }

    else if(var_Shape == "Rectangle") {
        shapecolor = "<img src='shapes/shape_rect.png' " + getStyleColor(var_CoatingColor) + "/>";
        shape_src = "shapes/shape_rect.png";
        showPatternOverlay("rectangle_pattern");
    }

    else if(var_Shape == "Heart") {
        shapecolor = "<img src='shapes/shape_heart.png' " + getStyleColor(var_CoatingColor) + "/>";
        shape_src = "shapes/shape_heart.png";
        showPatternOverlay("heart_pattern");
    }

    shapecolor += "<div id=\"side_decor\" style=\"background-repeat: no-repeat;background-size: contain;position: absolute; top:0; left:0\"></div>";   // Append div for pattern later use
    document.getElementById("disp_card").innerHTML = shapecolor;
    document.getElementById("preview_image").style.backgroundColor = getColorHex(var_CoatingColor);
}


function showPatternOverlay(pattern_overlay) {
    document.getElementById("circle_pattern").style["display"] = "none";
    document.getElementById("rectangle_pattern").style["display"] = "none";
    document.getElementById("heart_pattern").style["display"] = "none";

    var div = document.getElementById(pattern_overlay).style["display"] = null;
}

/* --- Coating Color --- */
if (document.querySelector('input[name="cake_color"]:checked') != null) 
    {
        var_CoatingColor = document.querySelector('input[name="cake_color"]:checked').value;
    }

function getStyleColor(color) {
    if (color === undefined) {
        return("style='background-color:#FAFAFA;'");
    } else {
        hex = "";
        if (color == "cream") { hex = "#FBF9D3" }
        else if(color == "blue") { hex = "#468BCC" }
        else if(color == "violet") { hex = "#652D90" }
        else if(color == "green") { hex = "#3CB879" }
        else if(color == "red") { hex = "#F51A20" }
        else if(color == "pink") { hex = "#FD5E91" }
        else if(color == "orange") { hex = "#FBA13F" }
        else if(color == "yellow") { hex = "#FFEF03" }
        else if(color == "brown") { hex = "#8D6235" }
        else if(color == "black") { hex = "#212121" }
        return("style='background-color:" + hex + ";'");
    }
}

function getColorHex(color) {
    if (color === undefined) {
        return("#FAFAFA");
    } else {
        hex = "";
        if (color == "cream") { hex = "#FBF9D3" }
        else if(color == "blue") { hex = "#468BCC" }
        else if(color == "violet") { hex = "#652D90" }
        else if(color == "green") { hex = "#3CB879" }
        else if(color == "red") { hex = "#F51A20" }
        else if(color == "pink") { hex = "#FD5E91" }
        else if(color == "orange") { hex = "#FBA13F" }
        else if(color == "yellow") { hex = "#FFEF03" }
        else if(color == "brown") { hex = "#8D6235" }
        else if(color == "black") { hex = "#212121" }
        return(hex);
    }
}

/* --- End Coating Color --- */



/*2 ------- Cake SHAPE , ICING  --------- */
function cakeFlavorPrice() { //lahat na dito para madetermine nya anong shape siya na belong. 1 function is recommended
    if(document.getElementById('flavor1').checked) { 
        //orange
    }

    if(document.getElementById('flavor2').checked) {
        //choco
    }

    if(document.getElementById('flavor3').checked) { 
        //caramel
    }     

    //additional charges
    if(document.getElementById('flavor4').checked) {
        //vanilla
        price = $('#vanilla_id').html().replace("₱", "");
        optionprice += parseFloat(price);     
    }

    if(document.getElementById('flavor5').checked) {
        //ube
        price = $('#ube_id').html().replace("₱", "");
        optionprice += parseFloat(price);     
    } 

    if(document.getElementById('flavor6').checked) {
        //strawberry
        price = $('#strawberry_id').html().replace("₱", "");
        optionprice += parseFloat(price);    
    } 

    if(document.getElementById('flavor7').checked) {
        //redvelvet
        price = $('#redvelvet_id').html().replace("₱", "");
        optionprice += parseFloat(price);  
    } 

    if(document.getElementById('flavor8').checked) {
        //coffee
        price = $('#coffee_id').html().replace("₱", "");
        optionprice += parseFloat(price);  
    } 
}




function cakeFrostPrice() {
    if(document.getElementById('frosting1').checked) {
        price = $('#sugar_id').html().replace("₱", "");
        optionprice += parseFloat(price);  //orange
    } 


    if(document.getElementById('frosting2').checked) {
        price = $('#bcream_id').html().replace("₱", "");
        optionprice += parseFloat(price);     //chocolate
    }

    if(document.getElementById('frosting3').checked) { 
        price = $('#mallow_id').html().replace("₱", "");
        optionprice += parseFloat(price);  //Caramel
    }

    //additional charges
    if(document.getElementById('frosting4').checked) {
        price = $('#fondant_id').html().replace("₱", "");
        optionprice += parseFloat(price);     //vanilla
    }
}


/*function cakeCoating(){
    if(document.getElementById('color2').checked){
        document.getElementById("disp_card").style.color="blue";
    }
}*/




layerAmount();
cakeThemePrice();
cakeSizeCirclePrice();
cakeSizeRectPrice();
cakeSizeHeartPrice();
cakeFlavorPrice();
cakeFrostPrice();
//cakeCoating();

  

var totalPrice = optionprice + layer_amount;
$('.totalPrice_cake').html(totalPrice);

} //end of the updateTotal function


// Script for coating color on change
$('input[type=radio][name=cake_color]').change(function() {
    updateTotal();
});      

function addPattern(shape, shape_pattern_url) {
    // Needs proper calculation
    _top = "0px"; _left = "0px"; _width = "0px"; _height = "0px";
    if (shape == "circle") {
        _top = "30px"; _left = "175px"; _width = "340px"; _height = "340px";
    } else if (shape == "rectangle") {
        _top = "45px"; _left = "125px"; _width = "440px"; _height = "340px";
    } else if (shape == "heart") {
        _top = "30px"; _left = "175px"; _width = "340px"; _height = "340px";
    }
    
    var div = document.getElementById("side_decor");
    div.style["background-image"] = "url('" + shape_pattern_url + "')";
    div.style.top = _top;
    div.style.left = _left;
    div.style.width = _width;
    div.style.height = _height;
    //<div style="background-image: url(&quot;images/pattern/circle_des1.png&quot;);background-repeat: no-repeat;background-size: contain;width: 340px;height: 340px;position: absolute;top: 30;left: 175;"></div>
    document.getElementById("btn_remove_pattern").style.visibility = "visible";
}

function removePattern() {
    document.getElementById("side_decor").style["background-image"] = null;
    document.getElementById("btn_remove_pattern").style.visibility = "hidden";
}