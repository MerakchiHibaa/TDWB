


function ajouterLigne(input){

  if(input.id == 'tab1') {
      
     //setTimeout(() => {
          document.getElementById('tab2').checked = false;
          

          
   //   }, 0);
   
      let object1 = document.getElementById('tab1') ;
      object1.onclick(click1(input)) ;

  }
 else { 
     
      document.getElementById('tab1').checked =false ; 

         


 // object1.addEventListener('onchange' , click1(tableau) ) ; 
  let object2 = document.getElementById('tab2') ;
  object2.onclick(click2(input) ) ; 
 // object2.addEventListener('onchange' , click2(tableau) ) ; 
}

}

function click1(input1) {
  
      document.getElementById('formcache1').style.display = (input1.checked? 'block':'none');
      document.getElementById('formcache2').style.display = 'none' ;
  }
function click2(input2) {


      document.getElementById('formcache2').style.display = (input2.checked? 'block':'none');

      document.getElementById('formcache1').style.display = 'none' ;

  
  
}

//onclick="addRow(document.getElementById('tableau'), document.getElementById('rowText').value);" />
//   <input type="text" id="rowText" />



function addRow1(event, c1 , c2 , c3) {
 
event.preventDefault();
  let tr = document.createElement('tr') ; 
//  elmt1.appendChild(tr) ; 
  let th = document.createElement('th') ;
 let txt1 = document.createTextNode(c1) ;
th.appendChild(txt1) ;
//th.innerHTML = c1  ; 
  tr.appendChild(th) ;
  
  let td1 = document.createElement('td') ; 
 // td1.id ='superficie'+cpt;
  let txt2 = document.createTextNode(c2) ; 
  td1.appendChild(txt2) ; 
// td1.innerHTML = c2 ;
  tr.appendChild(td1) ;

  let td2 = document.createElement('td') ;
 // td2.id = 'production'.cpt ;
 let txt3 = document.createTextNode(c3) ; 
  td2.appendChild(txt3) ; 
// td2.innerHTML = c3 ;
  tr.appendChild(td2) ;
  document.getElementById('tableau1').appendChild(tr);
  calculsomme1();

  

}

function addRow2(event, c11 , c22 ) {
 
event.preventDefault();

  // let cpt2 = document.getElementById('tableau2').rows.length +1 ;
   let trr = document.createElement('tr') ; 
 //  elmt1.appendChild(tr) ; 
   let thh = document.createElement('th') ;
  let txt11 = document.createTextNode(c11) ;
 thh.appendChild(txt11) ;
//th.innerHTML = c1  ; 
   trr.appendChild(thh) ;
   
   let td11 = document.createElement('td') ; 
  // td11.id = 'nombre'+cpt2 ;
   let txt22 = document.createTextNode(c22) ; 
   td11.appendChild(txt22) ; 
 // td1.innerHTML = c2 ;
   trr.appendChild(td11) ;

 

   document.getElementById('tableau2').appendChild(trr);

  calculsomme2();

}






const calculsomme1 = () => {
         
  const t1 = document.querySelectorAll("#table1 tbody tr td:first-of-type");
  const t2 = document.querySelectorAll("#table1 tbody tr td:nth-of-type(2)");
  
      let somme1 = 0;
      let somme2 = 0 ;
      t1.forEach((item) => {
          somme1 = somme1 + parseFloat(item.innerHTML);
      });
      t2.forEach((item) => {
          somme2 = somme2 + parseFloat(item.innerHTML);
      });
      // add to table
     document.querySelector("#total1 td:nth-child(2)").innerHTML = somme1;        
      document.querySelector("#total1 td:nth-child(3)").innerHTML = somme2;     
   //  document.getElementById("total1").childNodes[2].innerHTML = somme1 ;
      } 
  
  calculsomme1();

  const calculsomme2 = () => {
      const t = document.querySelectorAll("#table2 tbody tr td") 
     let somme = 0 ; 
     t.forEach((elt) => {
         somme = somme + parseInt(elt.innerHTML)  ;
     } ) ;
     document.querySelector("#total2 td").innerHTML = somme ;

  }  
  
calculsomme2() ;
      
