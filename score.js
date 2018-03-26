function calculateAttend()
{
var a = document.getElementById('atten_id').value;
var attendance = (.25 * a);
//display the result
var a = document.getElementById('w1').innerHTML = attendance;
a.value = attendance;
}

function calculateTardiness(val)
{
var b = document.getElementById('rate2').value;
var tardiness = (val * b);
//display the result
var b = document.getElementById('w2').innerHTML = tardiness;
b.value = tardiness;
}

function calculateRules(val)
{
var c = document.getElementById('rate3').value;
var rules = (val * c);
//display the result
var c = document.getElementById('w3').innerHTML = rules;
b.value = rules;
}

function calculateCases(val)
{
var d = document.getElementById('rate-4').value;
var cases = (val * d);
//display the result
var d = document.getElementById('w4').innerHTML = cases;
d.value = cases;
}

function calculateProd()
{
var val = document.getElementById("calc_prod").value
var prod = (val * 0.15);
//display the result
var e = document.getElementById('w15').innerHTML = prod;
e.value = prod;
}

function calculateQuality()
{
var val_qa = document.getElementById("calc_qa").value;
var quality = (val_qa * 0.15);
//display the result
var f = document.getElementById('w6').innerHTML = quality;
f.value = quality;
}


function calculateAll(val)
{
var a = document.getElementById('w1').value;
var b = document.getElementById('w2').value;
var c = document.getElementById('w3').value;
var all = (a + b + c);
//display the result
var all = document.getElementById('total_score').innerHTML = all;
all.value = all;
}


$(document).ready(function(){
$('.noteCount').change(function() {
//alert("Content " +this.id);
countId=this.id;
denomination=countId.substring(1,countId.length);
amountId="w"+denomination;
amountEle=document.getElementById(amountId);
x=parseFloat(this.value)*parseFloat(denomination);
amountEle.innerHTML=x;
refreshTotal();
});
function refreshTotal() {
sum=0;
$('.grand').each(function( index ) {sum+=parseFloat(this.innerHTML);});
grandTotal=document.getElementById("grandTotal");
grandTotal.innerHTML=sum;
};
});


