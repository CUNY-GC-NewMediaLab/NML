// JavaScript Document

function prepareRollOvers() {
  
//check browser compatibility  
  if (!document.getElementsByTagName) return false;
  if (!document.getElementById) return false;

  var my_divs = document.getElementsByTagName("div");
  var my_links = document.getElementsByTagName("a");
  for ( var i=0; i < my_links.length; i++) {
    my_links[i].onmouseover = function() {
    if (this.className) { var which_class = this.className;
	document.getElementById(which_class).className='show';};
	}
    my_links[i].onmouseout = function() {
    if (this.className) { var which_class = this.className;
	document.getElementById(which_class).className='hide';};
    }
	my_links[i].onclick = function() {
    if (this.className) { var which_class = this.className;
	document.getElementById(which_class).className='hide';};
    }
  }
}

function findimg()
{
 var imgs,i;
// loop through all images of the document
 imgs=document.getElementsByTagName('img');
 for(i=0;i<imgs.length;i++)
 {
// test if the class 'roll' exists
  if(/roll/.test(imgs[i].className))
  {
// add the function roll to the image onmouseover and onmouseout and send
// the image itself as an object
   imgs[i].onmouseover=function(){roll(this);};
   imgs[i].onmouseout=function(){roll(this);};
  }
 }
}
function roll(o)
{
 var src,ftype,newsrc;
// get the src of the image, and find out the file extension
 src = o.src;
 ftype = src.substring(src.lastIndexOf('.'), src.length);
// check if the src already has an _on and delete it, if that is the case 
 if(/_on/.test(src))
 {
  newsrc = src.replace('_on','');
 }else{
// else, add the _on to the src 
  newsrc = src.replace(ftype, '_on'+ftype);
 }
 o.src=newsrc;
}
window.onload=function(){
 findimg();
 prepareRollOvers();
}