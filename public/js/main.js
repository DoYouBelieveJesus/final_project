var counter=3;
function addrow()
{
    var tbl=document.getElementsByName("firsttable")[0];
    var tbody=document.getElementsByName("firsttbody")[0];
    var tr=document.createElement('tr');
    var foodnode=document.createTextNode("項目");
    var newTd=document.createElement('td');
        newTd.appendChild(foodnode);
        tr.appendChild(newTd);
    var newTd=document.createElement('td');
    var newInput=document.createElement('input');
        newInput.setAttribute("type","text");
        newInput.setAttribute("placeholder","名稱");
        newInput.setAttribute("style","width:60%");
        var InputName="food["+counter+"][name]";
        newInput.setAttribute("name",InputName);
        /*console.log(InputName);*/
        newTd.appendChild(newInput);
        var newInput=document.createElement('input');
        newInput.setAttribute("type","text");
        newInput.setAttribute("placeholder","價格");
        newInput.setAttribute("style","width:20%");
        var InputName="food["+counter+"][price]";
        newInput.setAttribute("name",InputName);
      /* console.log(InputName);*/
        newTd.appendChild(newInput);
        tr.appendChild(newTd);
        tbody.appendChild(tr);
   	    tbl.appendChild(tbody);
        counter++;
}