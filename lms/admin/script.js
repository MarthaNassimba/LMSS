
var menuIcon = document.querySelector(".menu");
var sidebar = document.querySelector(".sidebar");
var container = document.querySelector(".container");

menuIcon.onclick = function()
{
    sidebar.classList.toggle("small-sidebar");
    container.classList.toggle("large-container");
}

function searchfunction()
{
    const searchinput = document.getElementById("search").value.toUpperCase();
    const ptable = document.getElementById("product-table");
    const store = document.getElementById("body");
    const product = document.querySelectorAll(".product");
    const item = document.getElementsByTagName('td');
    const pname = document.getElementsByTagName("h5");

    for(var i = 0 ;i < pname.length; i++)
    {
        let match = product[i].getElementsByTagName('h5')[0];

        if(match)
        {
            let textValue = match.textContent || match.innerHTML;

            if(textValue.toUpperCase().indexOf(searchinput) > -1)
            {
                product[i].style.display = "";

            }
            else
            {
                product[i].style.display = "none";
            }
        }
    }
}

function edit()
{
    document.getElementById("editform").style.visibility = "visible";

}
