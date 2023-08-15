// const menu = document.querySelector(".dash-submenu-items");
// const menuItems = document.querySelectorAll(".dash-submenu");
// const subMenuTitle = document.querySelectorAll(".dash-submenu-items .dash-submenu-title")

// menuItems.forEach((item,index) => {
//     item.addEventListener("click", () =>{
//         menu.classList.add("submenu-active");
//         item.classList.add("show-dash-submenu-items");
//         menuItems.forEach((item2,index2) => {
//             if(index !== index2){
//                 item2.classList.remove("show-dash-submenu-items");
//             }
//         });
//     });
// });

// subMenuTitle.forEach((title) => {
//     title.addEventListener("click", () => {
//         menu.classList.remove("dash-submenu-items");
//     }); 
// });

// console.log(menuItems, subMenuTitle);


// Function to toggle the visibility of the dropdown menu
function toggleDropdown() {
  var dropdown = document.getElementById("myDropdown");
  dropdown.classList.toggle("active"); // Toggle the "active" class
}

// Attach the toggleDropdown function to the click event of the Department menu item
var departmentMenuItem = document.querySelector(".dash-menu-item:nth-child(1) a");
departmentMenuItem.addEventListener("click", toggleDropdown);

// Close the dropdown if the user clicks outside of it
window.addEventListener("click", function(event) {
  if (!event.target.matches(".dash-menu-item:nth-child(1) a")) {
      var dropdown = document.getElementById("myDropdown");
      dropdown.classList.remove("active"); // Close the dropdown
  }
});
